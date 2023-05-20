<?php

session_start();

include ("dbconnect.php");



$usernameInput = $_SESSION['username'];

$sqlCreate = "INSERT INTO tdl(username, id) VALUES('$usernameInput', '$i')";

if(mysqli_query($conn, $sqlCreate)){
    $i++;
    header("Location:../home.php#todoPage");
}

?>