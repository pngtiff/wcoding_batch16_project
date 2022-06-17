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

    public function validateProfile()
    {
        // Check phone number
        !empty($_REQUEST['phoneNum']) and preg_match("/^\+?[0-9]{7,14}$/", $_REQUEST['phoneNum']) ? $phoneNum = ($_REQUEST['phoneNum']) : $phoneNum = null;

        // Check birthday
        $days30 = array(4, 6, 9, 11);
        $days31 = array(1, 3, 5, 7, 8, 10, 12);

        // Check year
        !empty($_REQUEST['year']) and $_REQUEST['year'] >= intval(date('Y')) - 120 and $_REQUEST['year'] <= intval(date('Y')) ? $year = ($_REQUEST['year']) : $year = null;

        //Check month
        !empty($_REQUEST['month']) and (preg_match("/[1-9]|1[0-2]/", $_REQUEST['month'])) ? $month = $_REQUEST['month'] : $month = null;

        // Check day
        if (!empty($_REQUEST['day']) and $month === 2) {
            if (($year % 100 === 0 and $year % 400 === 0) or ($year % 100 !== 0 and $year % 4 === 0)) {
                if ($_REQUEST['day'] >= 1 and $_REQUEST['day'] <= 29) {
                    $day = $_REQUEST['day'];
                }
            } else if ($_REQUEST['day'] >= 1 and $_REQUEST['day'] <= 28) {
                $day = $_REQUEST['day'];
            }
        } else if (!empty($_REQUEST['day']) and in_array($month, $days30)) {
            if ($_REQUEST['day'] >= 1 and $_REQUEST['day'] <= 30) {
                $day = $_REQUEST['day'];
            }
        } else if (!empty($_REQUEST['day']) and in_array($month, $days31)) {
            if ($_REQUEST['day'] >= 1 and $_REQUEST['day'] <= 31) {
                $day = $_REQUEST['day'];
            }
        } else {
            $day = null;
        }

        $month < 10 ? $month = "0$month" : $month = "$month";
        $dob = $year . '-' . $month . '-' . $day;

        // Check gender
        !empty($_REQUEST['gender']) and ($_REQUEST['gender'] === 'M' or $_REQUEST['gender'] === 'F' or $_REQUEST['gender'] === 'NB') ? $gender = $_REQUEST['gender'] : $gender = null;

        // Check languages (add languages to array as necessary)
        $languages = array(
            'Cantonese' => 'HK', 'Chinese(Mandarin)' => 'ZH', 'Dutch' => 'NL', 'English' => 'EN',
            'French' => 'FR', 'German' => 'DE', 'Hindi' => 'HI', 'Indonesian' => 'IN', 'Italian' => 'IT', 'Japanese' => 'JA',
            'Korean' => 'KO', 'Vietnamese' => 'VI', 'Portuguese' => 'PT', 'Russian' => 'RU', 'Spanish' => 'ES'
        );

        !empty($_REQUEST['language']) and array_diff($_REQUEST['language'], $languages) === array() ? $language = implode(',', $_REQUEST['language']) : $language = null;

        // Check bio
        !empty($_REQUEST['bio']) ? $bio = $_REQUEST['bio'] : $bio = null;

        //Check form
        if ($phoneNum and $dob and $gender and $language and $bio) {
            $this->newProfile();
        } else {
            header('Location:index.php?action=createProfile&createAccount=error');
        }
    }

    // creates new user profile that will be inserted into users table
    public function newProfile()
    {
        $phoneNum = strval(strip_tags($_POST['phoneNum']));
        $dob = strip_tags($_POST['year']) . '-' . strip_tags($_POST['month']) . '-' . strip_tags($_POST['day']);
        $gender = strip_tags($_POST['gender']);
        $language = strip_tags(implode(',', $_REQUEST['language']));
        $bio = strip_tags($_POST['bio']);

        if (!empty($_FILES["uploadFile"]["name"])) {

            // Get file info 
            $fileName = $_FILES["uploadFile"]["name"];
            $fileLocation = $_FILES["uploadFile"]["tmp_name"];
            $bytes = bin2hex(random_bytes(16));
            $newName = rename($fileName, $bytes);
            $folder = "./public/images/profile_images/" . basename($newName);

            move_uploaded_file($fileLocation, $folder);

        } else {

            $folder = "./public/images/profile_images/defaultUser.png";
        }

        $req = $this->_connection->prepare("UPDATE users SET phone_number=:phoneNum, dob=:dob, gender=:gender, languages=:lang, bio=:bio, profile_img=:userImg WHERE email='{$_SESSION['email']}'");
        $req->bindParam('phoneNum', $phoneNum, \PDO::PARAM_STR);
        $req->bindParam('dob', $dob, \PDO::PARAM_STR);
        $req->bindParam('gender', $gender, \PDO::PARAM_STR);
        $req->bindParam('lang', $language, \PDO::PARAM_STR);
        $req->bindParam('bio', $bio, \PDO::PARAM_STR);
        $req->bindParam('userImg', $folder, \PDO::PARAM_STR);
        $req->execute();
        header('Location:index.php');
    }

    public function signOut() {
        session_destroy();
        setcookie(session_name(), '', time()-3600,'/');
        header('Location:index.php');
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
