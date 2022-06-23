<?php
require('controller/controller.php');

//TODO put in password conditions

session_start();
try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    if (!empty($_SESSION['email'])) {
        updateLastActive();
    }
    switch ($action) {
        case 'googleOauth':
            googleOauth($_REQUEST);
            break;
            // catching users trying to bypass front-end check
        case 'wrongPassword':
            throw (new Exception('You tried to sign in using wrong password.'));
        case 'signIn':
            if (!empty($_REQUEST['password']) and !empty($_REQUEST['email'])) {
                signIn($_REQUEST);
            } else {
                throw (new Exception('You tried to sign in without a password.'));
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
        case 'modifyProperty':
            modifyProperty($_REQUEST['propId']);
            break;
            // case 'modifyProperty':
            //     modifyProperty();
            //     break;
        case 'signUp':
            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])  and !empty($_POST['firstName']) and !empty($_POST['lastName']) and !empty($_POST['password']) and !empty($_POST['passwordConfirm']) and $_POST['passwordConfirm'] == $_POST['password'] and preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $_POST['password']) and preg_match('/^[A-Za-z]{2,}$/', $_POST['firstName']) and preg_match('/^[A-Za-z]{2,}$/', $_POST['lastName'])) {
                signUp($_REQUEST);
            }
            break;

        case 'createProfile':
            createProfile();
            break;

        case 'checkProfile':
            checkProfile();
            break;

            // loads prifileFormView
        case 'modifyProfile':
            modifyProfile();
            break;

            // trigger image uplodaing
        case 'uploadImg':
            if (!empty($_FILES["uploadFile"]['name'])) {
                uploadImg($_FILES['uploadFile']);
                // if the upload button is clicked again, leads to the break page
            }
            break;

            // trigger updating data
        case 'updateUserData':
            if (!empty($_REQUEST['language']) or !empty($_REQUEST['phone_number']) or !empty($_REQUEST['bio'])) {
                updateUserData();
            }
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
