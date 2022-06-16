<?php
require("./controller/controller.php");

try {
    $action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : null;

    switch ($action) {
        case 'createProfile':
            createProfile();
            break;

        case 'checkProfile':
            checkProfile();
            break;
    }
} 
catch (Exception $e) {
    die('error' . $e->getMessage());
}
