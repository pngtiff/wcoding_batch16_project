<?php
require('controller/controller.php');

session_start();
try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    switch ($action){
        case 'googleOauth':
            googleOauth($_REQUEST);
        break;
        // catching users trying to bypass front-end check
        case 'wrongPassword':
            throw(new Exception('You tried to sign in using wrong password.'));
        break;
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
            break;
        case 'profile':
            showUserInfo($_REQUEST['user']);
            break;
        default: 
            require "./view/indexView.php";
            break;
    }
} catch (Exception $e) {
    die('error: ' . $e->getMessage());
}