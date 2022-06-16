<?php
require('./model/UserManager.php');
require('./model/PropertyManager.php');

use \wcoding\batch16\finalproject\Model\UserManager;
use \wcoding\batch16\finalproject\Model\PropertyManager;


function googleOauth($params) {
    $oauth = new UserManager();
    $oauth->googleOauth($params['credential']);
}

function showUserInfo($action, $userId) {
    $userM = new UserManager($userId);
    $user = $userM->getUserInfo();
    
    $propertyM = new PropertyManager($userId);
    $properties = $propertyM->getProperties($action);

    require('./view/viewProfile.php');
}

function listProperties() {
    $propertyM = new PropertyManager();
    $properties = $propertyM->getProperties();

    return $properties;
}

function getLanding() {
    $properties = listProperties();

    require('./view/indexView.php');
}