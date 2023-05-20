<?php

$i = 1;

session_start();

include ("dbconnect.php");

$i .= "";

$usernameInput = $_SESSION['username'];

$sqlCreate = "INSERT INTO tdl(username, id) VALUES('$usernameInput', '$i')";

if(mysqli_query($conn, $sqlCreate)){
    $i++;
    header("Location:../todo.php");
}

?>