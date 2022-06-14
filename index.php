<?php
require('controller/controller.php');
include('view/signUpView.php');

try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    switch ($action){
        case 'signUp':
            if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])  AND !empty($_POST['firstName']) AND !empty($_POST['lastName']) AND !empty($_POST['password']) AND !empty($_POST['passwordConfirm']) AND $_POST['passwordConfirm']==$_POST['password']) {
                signUp($_REQUEST);
            }
        break;
    }
} catch (Exception $e) {
    die('error' . $e->getMessage());
}