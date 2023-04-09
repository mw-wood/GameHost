<?php
    require "functions.php";
    if(isset($_POST["submit"])) $response = registerUser($_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirm"]);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Signup Form</title>
</head>
<body>
    <h1>Signup Form</h1>
    <form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?php echo@$_POST["username"] ?>" required><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo@$_POST["email"] ?>"  required><br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" value="<?php echo@$_POST["password"] ?>"  required><br><br>

    <label for="confirm">Confirm Password:</label>
    <input type="password" name="confirm" id="confirm" value="<?php echo@$_POST["confirm"] ?>"  required><br><br>

    <input type="submit" id="submit" name="submit" value="Submit">
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

</body>
</html>