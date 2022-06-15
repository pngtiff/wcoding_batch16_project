<?php
require('controller/controller.php');
include('view/googleLoginButton.php');
session_start();
try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    switch ($action){
        case 'googleOauth':
            googleOauth($_REQUEST);
        break;
    }
} catch (Exception $e) {
    die('error' . $e->getMessage());
}