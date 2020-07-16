<?php
ob_start();

//start session
session_start();

//unsent session
session_unset();

//destroy session
session_destroy();

//redirect
header('location: login.php');

ob_flush();
?>