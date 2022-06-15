<?php 
session_start();
session_destroy();
setcookie(session_name(), '', time()-3600,'/');

print_r($_SESSION);

header('Location:index.php');



?>