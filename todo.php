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
    <script defer>
        function appear(){
            setTimeout(() => {
                document.querySelector("#todoDescription").classList.add('todoDescAppear')  
                document.querySelector("#todoTitles").style.transition = "1s"
                document.querySelector("#todoTitles").classList.add('titleShrink')
            }, 0)

        }

        function stay(){
            setTimeout(() => {
            document.querySelector("#todoTitles").classList.add('titleShrink')
            console.log(document.querySelector("#todoDescription"))
            }, 0)
        }

    </script>
    
</head>


<form id="testForm" action="database/edit.php?id=<?php if(isset($_GET["id"]))echo $_GET['id']?>" method="post">
<section id="main-page">
        <div class="navbar navbarAppear">
            <div class="navicons">
                <div class="navicon">
                    <a href="home.php">
                        <span class="material-symbols-outlined">
                            home
                        </span>
                        <b class="navbarText navbarTextAppear" id="text1">Home</b>
                    </a>
                </div>
                <div class="navicon">
                    <a href="todo.php">
                        <span class="material-symbols-outlined scale-up">
                            checklist
                        </span>
                        <b class="navbarText navbarTextAppear" id="text2">To-do</b>
                    </a>
                </div>
                <div class="navicon">
                    <a href="calendar.php">
                        <span class="material-symbols-outlined">
                            calendar_month
                        </span>
                        <b class="navbarText navbarTextAppear" id="text2">Calendar</b>
                    </a>
                </div>
                <div class="navicon">
                    <a href="database/logout.php">
                        <span class="material-symbols-outlined">
                            door_open
                        </span>
                        <b class="navbarText navbarTextAppear" id="text2">Logout</b>
                    </a>
                </div>
            </div>
        </div>
        <div class="right">
            <div id="todoTitles">
                <h2>TO DO</h2>
                <div id="todoContainer">
                    <div id="listContainer">
                        <?php $i; $counter = 1;
                        while($row = mysqli_fetch_assoc($result)){
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
                            <a href="todo.php?id=<?php echo $i;?>"><textarea readonly name='<?php $i?>' class='todoTitle' cols='1' rows='1' placeholder='title'><?php echo $title ?></textarea></a>
                        <?php 
                    } ?>
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
            
                <?php 
                if(isset($_GET["id"])){
                    $id = $_GET["id"];
                    $searchData = "SELECT * FROM tdl WHERE id = '$id' AND username = '$username'";
                    $resultSearch = mysqli_query($conn,$searchData);
                    $rowData = mysqli_fetch_assoc($resultSearch); 

                    $test = $_SERVER["HTTP_HOST"];
                    $p = $_SERVER['HTTP_REFERER'];
                    $stayed = false;

                    
                    
                    if($_SERVER['HTTP_REFERER'] == "http://$test/todo.php"){
                        echo "<script>appear()</script>";
                        echo "<style>.navbarAppear{width:4vw !important;} .navbarTextAppear {padding-left: 0 !important; font-size: 0 !important;}</style>";
                    }
                    else if($_SERVER['HTTP_REFERER'] == "http://$test/home.php" || $_SERVER['HTTP_REFERER'] == "http://$test/calendar.php"){
                        //blank
                    }
                    else{
                        echo "<script>stay()</script>"; 
                        echo "<style>#todoDescription{width:60% !important;margin-left:2vw !important; transition:0 !important;} #todoTitles{width: 25% !important;}</style>";
                        echo "<style>.navbarAppear{width:4vw !important;} .navbarTextAppear {padding-left: 0 !important; font-size: 0 !important;}</style>";
                    }
                    
                    
                ?>
                    <div id="todoDescription">
                    <textarea name='title' id='txt1' cols='1' rows='1' placeholder='title' oninput='inputTitle()'><?php echo $rowData['title'] ?></textarea>
                    <textarea name='isi' id='txt2' cols='120' rows='20' placeholder='task' ><?php echo $rowData['isi']?></textarea>
                    <div class="inputForm">
                            <input type = 'submit' value = 'Submit' id = 'txt3'>
                            <div class="deleteButton">
                                <a href = "database/delete.php?id=<?php echo $id;?>">
                                    Delete
                                </a>
                            </div>
                        </div> 
                    </div>
                    <?php }?>

                    <script>  
                        let list2 =document.querySelectorAll(".todoTitle")
                        const title2 =document.querySelector("#txt1")

                        function inputTitle(){
                            list2[<?php echo $_GET["id"]?> - 1].value = title2.value
                        }
                    </script>
        </div>
    </section>
</form>