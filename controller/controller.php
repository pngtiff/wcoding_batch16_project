<?php
require_once('userController.php');
<<<<<<< HEAD
=======
require_once('model/PropertyManager.php');

>>>>>>> master
use wcoding\batch16\finalproject\Model\UserManager;
use wcoding\batch16\finalproject\Model\PropertyManager;

function signIn($params) {
    $signIn = new UserManager();
    $signIn->signIn($params['email'], $params['password']);
}

function checkSignIn($params){
    $signIn = new UserManager();
    $signIn->checkSignIn($params['email'], $params['password']);
}

function signOut(){
    $signOut = new UserManager();
    $signOut->signOut();
}



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
