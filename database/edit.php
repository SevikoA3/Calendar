<?php

session_start();
include ("dbconnect.php");
$username = $_SESSION['username'];

$titleInput = $_POST['title'];
$isiInput = $_POST['isi'];
$id = $_GET["id"];

$sqlCreate = "UPDATE tdl SET 
title = '$titleInput',  
isi = '$isiInput'
WHERE
id = '$id' and username = '$username';";

if(mysqli_query($conn, $sqlCreate)){
    header("Location:../todo.php?id=$id");
}else{
    echo "gagal";
}

?>