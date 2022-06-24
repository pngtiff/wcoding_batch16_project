<?php

namespace wcoding\batch16\finalproject\Model;

use Exception;
use TypeError;

require_once('Manager.php');
class PropertyManager extends Manager
{
    public function __construct($user = 0)
    {
        parent::__construct();
        $this->_user_id = $user;
    }

    // getProperties to display on the propertyCard, which is shown on the viewProfile page and index page
    public function getProperties($action = '')
    {
        if ($action == 'profile') {
            $req = $this->_connection->prepare("SELECT p.id, p.user_uid, p.post_title, p.country, p.province_state, p.zipcode, p.city, p.address1, p.address2, p.size, p.property_type_id, p.room_type_id, p.monthly_price_won, p.description, p.validation, p.date_created, pt.property_type AS p_type, pt.description AS property_type_description, rt.room_type AS r_type, rt.description AS room_type_description, pi.property_id AS p_id, pi.img_url AS p_img, pi.description AS image_description
            FROM properties p
            LEFT JOIN property_types pt
            ON p.property_type_id = pt.id
            LEFT JOIN room_types rt
            ON p.room_type_id = rt.id
            LEFT JOIN property_imgs pi
            ON p.id = pi.property_id
            WHERE p.is_active = 1 AND p.user_uid = :uid
            GROUP BY pi.property_id");
            $req->bindParam('uid', $_REQUEST['user']);
            $req->execute();
        } else {
            $req = $this->_connection->query("SELECT p.id, p.user_uid, p.post_title, p.country, p.province_state, p.zipcode, p.city, p.address1, p.address2, p.size, p.property_type_id, p.room_type_id, p.monthly_price_won, p.description, p.validation, p.date_created, pt.property_type AS p_type, pt.description AS property_type_description, rt.room_type AS r_type, rt.description AS room_type_description, pi.property_id AS p_id, pi.img_url AS p_img, pi.description AS image_description
            FROM properties p
            LEFT JOIN property_types pt
            ON p.property_type_id = pt.id
            LEFT JOIN room_types rt
            ON p.room_type_id = rt.id
            LEFT JOIN property_imgs pi
            ON p.id = pi.property_id
            WHERE p.is_active = 1
            GROUP BY pi.property_id
            ORDER BY date_created DESC LIMIT 0,8");
        }
        $properties = $req->fetchAll(\PDO::FETCH_ASSOC);

        $req->closeCursor();
        foreach($properties as &$property) {
            $property['country'] = $this::COUNTRIES['KR'];
            $property['province_state'] = $this::PROVINCES['KR'][$property['province_state']];
            $property['city'] = !empty($this::CITIES[$property['province_state']][$property['city']]) ? $this::CITIES[$property['province_state']][$property['city']] : '';
          }
        return $properties;
    }

    // Single property detail for property listing page
    public function getProperty($propId)
    {
        $req = $this->_connection->prepare("SELECT p.id, p.user_uid, p.post_title, p.country, p.province_state, p.zipcode, p.city, p.address1, p.address2, p.room_num, p.bed_num, p.bath_num, p.is_furnished, p.size, p.property_type_id, p.room_type_id, p.monthly_price_won, p.description, p.validation, p.date_created, pt.property_type AS p_type, pt.description AS property_type_description, rt.room_type AS r_type, rt.description AS room_type_description, pi.property_id AS p_id, pi.img_url AS p_img, pi.description AS image_description
        FROM properties p
        LEFT JOIN property_types pt
        ON p.property_type_id = pt.id
        LEFT JOIN room_types rt
        ON p.room_type_id = rt.id
        LEFT JOIN property_imgs pi
        ON p.id = pi.property_id
        WHERE p.is_active = 1 AND p.id = :propId");
        $req->bindParam('propId', $propId);
        $req->execute();
        $propDetails = $req->fetchAll(\PDO::FETCH_ASSOC);
        $req->closeCursor();

        if (isset($_SESSION['email'])) {
            $req2 = $this->_connection->prepare("SELECT uid FROM users WHERE email='{$_SESSION['email']}'");
            $req2->execute();
            $data = $req2->fetch(\PDO::FETCH_ASSOC);
            $req2->closeCursor();

            $_SESSION['uid'] = $data['uid'];
            $_SESSION['user_uid'] = $propDetails[0]['user_uid'];
        }
        $propDetails[0]['province_state'] = $this::PROVINCES['KR'][$propDetails[0]['province_state']];
        $propDetails[0]['city'] = $this::CITIES[$propDetails[0]['province_state']][$propDetails[0]['city']];
        return $propDetails;
    }

    public function getPropertyOwner($propId)
    {
        $req = $this->_connection->prepare("SELECT u.uid, u.first_name, u.profile_img, p.user_uid FROM users u JOIN properties p ON u.uid = p.user_uid WHERE p.id = :propId");
        $req->bindParam('propId', $propId);
        $req->execute();
        $propOwner = $req->fetch(\PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $propOwner;
    }

    public function modifyProperty($propId)
    {
        $req = $this->_connection->prepare("SELECT p.post_title, p.room_num, p.bed_num, p.bath_num, p.is_furnished, p.room_type_id, p.monthly_price_won, p.description, p.bank_account_num, p.validation, rt.room_type AS r_type, pi.property_id AS p_id, pi.img_url AS p_img, pi.description AS image_description
        FROM properties p
        LEFT JOIN property_types pt
        ON p.property_type_id = pt.id
        LEFT JOIN room_types rt
        ON p.room_type_id = rt.id
        LEFT JOIN property_imgs pi
        ON p.id = pi.property_id
        WHERE p.is_active = 1 AND p.id = :propId");
        $req->bindParam('propId', $propId);
        $req->execute();
        $propDetails = $req->fetch(\PDO::FETCH_ASSOC);
        $req->closeCursor();

        return $propDetails;
    }

    // public function modifyProperty()
    // {

    // }


    // SEARCH FUNCTION : $search = "search" get parameter called from router

    public function searchProperties($province, $city, $rangeMin, $rangeMax, $propertyType, $roomType)
    {

        $province = ($province == "any") ? "%%" : $province-1; //// If search input is empty, show all results ("%%" is regex that catches any string)
        $city = ($city == "any") ? "%%" : $city-1; //// If search input is empty, show all results ("%%" is regex that catches any string)
        $rangeMin = ($rangeMin == "any") ? 0 : $rangeMin;
        $rangeMax = (($rangeMax == "any") OR ($rangeMax > 1000000)) ? 10000000 : $rangeMax; /// default number large enough to catch all properties
        $propertyType = ($propertyType == "any") ? "%%" : $propertyType;
        $roomType = ($roomType == "any") ? "%%" : $roomType;

        $req = $this->_connection->prepare("SELECT p.id, p.user_uid, p.post_title, p.country, p.province_state, p.zipcode, p.city, p.address1, p.address2, p.size, p.property_type_id, p.room_type_id, p.monthly_price_won, p.description, p.validation, p.date_created, pt.property_type AS p_type, pt.description AS property_type_description, rt.room_type AS r_type, rt.description AS room_type_description, pi.property_id AS p_id, pi.img_url AS p_img, pi.description AS image_description
        FROM properties p
        LEFT JOIN property_types pt
        ON p.property_type_id = pt.id
        LEFT JOIN room_types rt
        ON p.room_type_id = rt.id
        LEFT JOIN property_imgs pi
        ON p.id = pi.property_id
        WHERE p.is_active = 1 AND (p.city LIKE :inCity AND p.province_state LIKE :inProvince) AND monthly_price_won >= :inRangeMin AND monthly_price_won <= :inRangeMax AND property_type_id LIKE :inPropertyType AND room_type_id LIKE :inRoomType
        GROUP BY pi.property_id");
        $req->bindParam('inCity', $city);
        $req->bindParam('inProvince', $province);
        $req->bindParam('inRangeMin', $rangeMin);
        $req->bindParam('inRangeMax', $rangeMax);
        $req->bindParam('inPropertyType', $propertyType);
        $req->bindParam('inRoomType', $roomType);
        $req->execute();

        $properties = $req->fetchAll(\PDO::FETCH_ASSOC);

        // foreach($properties as &$property) {
        //     $req = $this->_connection->query("SELECT property_types.property_type AS p_type FROM property_types WHERE property_types.id ='{$property['property_type_id']}'");
        //     $types = $req ->fetch(\PDO::FETCH_ASSOC);
        //     $property['p_type'] = $types['p_type'];
        // }

        // foreach($properties as &$property) {
        //     $req = $this->_connection->query("SELECT room_types.room_type AS r_type FROM room_types WHERE room_types.id ='{$property['room_type_id']}'");
        //     $types = $req ->fetch(\PDO::FETCH_ASSOC);
        //     $property['r_type'] = $types['r_type'];
        // }

        // foreach($properties as &$property) {
        //     $req = $this->_connection->query("SELECT property_imgs.img_url AS p_img FROM property_imgs WHERE property_imgs.property_id ='{$property['id']}'");
        //     $types = $req ->fetch(\PDO::FETCH_ASSOC);
        //     $property['p_img'] = $types['p_img'];
        // }

        $req->closeCursor();
        foreach($properties as &$property) {
            $property['country'] = $this::COUNTRIES['KR'];
            $property['province_state'] = $this::PROVINCES['KR'][$property['province_state']];
            $property['city'] = !empty($this::CITIES[$property['province_state']][$property['city']]) ? $this::CITIES[$property['province_state']][$property['city']] : '';
          }
        $_REQUEST['province'] = $province != '%%' ? $this::PROVINCES['KR'][$province] : 'anywhere';
        $_REQUEST['city'] = ($city != '%%' AND !empty($this::CITIES[$_REQUEST['province']][$city])) ? $this::CITIES[$_REQUEST['province']][$city] : '';

        return $properties;
    }

    public function postProperty($title, $country, $province, $city, $district, $address1, $address2, $zipcode, $propertyType, $roomType, $roomNum, $bedNum, $bathNum, $furnished, $size, $price, $description, $bankAccNum, $imgs, $imgDescriptions)
    {
        $uid = $this->_connection->query("SELECT uid FROM users WHERE email='{$_SESSION['email']}'")->fetch(\PDO::FETCH_ASSOC)['uid'];
        // INFO validation
        // Address
        if (strlen($title) < 50)
            $title = strip_tags($title);
        else 
            throw(new Exception('Title is too long'));
        if (empty($this::COUNTRIES[$country]))
            throw(new Exception('This country is not supported')) ;
        if (empty($this::PROVINCES[$country][$province-1]))
            throw(new Exception('Province/State is not found'));
        else 
            $province-=1; 
        if ($city >= 0 AND empty($this::CITIES[$this::PROVINCES[$country][$province]][$city-1]))
            $city-=1;
        else if ($city < -1) 
            throw(new Exception('City is not found'));
        if ($district >= 0 AND (empty($this::DISTRICTS[$this::CITIES[$this::PROVINCES[$country][$province]][$city]][$district-1])))
            $district-=1;
        else if ($district<-1) 
            throw(new Exception('City is too long'));
        if (strlen($address1) < 256)
            $address1 = strip_tags($address1);
        else
            throw(new Exception('Address1 is too long'));
        if (strlen($address2) < 256)
            $address2 = strip_tags($address2);
        else
            throw(new Exception('Address2 is too long'));
        if (strlen($zipcode) < 11)
            $zipcode = strip_tags($zipcode);
        else
            throw(new Exception('Zipcode is too long'));
        if ($propertyType <= 0 OR $propertyType >= 7)
            throw(new TypeError("Invalid property type"));
        if ($roomType <= 0 OR $roomType >= 5)
            throw(new TypeError("Invalid room type"));
        if ($roomNum <= 0 OR $roomNum >= 100)
            throw(new TypeError("Invalid room number"));
        $furnished = $furnished ? 1 : null;
        if ($furnished AND $bedNum >= 100)
            throw(new TypeError("Invalid bed number")); 
        else if (!$furnished) {
            $bedNum = 0;
        }
        if ($bathNum <= 0 OR $bathNum >= 100)
            throw(new TypeError("Invalid room number"));
        if ($size <= 0 OR $size >= 10000)
            throw(new TypeError("Invalid size"));
        if ($price <= 0)
            throw(new TypeError("Invalid price"));
        $description = strip_tags($description);
        if (strlen($bankAccNum) < 21)
            $bankAccNum = strip_tags($bankAccNum);
        else
            throw(new Exception('Bank Account Number is too long'));
        // Img Check
        foreach($imgDescriptions as &$desc) {
            if (strlen($desc) < 256) 
                $desc = htmlspecialchars($desc);
            else
                throw(new Exception('Bank Account Number is too long'));
        }
        foreach ($imgs as $file) {
            if ($file['size'] > 10485760) {
                throw(new Exception('Image is too big'));
            }
        }
        // Create a folder for the property on the server
        $propertyId = $this->_connection->query("SELECT id FROM properties ORDER BY ID DESC LIMIT 0, 1")->fetch(\PDO::FETCH_ASSOC)['id'] + 1;
        if (!file_exists("./public/images/property_images/$propertyId")) {
            mkdir("./public/images/property_images/$propertyId");
        }
        foreach ($imgs as $file) {
            $fileName = pathinfo($file["name"]);
            $extension  = $fileName['extension'];
            $fileLocation = $file["tmp_name"];
            $bytes = bin2hex(random_bytes(16)); // generates secure pseudo random bytes and bin2hex converts to hexadecimal string
            $imgName[] = $bytes . "." . $extension;
            move_uploaded_file($fileLocation, "./public/images/property_images/$propertyId/" . $imgName[count($imgName) - 1]);
        }


        if ($furnished) {
            $this->_connection->exec("INSERT 
                INTO properties (user_uid, post_title, country, province_state, zipcode, city, district, address1, address2, size, property_type_id, room_type_id, monthly_price_won, description, bank_account_num, room_num, bed_num, bath_num, is_furnished) 
                VALUES ('$uid', '$title','$country','$province','$zipcode','$city',$district,'$address1','$address2',$size,$propertyType,$roomType,$price,'$description','$bankAccNum', $roomNum, $bedNum, $bathNum, $furnished)");
        } else {
            $this->_connection->exec("INSERT 
                INTO properties (user_uid, post_title, country, province_state, zipcode, city, district, address1, address2, size, property_type_id, room_type_id, monthly_price_won, description, bank_account_num, room_num, bath_num) 
                VALUES ('$uid', '$title','$country','$province','$zipcode','$city','$district','$address1','$address2','$size','$propertyType','$roomType','$price','$description','$bankAccNum', '$roomNum','$bathNum'
            )");
        }

        for ($i = 0; $i < count($imgName); $i++) {
            $this->_connection->exec("INSERT
                INTO property_imgs (property_id, img_url, description) 
                VALUES ('$propertyId', '{$imgName[$i]}', '{$imgDescriptions[$i]}')
            ");
        }
        header("Location:index.php?action=property&propId={$propertyId}");
    }
}
