<?php 
namespace wcoding\batch16\finalproject\Model;
require_once('model/Manager.php');
class UserManager extends Manager {
    public function __construct()
    {
        parent::__construct();
    }

    public function signIn($email, $password){

        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);
        
        $response = $this->_connection->query("SELECT email, password, dob FROM users WHERE email = '$email'");
        $userInfo = $response->fetch(\PDO::FETCH_ASSOC);
        $passwordHashed=$userInfo['password'];   
        $response->closeCursor();
        
        $check = password_verify(htmlspecialchars($password), $passwordHashed);

        if ($check){
            session_start();
            $_SESSION['email'] = $email;

            if ($userInfo['dob']){
                header("Location:logOut.php");
            } else {
                header("Location:logOut.php");

                // header("Location:index.php?action=createProfile");
            }
        }
        else {
            header("Location:index.php?action=wrongPassword");
            }  
        }
    }