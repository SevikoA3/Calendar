<?php 
session_start();

if(!isset($_SESSION["username"])){
    header("Location:loginPage.php");
    exit(); 
}

include("database/dbconnect.php");  
$username = $_SESSION["username"];
$findData = "SELECT * FROM tdl WHERE username = '$username'";
$result = mysqli_query($conn, $findData);
?>

<html lang="en" style="scroll-behavior: smooth;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tense-Fi</title>
    <link rel="stylesheet" href="c.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script defer src="todo.js"></script>

</head>
<body style="overflow: hidden;">
    <section id="main-page">
        <div class="navbar">
            <div class="navicons">
                <div class="navicon">
                    <a href="home.php">
                        <span class="material-symbols-outlined">
                            home
                        </span>
                        <b class="navbarText" id="text1">Home</b>
                    </a>
                </div>
                <div class="navicon">
                    <a href="todo.php">
                        <span class="material-symbols-outlined scale-up">
                            checklist
                        </span>
                        <b class="navbarText" id="text2">To-do</b>
                    </a>
                </div>
                <div class="navicon">
                    <a href="database/logout.php">
                        <span class="material-symbols-outlined">
                            door_open
                        </span>
                        <b class="navbarText" id="text2">Logout</b>
                    </a>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="main">
                <div class="todoList">
                    <p>Todo List Preview.</p>
                </div>
                <div class="list">
                    <div class="userProfile">
                        <p>Your Profile:</p>
                        <div class="profile">
                            <img src="assets/pfp.jpg" alt="pfp" class="pfp">
                            <span class="material-symbols-outlined editpfp" onclick="changepfp()">
                                photo_camera
                            </span>
                            <div class="user">
                                <p>Welcome, <br> <b class="username"><?php echo $username ?></b></p>
                                <p>You have <b><?php echo mysqli_num_rows($result)?></b> task left to do!</p>
                            </div>
                        </div>
                    </div>      
                    <div class="eventComing">
                        <p>Event Coming:</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>