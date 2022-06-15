<?php
require('model/UserManager.php');
use wcoding\batch16\finalproject\Model\UserManager;
function signIn($params) {
    $signIn = new UserManager();
    $signIn->signIn($params['email'], $params['password']);
}