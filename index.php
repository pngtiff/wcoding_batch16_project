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
            if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}+$#", $_POST['email'])  AND !empty($_POST['firstName']) AND !empty($_POST['lastName']) AND !empty($_POST['password']) AND !empty($_POST['passwordConfirm']) AND $_POST['passwordConfirm']==$_POST['password'] AND preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $_POST['password']) AND preg_match('/^(?![\s.]+$)[A-Z\-a-z\s.]{2,}$/', $_POST['firstName'])AND preg_match('/^(?![\s.]+$)[A-Z\-a-z\s.]{2,}$/', $_POST['lastName'])) {
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
            // displayDefaultInfo();
            modifyProfile($_REQUEST['user']);
            break;

            // trigger updating data - working without any issue at the moment
        case 'updateUserData':
            if (!empty($_REQUEST['language']) OR !empty($_REQUEST['phone_number']) OR !empty($_REQUEST['bio']) OR !empty($_FILES["uploadFile"]["name"])) {
                updateProfile();
            }
            break;
            
            //Search//
        case 'search':
            search($_REQUEST);
            break;
        case 'postProperty': 
            $bedNum = (!empty($_REQUEST['furnished']) AND !empty($_REQUEST['bedNum'])) ? !empty($_REQUEST['bedNum']) : empty($_REQUEST['furnished']) AND empty($_REQUEST['bedNum']) ? true : false;
            $_REQUEST['district'] = (!empty($_REQUEST['city']) AND $_REQUEST['city'] == -1) ? -1 : $_REQUEST['district'];
            if (!empty($_REQUEST['title']) 
                AND !empty($_SESSION['email']) 
                AND !empty($_REQUEST['city']) 
                AND !empty($_REQUEST['country']) 
                AND !empty($_REQUEST['province']) 
                AND !empty($_REQUEST['address1']) 
                AND !empty($_REQUEST['zipcode']) 
                AND !empty($_REQUEST['propertyType']) 
                AND !empty($_REQUEST['roomType']) 
                AND !empty($_REQUEST['size']) 
                AND !empty($_REQUEST['price']) 
                AND !empty($_REQUEST['description']) 
                AND count($_FILES) >= 2 
                AND count($_FILES) <= 20 
                AND !empty($_REQUEST['bankAccNum']) 
                AND !empty($_REQUEST['roomNum']) 
                AND !empty($_REQUEST['bathNum']) 
                AND $bedNum 
                AND !empty($_REQUEST['district'])) {
                    for ($i=0; $i<count($_FILES); $i++) {
                        if (empty($_REQUEST["t-attachment-$i"])) {
                            throw (new Exception("Message description is empty"));
                        }
                    }
                    postProperty($_REQUEST, $_FILES);
            }
            
            break;
        case 'viewPostProperty':
            if (!empty($_SESSION['email'])) {
                viewPostProperty();
            }
            break;
        case 'getCities':
            if (!empty($_REQUEST['province'])) {
                getCities($_REQUEST['province']);
            }
            break;
        case 'getDistricts':
            if (!empty($_REQUEST['city'])) {
                getDistricts($_REQUEST['city']);
            }
            break;
        default:
            //////// If logged in : Load user data for profile picture, if not, load without user data///
            (isset($_REQUEST['userid'])) ? getLanding($_REQUEST['userid']) : getLanding(0);
            break;
    }
} catch (Exception $e) {
    die('error' . $e->getMessage());
}
