<?php
require('controller/controller.php');

session_start();
try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    switch ($action){
        case 'googleOauth':
            googleOauth($_REQUEST);
        break;
        default: 
            require "./view/indexView.php";
        break;
    }
} catch (Exception $e) {
    die('error' . $e->getMessage());
}