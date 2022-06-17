<?php
    require_once('./model/UserManager.php');
    use wcoding\batch16\finalproject\Model\UserManager;

    function createProfile() {
        require('./view/createProfile.php');
    }
    
    function checkProfile() {
        $userM = new UserManager();
        $user = $userM-> validateProfile();
        require('./view/createProfile.php');
    }
