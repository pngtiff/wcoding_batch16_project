<?php
namespace wcoding\batch16\finalproject\Model;

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


    // SEARCH FUNCTION : $search = "search" get parameter called from router

    public function searchProperties($search, $rangeMin, $rangeMax, $propertyType, $roomType) {

        $search = ($search == "anywhere") ? "%%" : $search; //// If search input is empty, show all results ("%%" is regex that catches any string)
        $rangeMin = ($rangeMin == "any") ? 0 : $rangeMin;
        $rangeMax = ($rangeMax == "any") ? 1000000000 : $rangeMax; /// default number large enough to catch all properties
        $propertyType = ($propertyType == "any") ? "%%" : $propertyType;
        $roomType = ($roomType == "any") ? "%%" : $roomType;

        $req = $this->_connection->prepare('SELECT * FROM properties WHERE (city LIKE :inSearch OR province_state LIKE :inSearch) AND monthly_price_won >= :inRangeMin AND monthly_price_won <= :inRangeMax AND property_type_id LIKE :inPropertyType AND room_type_id LIKE :inRoomType');
        $req->bindParam('inSearch', $search);
        $req->bindParam('inRangeMin', $rangeMin);
        $req->bindParam('inRangeMax', $rangeMax);
        $req->bindParam('inPropertyType', $propertyType);
        $req->bindParam('inRoomType', $roomType);
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