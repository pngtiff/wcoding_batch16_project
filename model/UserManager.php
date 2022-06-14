<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=batch16project;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e) {
    die('error : '. $e->getMessage()); 
}

$firstName = addslashes(htmlspecialchars(htmlentities(trim($_POST['firstName']))));
$lastName = addslashes(htmlspecialchars(htmlentities(trim($_POST['lastName']))));
$email = addslashes(htmlspecialchars(htmlentities(trim($_POST['email']))));
$password =  $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];

if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $firstName, $lastName, $email)  AND !empty($_POST['firstName']) AND !empty($_POST['lastName']) AND !empty($_POST['password']) AND !empty($_POST['passwordConfirm']) AND $_POST['passwordConfirm']==$_POST['password']) {
    $password =  password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $response = $db->query("SELECT email, first_name, last_name FROM users WHERE email='$email'");
    if ($response->fetch(PDO::FETCH_ASSOC)) {
        header('Location:index.php');
    } else {
        $response=$db->prepare("INSERT INTO users (password, email, firstName, lastName, date_created) VALUES (:password, :email, :first_name, :last_name, NOW())");
        $response->bindParam("email",$email, PDO::PARAM_STR);
        $response->bindParam("password",$password, PDO::PARAM_STR);
        $response->execute();
        header('Location:signInView.php');
    }
};

?>