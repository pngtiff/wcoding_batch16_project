<?php 
namespace wcoding\batch16\finalproject\Model;

use Exception;

require_once('Manager.php');
class UserManager extends Manager {
    public function __construct($user=0)
    {
        parent::__construct();
        $this->_user_id = $user;
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