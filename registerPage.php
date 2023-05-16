<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tense-Fi</title>
    <link href="a.css" rel="stylesheet">
    <script defer src="index.js"></script>
</head>
<body>
    <section class="login-page">
        <div class="login-container">   
            <div class="sub-page" id="left">
                <p id="greetings">Welcome!</p>
                <p id="quote">With Tense-Fi, productivity becomes a necessity.</p>
            </div>
            <div class="sub-page" id="right">
                <p class="sub-header">Register Page</p>
                <form action="database/register.php" method="post">
                    <?php if(isset($_GET['errorRegister'])){ ?>
                        <p class = "error"> <?php echo $_GET['errorRegister']; ?></p>
                    <?php } ?>  
                    <input class="uname" type="text" name="username" placeholder="Username">
                    <input class="pass" type="password" name="password" placeholder="Password">
                    <hr class="divider">
                    <input class="submitButton" type="submit" value="register" >         
                </form>
                <a href="loginPage.php" id="changingButton">Login</a>    
            </div>
        </div>
    </section>
</body>
</html>