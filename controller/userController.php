<?php
    require_once('./model/UserManager.php');
    use wcoding\batch16\finalproject\Model\UserManager;

    function createProfile() {
        !empty($_SESSION['email']) ? require('./view/createProfile.php') : header('Location: index.php?access=denied');
    }
    
    function checkProfile() {
        $userM = new UserManager();
        $user = $userM-> validateProfile();
        require('./view/createProfile.php');
    }

    function displayDefaultInfo() {
        $userM = new UserManager();
        $user = $userM-> displayDefaultInfo();
    }
