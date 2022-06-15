<?php
require('./controller/controller.php');

try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    switch ($action){
        case 'google':
            // oauth($_REQUEST); TODO: uncomment
            break;
        case 'profile':
            showUserInfo($_REQUEST['user']);
            break;
    }
} catch (Exception $e) {
    die('error' . $e->getMessage());
}