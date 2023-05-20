<?php

session_start();

include ("dbconnect.php");

$username = $_SESSION["username"];
$id = $_GET["id"];

$sqlDelete = "DELETE FROM tdl WHERE username = '$username' and id = $id;";
if(mysqli_query($conn, $sqlDelete)){
    header("Location:../todo.php");
}


?>