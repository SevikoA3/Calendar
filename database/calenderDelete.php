<?php 
session_start();
include ("dbconnect.php");
$username = $_SESSION['username'];
$date = $_GET['date'];
$month = $_GET['month'];
$year = $_GET['year'];

$sqlDelete = "DELETE FROM calendar WHERE date = '$date' and month = '$month' and year = '$year';";
if(mysqli_query($conn,$sqlDelete)){
    header("location:../calendar.php");
} 