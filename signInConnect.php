<?php 
    if (!empty($_POST['login']) AND !empty($_POST['password'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=batch16project;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Error : ' . $e->getMessage());
    }
    $response = $db->query("SELECT email, password, dob FROM users WHERE email = '$email'");
    $userInfo = $response->fetch(PDO::FETCH_ASSOC);
    $passwordHashed=$userInfo['password'];   
    $response->closeCursor();
    
    $check = password_verify(htmlspecialchars($password), $passwordHashed);

    if ($check){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $userInfo['password'];

        if ($userInfo['dob']){
            header("Location:index.php");
        } else {
            header("Location:createProfile.php");
        }
    }
    else {
        header("Location:signInView.php");
    }  
    }else {
        header("Location:signInView.php");
    }  

    ?>