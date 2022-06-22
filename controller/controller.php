<?php
require_once('userController.php');
require_once('model/PropertyManager.php');

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

function getLanding() {
    $properties = listProperties();
    require('./view/indexView.php');
}

function modifyProfile() {
    require('./view/modifyProfileView.php');
}

function uploadImg ($file) {
    $userM = new UserManager();
    $userM->uploadImg($file);
}

function updateUserData () {
    $userM = new UserManager();
    $userM->updateUserData();
}

function updateLastActive() {
    $userM = new UserManager();
    $userM -> updateLastActive();
}

function search($city) {
    $propertyM = new PropertyManager();
    $properties = $propertyM->searchProperties($city);
    require('./view/searchView.php');
}
function postProperty($params, $imgs) {
    $propertyM = new PropertyManager();
    $propertyM->postProperty($params['title'], $params['country'], $params['province'], $params['city'], $params['address1'], $params['address2'], $params['zipcode'], $params['propertyType'], $params['roomType'], $params['size'], $params['price'], $params['description'], $params['bankAccNum'], $imgs);
}

function viewPostProperty() {
    require('view/postPropertyView.php');
}

function getCities($province) {
    $propertyM = new PropertyManager();
    $cities = $propertyM->getCities($province);
    echo "<option selected disabled>Select a city</option>";
    foreach($cities as $key=>$city) {
        echo "<option value='$key'>$city</option>";
    }
}
function getDistricts($city) {
    $propertyM = new PropertyManager();
    $districts = $propertyM->getDistricts($city);
    if ($districts) {
        echo "<option selected disabled>Select a district</option>";
        foreach($districts as $key=>$district) {
            echo "<option value='$key'>$district</option>";
        }
    } else {
        echo '<option selected disabled value="-1">No districts in this city</option>';
    }
}