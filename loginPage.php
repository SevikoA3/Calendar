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
                <p class="sub-header">Login Page</p>
                <form action="database/login.php" method = "post">
                    <?php if(isset($_GET['errorLogin'])){ ?>
                        <p class = "error"> <?php echo $_GET['errorLogin']; ?></p> 
                    <?php } ?>
                    <?php if(isset($_GET['registSuccess'])){ ?>
                        <p class = "success"> <?php echo $_GET['registSuccess']; ?></p> 
                    <?php } ?>
                    <input class="uname" type="text" name="username" placeholder="Username">
                    <input class="pass" type="password" name="password" placeholder="Password">
                    <hr class="divider">
                    <input class="submitButton" type="submit" value="login" >
                </form>
                <a href="registerPage.php" id="changingButton">Register</a>
            </div>
        </div>
    </section>
</body>
</html>