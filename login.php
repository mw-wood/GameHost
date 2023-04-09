<?php
    require "functions.php";
    if(isset($_POST["submit"])) $response = login($_POST["username"], $_POST["password"]);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?php echo@$_POST["username"] ?>" required><br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" value="<?php echo@$_POST["password"] ?>"  required><br><br>

    <input type="submit" id="submit" name="submit" value="Submit">
    </form>

     <p> <?php echo @$response; ?> </p>

</body>
</html>