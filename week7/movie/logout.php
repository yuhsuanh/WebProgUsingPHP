<?php
//start session
session_start();

//change to empty
$_SESSION['user_id'] = '';

//destroy session
session_destroy();

//redirect
header('location: login.php');

?>