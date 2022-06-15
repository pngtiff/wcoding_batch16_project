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

function googleOauth($params) {
    $oauth = new UserManager();
    $oauth->googleOauth($params['credential']);
}