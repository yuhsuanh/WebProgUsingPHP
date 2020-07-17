<?php ob_start();
//start session
session_start();

//removing all session variables
session_unset();

//destroy session
session_destroy();

//redirect
header('location: login.php');

ob_flush(); ?>