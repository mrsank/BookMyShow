<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BookMyFilms - Register</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
</html>
<?php
session_start ();
$username = $_POST ['username'];
$_SESSION ['user'] = $username;
require ('includes/header.php');
require ('./includes/db.php');
require ('./includes/common.php');
Register ();
?>