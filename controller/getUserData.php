<?php

if(!empty($_POST)){
        
    try 
    {
        $db = new PDO('mysql:host=localhost;dbname=batch16project;charset=utf8', 'root', ''); // represents the connection to the data base
    } catch(Exception $e)
    {
        die('error : '. $e->getMessage());
    }

    // use it once it is merged with create profile
    // $emailInput = (!empty($_POST['email_login'])) ? addslashes(htmlspecialchars(htmlentities(trim($_POST['email_login'])))) : null;
    
    // ====copy the necessary information from the users table ========//
    //==========================================//
    //==========================================//
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
}