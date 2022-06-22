<?php
namespace wcoding\batch16\finalproject\Model;

use Exception;
use TypeError;

require_once ('Manager.php');
class PropertyManager extends Manager {
    public function __construct($user=0)
    {
        parent::__construct();
        $this->_user_id = $user;
    }

    // getProperties to display on the propertyCard, which is shown on the viewProfile page
    public function getProperties ($action='') {
        if($action=='profile') {
            $req = $this->_connection->prepare('SELECT * FROM properties WHERE user_uid = :uid');
            $req->bindParam('uid', $this->_user_id);
            $req->execute();
            
        } else {
            $req = $this->_connection->query('SELECT * FROM properties ORDER BY date_created DESC LIMIT 0,6');
        }
        $properties = $req->fetchAll(\PDO::FETCH_ASSOC);

        foreach($properties as &$property) {
            $req = $this->_connection->query("SELECT property_types.property_type AS p_type FROM property_types WHERE property_types.id ='{$property['property_type_id']}'");
            $types = $req ->fetch(\PDO::FETCH_ASSOC);
            $property['p_type'] = $types['p_type'];
        }

        foreach($properties as &$property) {
            $req = $this->_connection->query("SELECT room_types.room_type AS r_type FROM room_types WHERE room_types.id ='{$property['room_type_id']}'");
            $types = $req ->fetch(\PDO::FETCH_ASSOC);
            $property['r_type'] = $types['r_type'];
        }

        foreach($properties as &$property) {
            $req = $this->_connection->query("SELECT property_imgs.img_url AS p_img FROM property_imgs WHERE property_imgs.property_id ='{$property['id']}'");
            $types = $req ->fetch(\PDO::FETCH_ASSOC);
            $property['p_img'] = $types['p_img'];
        }

        $req->closeCursor();
        return $properties;
    }

    public function searchProperties($city) {

        $req = $this->_connection->prepare('SELECT * FROM properties WHERE city = :inCity');
        $req->bindParam('inCity', $city);
        $req->execute();

        $properties = $req->fetchAll(\PDO::FETCH_ASSOC);

        foreach($properties as &$property) {
            $req = $this->_connection->query("SELECT property_types.property_type AS p_type FROM property_types WHERE property_types.id ='{$property['property_type_id']}'");
            $types = $req ->fetch(\PDO::FETCH_ASSOC);
            $property['p_type'] = $types['p_type'];
        }

        foreach($properties as &$property) {
            $req = $this->_connection->query("SELECT room_types.room_type AS r_type FROM room_types WHERE room_types.id ='{$property['room_type_id']}'");
            $types = $req ->fetch(\PDO::FETCH_ASSOC);
            $property['r_type'] = $types['r_type'];
        }

        foreach($properties as &$property) {
            $req = $this->_connection->query("SELECT property_imgs.img_url AS p_img FROM property_imgs WHERE property_imgs.property_id ='{$property['id']}'");
            $types = $req ->fetch(\PDO::FETCH_ASSOC);
            $property['p_img'] = $types['p_img'];
        }

        $req->closeCursor();

        return $properties;
    }
    public function postProperty($title, $country, $province, $city, $address1, $address2, $zipcode, $propertyType, $roomType, $size, $price, $description, $bankAccNum, $imgs) {
        $uid = $this->_connection->query("SELECT uid FROM users WHERE email='{$_SESSION['email']}'")->fetch(\PDO::FETCH_ASSOC)['uid'];
        // INFO validation
        $title = strlen($title) < 50 ? strip_tags($title) : throw(new Exception('Title is too long'));
        $country = $this::COUNTRIES[$country] ? $country : throw(new Exception('This country is not supported')) ;
        $province = strlen($province) ? strip_tags($province) : throw(new Exception('Province/State is too long'));
        $city = strlen($city) ? strip_tags($city) : throw(new Exception('City is too long'));
        $address1 = strlen($address1) ? strip_tags($address1) : throw(new Exception('City is too long'));
        $address2 = strlen($address2) ? strip_tags($address2) : throw(new Exception('City is too long'));
        $zipcode = strlen($zipcode) ? strip_tags($zipcode) : throw(new Exception('City is too long'));
        $propertyType = ($propertyType > 0 AND $propertyType < 7) ? $propertyType : throw(new TypeError("Invalid property type"));
        $roomType = ($roomType > 0 AND $roomType < 5) ? $roomType : throw(new TypeError("Invalid room type"));
        $size = ($size > 0 AND $size < 10000) ? $size : throw(new TypeError("Invalid size"));
        $price = ($price > 0) ? $price : throw(new TypeError("Invalid price"));
        $description = strip_tags($description);
        $bankAccNum = strlen($bankAccNum) ? strip_tags($bankAccNum) : throw(new Exception('Bank Account Number is too long'));
        // Create a folder for the property on the server
        $propertyId = $this->_connection->query("SELECT id FROM properties ORDER BY ID DESC LIMIT 0, 1")->fetch(\PDO::FETCH_ASSOC)['id'] + 1;
        mkdir("./public/images/property_images/$propertyId");
        foreach ($_FILES as $file) {
            if ($file['size'] < 1048576) {
                $fileName = pathinfo($file["name"]);
                $extension  = $fileName['extension'];
                $fileLocation = $file["tmp_name"];
                $bytes = bin2hex(random_bytes(16)); // generates secure pseudo random bytes and bin2hex converts to hexadecimal string
                $imgName[] = $bytes.".".$extension;
                move_uploaded_file($fileLocation, "./public/images/property_images/$propertyId/" . $imgName[count($imgName)-1]);
            } else {
                throw(new Exception('Image is too big'));
            }
        }
        $this->_connection->exec("INSERT 
            INTO properties (user_uid, post_title, country, province_state, zipcode, city, address1, address2, size, property_type_id, room_type_id, monthly_price_won, description, bank_account_num) 
            VALUES ('$uid', '$title','$country','$province','$zipcode','$city','$address1','$address2','$size','$propertyType','$roomType','$price','$description','$bankAccNum'
        )");

        foreach($imgName as $img) {
            $this->_connection->exec("INSERT
                INTO property_imgs (property_id, img_url, description) 
                VALUES ('$propertyId', '{$img}', 'blank')
            "); 
        }
        header("Location:index.php?action=property&propId={$propertyId}");
    }

}