<?php
    require "functions.php";
    if(isset($_POST["signup-submit"])) $response = registerUser($_POST["signup-username"], $_POST["signup-email"], $_POST["signup-password"], $_POST["signup-confirm"]);
    else if(isset($_POST["login-submit"])) $response = login($_POST["login-username"], $_POST["login-password"]);
?>

<!-- Signup and login form -->

<!DOCTYPE html>
<html>
<head>
<head>
    <title>Automatic Games (UK)</title> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles/default.css">
    <link rel="stylesheet" href="Styles/navbar.css">
    <link rel="stylesheet" href="Styles/auth.css">
    <link rel="shortcut icon" type="image/x-icon" href="Assets/favicon.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <meta name="author" content="Matthew Wood" />

    <meta http-equiv="Pragma" content="no-cache" />
  </head>
</head>
<body>
    <?php include "nav.php" ?>  

    <div id="auth-container" class="auth-container center">
        <div id="button-container" class="button-container">
            <div id="button" class="button"></div>
            <button type="button" class="switch" onclick="login()"> Log in </button>
            <button type="button" class="switch" onclick="register()"> Sign up </button>
        </div>

        <div id="login-form" class="login-form">
            <form method="POST" action="">
                <input type="text" name="login-username" id="login-username" value="<?php echo@$_POST["login-username"] ?>" placeholder="Username" required><br><br>

                <input type="password" name="login-password" id="login-password" value="<?php echo@$_POST["login-password"] ?>" placeholder="Password" required><br><br>

                <input type="submit" id="login-submit" name="login-submit" value="Log in">
            </form>
            <p> <?php echo @$response; ?> </p>
        </div>
        
        <div id="signup-form" class="register-form">
            <form method="POST" action="">
                <input type="text" name="signup-username" id="signup-username" value="<?php echo@$_POST["signup-username"] ?>" placeholder="Username" required><br><br>

                <input type="email" name="signup-email" id="signup-email" value="<?php echo@$_POST["signup-email"] ?>" placeholder="Email" required><br><br>

                <input type="password" name="signup-password" id="signup-password" value="<?php echo@$_POST["signup-password"] ?>" placeholder="Password" required><br><br>

                <input type="password" name="signup-confirm" id="signup-confirm" value="<?php echo@$_POST["signup-confirm"] ?>" placeholder="Confirm password" required><br><br>

                <input type="submit" id="submit" name="signup-submit" value="Create Account">
            </form>
        <?php
            if(@$response == "Success"){ ?>
            <p> Your registration was successful. </p>
        <?php
            }
            else { ?>
            <p> <?php echo @$response; ?> </p>
        <?php 
            }
        ?>
        </div>
    </div>
    <script src="Assets/login.js"></script>
</body>
</html>