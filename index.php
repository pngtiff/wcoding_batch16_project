<?php

    require('controller/controller.php');

    try {
        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
        switch ($action){
            case 'google':
                // oauth($_REQUEST);
            break;
            default: 
                require "./view/indexView.php";
            break;
        }

    } catch (Exception $e) {
        die('error' . $e->getMessage());
}