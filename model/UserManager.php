<?php

namespace wcoding\batch16\finalproject\Model;
require_once('model/Manager.php');
class UserManager extends Manager {
    public function __construct()
    {
        parent::__construct();
    }
    protected function createUID() {
        $uid = bin2hex(random_bytes(4));
        $isUnique = $this->_connection->query("SELECT * FROM users WHERE uid='$uid'")->fetch(\PDO::FETCH_ASSOC) ? false : true;
        while (!$isUnique) {
            $uid = bin2hex(random_bytes(4));
            $isUnique = $this->_connection->query("SELECT * FROM users WHERE uid='$uid'")->fetch(\PDO::FETCH_ASSOC) ? false : true;
        }
        return $uid;
    }
    public function signUp($firstName, $lastName, $email, $password){
        $firstName = addslashes(htmlspecialchars(htmlentities(trim($firstName))));
        $lastName = addslashes(htmlspecialchars(htmlentities(trim($lastName))));
        $email = addslashes(htmlspecialchars(htmlentities(trim($email))));
        $password =  password_hash(htmlspecialchars($password), PASSWORD_DEFAULT);
        $uid = $this->createUID(); 

            $response = $this->_connection->query("SELECT email, first_name, last_name FROM users WHERE email='$email'");
            if ($response->fetch(\PDO::FETCH_ASSOC)) {
                header('Location:index.php');
            } else {
                $response=$this->_connection->prepare("INSERT INTO users (password, email, first_name, last_name, uid) VALUES (:password, :email, :firstName, :lastName, :uid)");
                $response->bindParam("firstName",$firstName, \PDO::PARAM_STR);
                $response->bindParam("lastName",$lastName, \PDO::PARAM_STR);
                $response->bindParam("email",$email, \PDO::PARAM_STR);
                $response->bindParam("password",$password, \PDO::PARAM_STR);
                $response->bindParam("uid",$uid, \PDO::PARAM_STR); 
                $response->execute();
                header('Location:index.php');
            }
        
    }
}   



?>