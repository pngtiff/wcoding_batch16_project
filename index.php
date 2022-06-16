<?php
require('controller/controller.php');

session_start();
try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    switch ($action){
        case 'googleOauth':
            googleOauth($_REQUEST);
            break;
        case 'profile':
            showUserInfo($_REQUEST['action'], $_REQUEST['user']);
            break;
        case 'listProperties':
            listProperties();
            break;
        default: 
            getLanding();
            break;
    }
} catch (Exception $e) {
    die('error' . $e->getMessage());
}