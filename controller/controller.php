<?php
require('./model/UserManager.php');
require('./model/PropertyManager.php');

use \wcoding\batch16\finalproject\Model\UserManager;
use \wcoding\batch16\finalproject\Model\PropertyManager;


function showUserInfo($user) {
    $userM = new UserManager($user);
    $user = $userM->getUserInfo();

    require('./view/viewProfile.php');
}

// TODO: figure out the function with the PropertyManager.php

function listProperties($user) {
    $propertyM = new PropertyManager($user);
    $properties = $propertyM->getProperties();

    require('./view/propertyCard.php');
}