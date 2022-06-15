<?php
require('controller/controller.php');
include('view/signUpView.php');

try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    switch ($action){
        case 'signUp':
            if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])  AND !empty($_POST['firstName']) AND !empty($_POST['lastName']) AND !empty($_POST['password']) AND !empty($_POST['passwordConfirm']) AND $_POST['passwordConfirm']==$_POST['password'] AND preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $_POST['password']) AND preg_match('/^[A-Za-z]{2,}$/', $_POST['firstName'])AND preg_match('/^[A-Za-z]{2,}$/', $_POST['lastName'])) {
                signUp($_REQUEST);
            }
        break;
    }
} catch (Exception $e) {
    die('error' . $e->getMessage());
}

//TODO put in password conditions