<?php 
session_start();
include ("dbconnect.php");
$username = $_SESSION['username'];
$date = $_GET['date'];
$month = $_GET['month'];
$year = $_GET['year'];
$content = $_POST['content'];