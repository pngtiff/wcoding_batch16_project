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

    //
    function cancelReservation($params){
       if (!empty($params['reservation_num'])){
        $userM = new UserManager();
        $params['reservation_num'] = strip_tags($params['reservation_num']);
        $userM-> cancelReservation($params['reservation_num']);
        header("Location:index.php?action=profile&user={$_SESSION['uid']}");
       }   
    }