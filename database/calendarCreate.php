<?php 
session_start();
include ("dbconnect.php");
$username = $_SESSION['username'];
$date = $_GET['date'];
$month = $_GET['month'];
$year = $_GET['year'];

$sqlFind = "SELECT * FROM calendar WHERE date = '$date' AND month = '$month' AND year = '$year' AND username = '$username';";
$findResult = mysqli_query($conn, $sqlFind);

if(mysqli_num_rows($findResult) > 0){
    header("location:../calendar.php?date=$date&month=$month&year=$year");
}else{
    $sqlCreate = "INSERT INTO calendar(date, month, year, username) VALUES('$date', '$month', '$year', '$username');";
    if(mysqli_query($conn,$sqlCreate)){
        header("location:../calendar.php?date=$date&month=$month&year=$year");
    }else{
        echo "a";
    }
}
?>