<?php
namespace wcoding\batch16\finalproject\Model;

require_once ('Manager.php');
class PropertyManager extends Manager {
    public function __construct($user=0)
    {
        parent::__construct();
        $this->_user_id = $user;
    }

    // getProperties to display on the propertyCard, which is shown on the viewProfile page and index page
    public function getProperties ($action='') {
        if($action=='profile') {
            $req = $this->_connection->prepare('SELECT * FROM properties WHERE user_uid = :uid');
            $req->bindParam('uid', $this->_user_id);
            $req->execute();
        
        } else {
            $req = $this->_connection->query('SELECT * FROM properties ORDER BY date_created DESC LIMIT 0,8');
        }
        $properties = $req->fetchAll(\PDO::FETCH_ASSOC);

        // Get image, room type, property type for all properties
        foreach($properties as &$property) {
            $req = $this->_connection->query("SELECT p.id, p.user_uid, p.post_title, p.country, p.province_state, p.zipcode, p.city, p.address1, p.address2, p.size, p.property_type_id, p.room_type_id, p.monthly_price_won, p.description, p.validation, p.date_created, pt.property_type AS p_type, pt.description AS property_type_description, rt.room_type AS r_type, rt.description AS room_type_description, pi.img_url AS p_img, pi.description AS image_description
            FROM properties p
            LEFT JOIN property_types pt
            ON p.property_type_id = '{$property['property_type_id']}'
            LEFT JOIN room_types rt
            ON p.room_type_id = '{$property['room_type_id']}'
            LEFT JOIN property_imgs pi
            ON '{$property['id']}' = pi.property_id
            WHERE p.is_active = 1");
            $property = $req->fetch(\PDO::FETCH_ASSOC);
        }

        $req->closeCursor();
        return $properties;
    }

    // Single property detail for property listing page
    public function getProperty($propId) {
        $req = $this->_connection->prepare('SELECT * FROM properties WHERE id = :propId');
        $req->bindParam('propId', $propId);
        $req->execute();
        $propDetails = $req->fetch(\PDO::FETCH_ASSOC);

        // Get image, room type, property type for this property
        $req = $this->_connection->query("SELECT property_imgs.img_url AS p_img FROM property_imgs WHERE property_imgs.property_id ='{$propDetails['id']}'");
        $types = $req ->fetch(\PDO::FETCH_ASSOC);
        $propDetails['p_img'] = $types['p_img'];

        $req = $this->_connection->query("SELECT property_types.property_type AS p_type FROM property_types WHERE property_types.id ='{$propDetails['property_type_id']}'");
        $types = $req ->fetch(\PDO::FETCH_ASSOC);
        $propDetails['p_type'] = $types['p_type'];

        $req = $this->_connection->query("SELECT room_types.room_type AS r_type FROM room_types WHERE room_types.id ='{$propDetails['room_type_id']}'");
        $types = $req ->fetch(\PDO::FETCH_ASSOC);
        $propDetails['r_type'] = $types['r_type'];
        
        $req->closeCursor();
        return $propDetails;        
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
}