<?php
require('controller/controller.php');

//TODO put in password conditions

session_start();
try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    if (!empty($_SESSION['email'])) {
        updateLastActive();
    }
    switch ($action){
        case 'googleOauth':
            googleOauth($_REQUEST);
        break;
        // catching users trying to bypass front-end check
        case 'wrongPassword':
            throw(new Exception('You tried to sign in using wrong password.'));
        case 'signIn':
            if(!empty($_REQUEST['password']) AND !empty($_REQUEST['email'])) {
                signIn($_REQUEST);
            } else {
                throw(new Exception('You tried to sign in without a password.'));
            }
        break;
        // case for ajax request to check if email/password are correct without refreshing the page
        case 'checkSignIn':
            checkSignIn($_REQUEST);
        break;

        case 'signOut':
            signOut();
        break;

        case 'profile':
            showUserInfo($_REQUEST['action'], $_REQUEST['user']);
            break;

        case 'listProperties':
            listProperties();
            break;
        case 'property':
            getProperty($_REQUEST['propId']);
            break;
        case 'signUp':
            if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])  AND !empty($_POST['firstName']) AND !empty($_POST['lastName']) AND !empty($_POST['password']) AND !empty($_POST['passwordConfirm']) AND $_POST['passwordConfirm']==$_POST['password'] AND preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $_POST['password']) AND preg_match('/^[A-Za-z]{2,}$/', $_POST['firstName'])AND preg_match('/^[A-Za-z]{2,}$/', $_POST['lastName'])) {
                signUp($_REQUEST);
            }
        break;
        
        case 'createProfile':
            createProfile();
            break;

        case 'checkProfile':
            checkProfile();
            break;

            // loads modifyProfileView
        case 'modifyProfile':
            modifyProfile($_REQUEST['user']);
            displayDefaultInfo();
            break;

            // trigger updating data - working without any issue at the moment
        case 'updateUserData':
            if (!empty($_REQUEST['language']) OR !empty($_REQUEST['phone_number']) OR !empty($_REQUEST['bio']) OR !empty($_FILES["uploadFile"]["name"])) {
                updateUserData();
                displayDefaultInfo();
            }
            break;
            
            //Search//
        case 'search':
            search($_REQUEST);
            break;
        default: 
            getLanding();
            break;
    }
} catch (Exception $e) {
    die('error' . $e->getMessage());
}