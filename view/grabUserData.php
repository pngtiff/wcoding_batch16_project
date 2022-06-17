<?php

try 
{
    $db = new PDO('mysql:host=localhost;dbname=batch16project;charset=utf8', 'root', ''); // represents the connection to the data base
} catch(Exception $e)
{
    die('error : '. $e->getMessage());
}

// $emailInput = (!empty($_POST['email_login'])) ? addslashes(htmlspecialchars(htmlentities(trim($_POST['email_login'])))) : null;

// ====copy the necessary information from the users table ========//
// ============//
$emailInput = "joe@joe.com";
$req = $db->prepare("SELECT * FROM users WHERE email = :inemail ");
$req->bindParam("inemail", $emailInput, PDO::PARAM_STR);
$req->execute();

$data = $req->fetch(PDO::FETCH_ASSOC);
$firstName = $data['first_name'];
$lastName = $data['last_name'];
$email = $data['email'];
$password = $data['password'];
$dob = $data['dob'];
$gender = $data['gender'];


// update is_active from 1->0
$req2 = $db->prepare("UPDATE users SET is_active = 0 WHERE email = :inemail ");
$req2->bindParam("inemail", $emailInput, PDO::PARAM_STR);
$req2->execute();

// modified profile
$languages = $_POST['languages'];
$phoneNumber = $_POST['phone_number'];
$bio = $_POST['bio'];
$status = 1;
$profileImg = "";
$uid = "random";

$reqInsert = $db->prepare("INSERT INTO users (uid, first_name, last_name, email, password, dob, gender, languages, bio, phone_number, profile_img, is_active)
    VALUES ( :inuid, :infirst, :inlast, :inemail, :inpassword, :indob, :ingender, :inlanguages, :inbio, :inphoneNumber, :inprofileImg, :inactiveStatus) ");

// insert modified content
$reqInsert->bindParam("inlanguages", $languages, PDO::PARAM_STR);
$reqInsert->bindParam("inphoneNumber", $phoneNumber, PDO::PARAM_STR);
$reqInsert->bindParam("inbio", $bio, PDO::PARAM_STR);
$reqInsert->bindParam("inactiveStatus", $status, PDO::PARAM_INT);
$reqInsert->bindParam("inprofileImg", $profileImg, PDO::PARAM_STR);
$reqInsert->bindParam("inuid", $uid, PDO::PARAM_STR);


// inherited from the previous data
$reqInsert->bindParam("infirst", $firstName, PDO::PARAM_STR);
$reqInsert->bindParam("inlast", $lastName, PDO::PARAM_STR);
$reqInsert->bindParam("inemail", $email, PDO::PARAM_STR);
$reqInsert->bindParam("inpassword", $password, PDO::PARAM_STR);
$reqInsert->bindParam("indob", $dob, PDO::PARAM_STR);
$reqInsert->bindParam("ingender", $gender, PDO::PARAM_STR);

$reqInsert->execute();





