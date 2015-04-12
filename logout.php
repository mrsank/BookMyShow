<?php
require ('includes/common.php');
include ('includes/header.php');
session_start();
$_SESSION = array();
session_destroy();
header( "Location: home.php" );
?>