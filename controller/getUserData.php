<?php

// Action required to test the profile modification feature code after merging them:
//     - create a file "profile_images " as a child of 'batch16project' file (just for the current code to work)
//     - right click the file that you created ->click 'get info'
//     - click the bottom right corner to unlock the file and provide the privilege 'Read & Write' to all 
//     - if the code works, the profile photo file that you have uploaded should appear on the "profile_images" file


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