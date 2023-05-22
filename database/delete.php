<?php

session_start();

include ("dbconnect.php");

$username = $_SESSION["username"];
$id = $_GET["id"];
$counter = 0;

$sqlDelete = "DELETE FROM tdl WHERE username = '$username' and id = $id;";

if(mysqli_query($conn, $sqlDelete)){
    $findData = "SELECT * FROM tdl WHERE username = '$username'";
    $result = mysqli_query($conn, $findData);
    for($i = $id;$i < mysqli_num_rows($result) + 1;$i++){
        $a = $i+1;
        $updateSql = "UPDATE tdl SET id = $i WHERE id = $a";
        if(!mysqli_query($conn, $updateSql)){
            header("Location:../home.php");
            exit();
        };
    }
}

header("Location:../todo.php");
?>