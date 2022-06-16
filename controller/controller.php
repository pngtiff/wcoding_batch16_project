<?php
require('model/UserManager.php');
use wcoding\batch16\finalproject\Model\UserManager;
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


function showUserInfo($user) {
    $userM = new UserManager($user);
    $user = $userM->getUserInfo();

    require('./view/viewProfile.php');
}

// TODO: figure out the function with the PropertyManager.php
// function listProperties($user) {
//     $propertyM = new PropertyManager($user);
//     $properties = $propertyM->getProperties();

//     require('./view/propertyCard.php');
// }

function googleOauth($params) {
    $oauth = new UserManager();
    $oauth->googleOauth($params['credential']);
}