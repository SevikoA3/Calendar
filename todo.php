<?php 
session_start();

if(!isset($_SESSION["username"])){
    header("Location:loginPage.php");
    exit(); 
}

include("database/dbconnect.php");  
$username = $_SESSION["username"];
$findData = "SELECT * FROM tdl WHERE username = '$username' ORDER BY id";
$result = mysqli_query($conn, $findData);
$_SESSION['counter'] = 1;

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

<form action="database/edit.php?id=<?php if(isset($_GET["id"]))echo $_GET['id']?>" method="post">
    <section id="todoPage">
        <div id="todoTitles">
            <h2>TO DO</h2>
            <div id="todoContainer">
                <div id="listContainer">
                    <?php $i; $counter = 1;
                    while($row = mysqli_fetch_array($result)){
                        while(true){
                            $resultlain = mysqli_query($conn, "SELECT * FROM tdl WHERE username = '$username' AND id = '$counter'");
                            if(mysqli_num_rows($resultlain) > 0){
                                $i = $counter;
                                $counter++;
                                break;
                            }else{
                                $counter++;
                            }
                        }
                        $title = $row['title'];
                    ?>
                        <a href=todo.php?id=<?php echo $i;?>><textarea name='<?php $i?>' class='todoTitle' cols='1' rows='1' placeholder='title' oninput='input1()' onclick='txtappear()'><?php echo $title ?></textarea></a>
                    <?php } ?>
                </div>
                <a href = "database/create.php?">
                    <div class="plus" onclick="addTodo()">  
                        <span class="material-symbols-outlined">
                            add
                        </span>
                    </div>
                </a>
            </div>
        </div>
        <div id="todoDescrpition">
            <?php 
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                $searchData = "SELECT * FROM tdl WHERE id = '$id' AND username = '$username'";
                $resultSearch = mysqli_query($conn,$searchData);
                $rowData = mysqli_fetch_assoc($resultSearch);  
                ?>
            <textarea name='title' id='txt1' cols='1' rows='1' placeholder='title' oninput='input2()'><?php echo $rowData['title'] ?></textarea>
            <textarea name='isi' id='txt2' cols='120' rows='20' placeholder='task' ><?php echo $rowData['isi']?></textarea>
            <input type = 'submit' value = 'enter' id = 'txt3'>
            <a href = "database/delete.php?id=<?php echo $id;?>">delete</a>
            <?php }?>
        </div>
    </section>
</form>