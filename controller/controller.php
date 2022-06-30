<?php
require_once('userController.php');
require_once('propertyController.php');
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
    $reservations = $userM->getReservations();
    // $data = $userM->viewUserData(); //// for header profile picture - @TODO Get user ID directly from GetUserInfo function to avoid calling 2 functions /// 
    
    $propertyM = new PropertyManager($userId);
    $properties = $propertyM->getProperties($action);

    require('./view/viewProfile.php');
}

function search($params) {
    $propertyM = new PropertyManager();
    $rangeMin = $params["rentRange"] != "any" ? $params['rentRange']-500000 : "any";
    $rangeMax = $params["rentRange"] != "any" ? $params['rentRange'] : "any";
    $properties = $propertyM->searchProperties($params['province'], $params['city'], $rangeMin, $rangeMax, $params['propertyType'], $params['roomType']);
    require('./view/searchResultsCard.php');
}

function getCities($province) {
    $propertyM = new PropertyManager();
    $cities = $propertyM->getCities($province);
    if ($cities) {
        echo "<option selected disabled>Select a city</option>";
        foreach($cities as $key=>$city) {
            $key+=1;
            echo "<option value='{$key}'>$city</option>";
        }
    } else {
        echo '<option selected value="-1">No cities/districts in this area</option>';
    }
}

function getDistricts($city) {
    $propertyM = new PropertyManager();
    $districts = $propertyM->getDistricts($city);
    if ($districts) {
        echo "<option selected disabled>Select a district</option>";
        foreach($districts as $key=>$district) {
            $key+=1;
            echo "<option value='$key'>$district</option>";
        }
    } else {
        echo '<option selected value="-1">No cities/districts in this area</option>';
    }
}

function reservationView(){
    // $userId = $_SESSION['uid'];
    // // for reservation, we need both information from the user and the host's property
    // $userM = new UserManager($userId); // user
    // $userData = $userM->viewUserData($userId); // from property manager, grab a required function

    // $propertyM = new PropertyManager($propId);
    // $propDetails = $propertyM->getProperty($propId);
    // $propOwner = $propertyM->getPropertyOwner($propId);

    require('view/reservations.php'); // display the view of the reservation form
}

function addReservationInfo(){
    
    $userM = new UserManager(); // user
    $userM->reservations();




    // execute the function from the UserManager
}
