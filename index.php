<?php
    require "functions.php";
    if(isset($_GET["logout"])) {
        logout();
    }
?>

<!-- Home Screen -->

<!DOCTYPE html>
<html>
  <head>
    <title>Automatic Games (UK)</title> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles/default.css">
    <link rel="stylesheet" href="Styles/navbar.css">
    <link rel="shortcut icon" type="image/x-icon" href="Assets/favicon.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <meta name="author" content="Matthew Wood" />

    <meta http-equiv="Pragma" content="no-cache" />
  </head>
  <body>
    <?php include "nav.php" ?>
    <a href ="?logout"> Logout </a>
  </body>
</html>