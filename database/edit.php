<?php

session_start();

include ("dbconnect.php");

$titleInput = $_POST['title'];
$isiInput = $_POST['isi'];
$usernameInput = $_SESSION['username'];
$id = $_GET["id"];

$sqlCreate = "UPDATE tdl SET 
title = '$titleInput';
isi = '$isiInput';
WHERE
    id = '$id' AND username = '$usernameInput';";

if(mysqli_query($conn, $sqlCreate)){
    header("Location:../home.php#todoPage");
}

?>