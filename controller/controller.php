<?php
require_once('userController.php');
require_once('model/PropertyManager.php');

use wcoding\batch16\finalproject\Model\UserManager;
use wcoding\batch16\finalproject\Model\PropertyManager;

function signIn($params) {
    $signIn = new UserManager();
    $rememberMe = !empty($params['rememberMe']);
    $signIn->signIn($params['email'], $params['password'], $rememberMe);
    // rememberMe feature
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

function signUp($params) {
    $signUp = new UserManager();
    $signUp->signUp($params ['firstName'], $params['lastName'], $params['email'], $params['password']);
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

function getLanding($userId) {
    $properties = listProperties();
    $userM = new UserManager($userId); 
    $data = $userM->viewUserData();
    require('./view/indexView.php');
}

function getProperty($propId) {
    $propertyM = new PropertyManager();
    $propDetails = $propertyM->getProperty($propId);

    require('./view/detailedPropertyView.php');
}

function modifyProfile($userId) {
    $userM = new UserManager($userId); 
    $data = $userM->viewUserData();

    require('./view/modifyProfileView.php');  
}

function updateProfile () {
    $userM = new UserManager();
    $data = $userM->viewUserData();
    $userM->updateUserData($data);

    header("Location: index.php?action=profile&user={$_SESSION['uid']}");
}

function updateLastActive() {
    $userM = new UserManager();
    $userM -> updateLastActive();
}

function search($params) {
    $propertyM = new PropertyManager();
    $properties = $propertyM->searchProperties($params['search'], $params['rangeMin'], $params['rangeMax'], $params['propertyType'], $params['roomType']);
    require('./view/searchResultsCard.php');
}