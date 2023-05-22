<?php 
session_start();
include ("dbconnect.php");
$username = $_SESSION['username'];
$date = $_GET['date'];
$month = $_GET['month'];
$year = $_GET['year'];
$content = $_POST['content'];

$sqlEdit = "UPDATE calendar SET 
content = '$content'
WHERE
date = '$date' and month = '$month' and year = '$year' and username = '$username';";

if(mysqli_query($conn,$sqlEdit)){
    header("location:../calendar.php");
}

?>