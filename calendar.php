<?php 
session_start();

if(!isset($_SESSION["username"])){
    header("Location:loginPage.php");
    exit(); 
}

include("database/dbconnect.php");  
$username = $_SESSION["username"];
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tense-Fi</title>
    <link rel="stylesheet" href="b.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script defer src="todo.js"></script>
</head>
<body>

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
            <?php if(isset($_GET["date"]) && isset($_GET["month"]) && isset($_GET["year"]) ){ 
                $date = $_GET['date'];
                $month = $_GET['month'];
                $year = $_GET['year'];
                $sqlFind = "SELECT * FROM calendar WHERE date = '$date' AND month = '$month' AND year = '$year' AND username = '$username';";
                $findResult = mysqli_query($conn, $sqlFind);?>
                <form class = "note" action="database/calendarEdit.php?date=<?php echo $date ?>&month=<?php echo $month ?>&year=<?php echo $year ?>" method="post">
                    <a href = "calendar.php">
                        <span class="material-symbols-outlined" id="note-close">
                        close
                        </span>
                    </a>
                    
                    </a>
                    <textarea class = "note-text" name="content"><?php echo mysqli_fetch_assoc($findResult)['content']?></textarea>
                    <div class = "note-button">
                        <input type="submit" value="enter">
                    <a href="calendar.php">
                        <span class="material-symbols-outlined" id="note-close">
                            delete
                        </span>
                    </a>
                    </div>
                </form>
            <?php }?>
            <div class="wrapper">
                <header>
                  <p class="current-date"></p>
                  <div class="icons">
                    <span id="prev" class="material-symbols-outlined">chevron_left</span>
                    <span id="next" class="material-symbols-outlined">chevron_right</span>
                  </div>
                </header>
                <div class="calendar">
                  <ul class="weeks">
                    <li>Sun</li>
                    <li>Mon</li>
                    <li>Tue</li>
                    <li>Wed</li>
                    <li>Thu</li>
                    <li>Fri</li>
                    <li>Sat</li>
                  </ul>
                  <ul class="days"></ul>
                </div>
              </div>
            
        </div>
    </section>

    <script>
        const daysTag = document.querySelector(".days"),
        currentDate = document.querySelector(".current-date"),
        prevNextIcon = document.querySelectorAll(".icons span");
        // getting new date, current year and month
        let date = new Date(),
        currDate = date.getDate(),
        currYear = date.getFullYear(),
        currMonth = date.getMonth();

        // storing full name of all months in array
        const months = ["January", "February", "March", "April", "May", "June", "July",
                    "August", "September", "October", "November", "December"];
        const renderCalendar = () => {
            let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
            lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
            lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
            lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
            let liTag = "";
            for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
                liTag += `<li class="inactive" >${lastDateofLastMonth - i + 1}</li>`;
            }
            for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
                // adding active class to li if the current day, month, and year matched
                let isToday = i === date.getDate() && currMonth === new Date().getMonth() 
                            && currYear === new Date().getFullYear() ? "active" : "";
                liTag += `<li class="${isToday}"><a href = "database/calendarCreate.php?date=${i}&month=${currMonth+1}&year=${currYear}">${i}</a></li>`;           
            }
            for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
                liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
            }
            currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
            daysTag.innerHTML = liTag;
        }
        
        renderCalendar();
        prevNextIcon.forEach(icon => { // getting prev and next icons
            icon.addEventListener("click", () => { // adding click event on both icons
                // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
                currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
                if(currMonth < 0 || currMonth > 11){
                    date = new Date(currYear, currMonth, new Date().getDate());
                    currYear = date.getFullYear(); // updating current year with new date year
                    currMonth = date.getMonth(); // updating current month with new date month
                } else{
                    date = new Date(); // pass the current date as date value
                }
                renderCalendar(); // calling renderCalendar function
            });
        });
    </script>
    
</body>
</html>