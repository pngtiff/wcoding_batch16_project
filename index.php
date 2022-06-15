<?php
require('controller/controller.php');

//TODO put in password conditions

session_start();
try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    switch ($action){
        case 'googleOauth':
            googleOauth($_REQUEST);
            break;
        case 'profile':
            showUserInfo($_REQUEST['user']);
            break;
        case 'signUp':
            if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])  AND !empty($_POST['firstName']) AND !empty($_POST['lastName']) AND !empty($_POST['password']) AND !empty($_POST['passwordConfirm']) AND $_POST['passwordConfirm']==$_POST['password'] AND preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $_POST['password']) AND preg_match('/^[A-Za-z]{2,}$/', $_POST['firstName'])AND preg_match('/^[A-Za-z]{2,}$/', $_POST['lastName'])) {
                signUp($_REQUEST);
            }
        break;
        default: 
            require "./view/indexView.php";
            break;
    }
} catch (Exception $e) {
    die('error' . $e->getMessage());
}
