<?php
require('controller/controller.php');
include('view/signInView.php');
// print_r($_SESSION);
try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    switch ($action){
        case 'wrongPassword':
            
        case 'signIn':
            signIn($_REQUEST);
        break;
    }
} catch (Exception $e) {
    die('error' . $e->getMessage());
}