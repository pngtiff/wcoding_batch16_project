<?php
    session_start();
    print_r($_SESSION['phoneNumber']);

    $_SESSION['hello'] = 'world';
    print_r($_SESSION['hello']);