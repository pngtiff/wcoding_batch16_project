<?php
require('model/UserManager.php');
use wcoding\batch16\finalproject\Model\UserManager;
function signUp($params) {
    $signUp = new UserManager();
    $signUp->signUp($params ['firstName'], $params['lastName'], $params['email'], $params['password']);
}