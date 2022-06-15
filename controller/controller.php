<?php
require('model/UserManager.php');
use wcoding\batch16\finalproject\Model\UserManager;
function googleOauth($params) {
    $oauth = new UserManager();
    $oauth->googleOauth($params['credential']);
}