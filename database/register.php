<?php

    include ("dbconnect.php");

    $usernameInput = $_POST["username"];
    $passwordInput = $_POST["password"];

    if(empty($usernameInput)){
        header("Location:../registerPage.php?errorRegister=Username Is Required");
        exit();
    }else if(empty($passwordInput)){    
        header("Location:../registerPage.php?errorRegister=Password Is Required");
        exit();
    }

    $sqlSelect = "SELECT username from account WHERE username = '$usernameInput'";
    $dataExist = mysqli_query($conn, $sqlSelect);

    if(mysqli_num_rows($dataExist) > 0){
        header("Location:../registerPage.php?errorRegister=Username Has Been Used");
        exit();
    }

    $sqlInsert = "INSERT INTO account(username, password) VALUES('$usernameInput', '$passwordInput')";

    if(mysqli_query($conn, $sqlInsert)){
        header("Location:../loginPage.php?registSuccess=Registration Complete, Please Login");
    }else{
        header("Location:../registerPage.php?errorRegister=Error To Register, Please Try Again");
        exit();
    }

?>