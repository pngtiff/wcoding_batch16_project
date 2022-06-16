<?php

namespace wcoding\batch16\finalproject\Model;
require_once('./model/Manager.php');

use Exception;

class UserManager extends Manager {
    public function __construct($user=0)
    {
        parent::__construct();
        $this->_user_id = $user;
    }

    public function signIn($email, $password){

        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);
        
        $response = $this->_connection->query("SELECT email, password, dob, first_name FROM users WHERE email = '$email'");
        $userInfo = $response->fetch(\PDO::FETCH_ASSOC);
        $passwordHashed=$userInfo['password'];   
        $response->closeCursor();
        
        $check = password_verify(htmlspecialchars($password), $passwordHashed);

        if ($check){
            session_start();
            $_SESSION['firstName'] = $userInfo['first_name'];
            $_SESSION['email'] = $email;

            if ($userInfo['dob']){
                header("Location:index.php");
            } else {
                header("Location:index.php?action=createProfile");
            }
        }
        else {
            header("Location:index.php?action=wrongPassword");
        }  
    }
    public function checkSignIn($email, $password){

        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);
        
        $response = $this->_connection->query("SELECT email, password, dob, first_name FROM users WHERE email = '$email'");
        $userInfo = $response->fetch(\PDO::FETCH_ASSOC);
        $passwordHashed=$userInfo['password'];   
        $response->closeCursor();
        
        $check = password_verify(htmlspecialchars($password), $passwordHashed);

        if ($check){
            echo 1;
        }
        else {
            echo '';
        }  
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

    // 'createProfile' - action to redirect to createProfile page
    public function googleOauth($credential) {
        $response = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $credential)[1]))));
        if ($response->aud != "864435133244-6p5l99hhn44afncpkpifoqsefdns9biv.apps.googleusercontent.com" OR $response->azp != "864435133244-6p5l99hhn44afncpkpifoqsefdns9biv.apps.googleusercontent.com" OR $response->iss != 'https://accounts.google.com') {
            throw(new Exception('Google Identification went wrong'));
        }
        $res = $this->_connection->query("SELECT email, dob FROM users WHERE email='$response->email'");
        $user = $res->fetch(\PDO::FETCH_ASSOC);
        $_SESSION['firstName'] = $response->given_name;
        $_SESSION['email'] = $response->email;
        // If user signed up they are redirected to the main page
        if ($user) {
            header('Location:index.php');
            // Else they are redirected to createProfile page
        } else {
            $_SESSION['picture'] = $response->picture;
            $uid = $this->createUID();
            $this->_connection->exec("INSERT INTO users (email, first_name, last_name, uid) VALUES ('$response->email','$response->given_name','$response->family_name', '$uid')");
            header('Location:index.php?action="createProfile"');
        }
    }

    public function signOut() {
        session_destroy();
        setcookie(session_name(), '', time()-3600,'/');
        header('Location:index.php');
    }

    // getUserInfo to display on viewProfile page
    public function getUserInfo () {
        $req = $this->_connection->prepare('SELECT * FROM users WHERE id = ?');
        $req->execute(array($this->_user_id));
        $user = $req->fetch(\PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $user;
    }
}
