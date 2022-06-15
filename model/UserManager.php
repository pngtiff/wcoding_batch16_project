<?php
namespace wcoding\batch16\finalproject\Model;

require_once ('Manager.php');
class UserManager extends Manager {
    public function __construct($user=0)
    {
        parent::__construct();
        $this->_user_id = $user;
    }

    public function getUserInfo () {
        $req = $this->_connection->prepare('SELECT * FROM users WHERE id = ?');
        $req->execute(array($this->_user_id));
        $user = $req->fetch(\PDO::FETCH_ASSOC);
        $req->closeCursor();
        // print_r($user);
        return $user;
    }

    // public function getAge () {
    //     $req = $this->_connection->prepare('SELECT * FROM users WHERE id = ?');
    //     $req->execute(array($this->_user_id));
    //     $user = $req->fetch(\PDO::FETCH_ASSOC);
    //     $dob = $user['dob'];
    //     $today = date('Y-m-d');
    //     $diff = date_diff(date_create($dob), date_create($today));
    //     $age = $diff->format('%y');
    //     return $age;
    // }
}