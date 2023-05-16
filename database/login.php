<?php
    include ("dbconnect.php");

    $usernameInput = $_POST['username'];
    $passwordInput = $_POST['password'];

    if(empty($usernameInput)){
        header("Location:../loginPage.php?errorLogin=Username Is Required");
        exit();
    }else if(empty($passwordInput)){    
        header("Location:../loginPage.php?errorLogin=Password Is Required");
        exit();
    }

    $findData = "SELECT * FROM account WHERE username = '$usernameInput'";
    $result = mysqli_query($conn, $findData);

    if(mysqli_num_rows($result) < 1){
        header("Location:../loginPage.php?errorLogin=Username Not Found");
    }else{
        $row = mysqli_fetch_assoc($result);
        if($passwordInput == $row["password"]){
            header("Location:../home.html");
        }else{
            header("Location:../loginPage.php?errorLogin=Wrong Password");
        }
    }
?>