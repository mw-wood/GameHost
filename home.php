<?php
    require "functions.php";    
    if(!isset($_SESSION["user"])) {
        header("location: login.php");
        exit();
    }

    if(isset($_GET["logout"])) {
        logout();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Works</title>
    </head>
    <body>
        <h1> <?php echo $_SESSION["user"] ?> </h1>
        <a href ="?logout"> Logout </a>
    </body>
</html>