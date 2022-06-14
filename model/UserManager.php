<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=batch16project;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e) {
    die('error : '. $e->getMessage()); 
}

$login = addslashes(htmlspecialchars(htmlentities(trim($_POST['login']))));
$email = addslashes(htmlspecialchars(htmlentities(trim($_POST['email']))));
$password =  $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];

if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email) AND !empty($_POST['login']) AND !empty($_POST['password']) AND !empty($_POST['passwordConfirm']) AND $_POST['passwordConfirm']==$_POST['password']) {
    $login = addslashes(htmlspecialchars(htmlentities(trim($_POST['login']))));
    $password =  password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $response = $db->query("SELECT email, login FROM users WHERE email='$email'");
    if ($response->fetch(PDO::FETCH_ASSOC)) {
        header('Location:signUpView.php');
        $response->closeCursor();
    } else {
        $response->closeCursor();
        $response=$db->prepare("INSERT INTO users (login, password, email, date_subscription) VALUES (:login, :password, :email, :date_subscription)");
        $response->bindParam("login",$login, PDO::PARAM_STR);
        $response->bindParam("email",$email, PDO::PARAM_STR);
        $response->bindParam("password",$password, PDO::PARAM_STR);
        $response->bindParam("date_created",date('Y-m-d H:i:s'), PDO::PARAM_STR);
        $response->execute();
        $response->closeCursor();
        header('Location:signInView.php');
    }
};

?>