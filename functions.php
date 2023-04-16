<?php
    require "config.php";

    function connect() {
        $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

        if($mysqli -> connect_errno != 0) {
            $error = mysqli_error();
            $date = date("F j, Y, g:i a");
            $output = "{$error} | {$date} \r\n";
            file_put_contents("log.txt", $output, FILE_APPEND);
            return false;
        }
        else {
            return $mysqli;
        }
    }

    function registerUser($username, $email, $password, $confirm) {
        $mysqli = connect();
        $args = func_get_args();

        foreach ($args as &$arg) {  }

        foreach ($args as &$arg) { 
            if(empty($arg)) return "All fields are required.";
            else if(preg_match("/([<|>])/", $arg)) return "Fields contain invalid characters: < or >.";
            else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) return "Invalid Email.";
            else $arg = trim($arg);
        }
        
        # Create and execute prepared statement
        $prepared_statement = $mysqli -> prepare("SELECT email FROM users WHERE email = ?");
        $prepared_statement -> bind_param("s", $email);
        $prepared_statement -> execute();
        $result = $prepared_statement -> get_result();

        # Get row of data
        $data = $result -> fetch_assoc();

        if($data != NULL) return "Email already exists.";

        $prepared_statement = $mysqli -> prepare("SELECT username FROM users WHERE username = ?");
        $prepared_statement -> bind_param("s", $username);
        $prepared_statement -> execute();
        $result = $prepared_statement -> get_result();

        $data = $result -> fetch_assoc();

        if($data != NULL) return "Username already exists.";

        if(strlen($username) > MAX_LENGTH) return "Username must not excede 30 characters.";

        if(strlen($password) > MAX_LENGTH) return "Password must not excede 30 characters.";

        if($password != $confirm) return "Passwords don't match.";

        $hashed_password = hash("sha256", $password);

        $prepared_statement = $mysqli -> prepare("INSERT INTO users(username, password, email) VALUES (?,?,?)");
        $prepared_statement -> bind_param("sss", $username, $hashed_password, $email);
        $prepared_statement -> execute();

        if($prepared_statement->affected_rows != 1) return "An error occured. Please try again.";
        else return "Success";
    }

    function login($username, $password) {
        $mysqli = connect();
        $args = func_get_args();

        foreach ($args as &$arg) { 
            if(empty($arg)) return "All fields are required.";
            else {
                $arg = trim($arg);
                $arg = filter_var($arg, FILTER_SANITIZE_STRING);
            }
        }

        $prepared_statement = $mysqli -> prepare("SELECT username, password FROM users WHERE username = ?");
        $prepared_statement -> bind_param("s", $username);
        $prepared_statement -> execute();
        $result = $prepared_statement -> get_result();

        $data = $result -> fetch_assoc();

        if($data == NULL) return "Username or password is incorrect.";

        if(hash("sha256", $password) != $data["password"]) return "Username or password is incorrect.";
        else {
            $_SESSION["user"] = $username;
            header("location: index.php");
            exit();
        }
    }

    function logout() {
        session_destroy();
        header("location: index.php");
        exit();
    }
?>