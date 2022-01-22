
<?php

    // Check if method is post and was clicked on register button
    if($_SERVER['REQUEST_METHOD'] != 'POST' || !$_POST["Register"]) {
        die(header("location: ../register.php"));
    } 

    // check if all inputs are recieved
    if(!isset($_POST["username"]) || !isset($_POST["password"]) || !isset($_POST["veirfy-password"])) {
        die(header("location: ../register.php?error=all fields required"));
    }

    $username =  $_POST["username"];
    $password = $_POST["password"];
    $verify_password = $_POST["veirfy-password"];
    $admin = 0;


    // check if inputs are empty
    if(empty(trim($username)) || empty(trim($password)) || empty(trim($verify_password))){
        die(header("location: ../register.php?error=fields cannot be set empty"));
    }

    // check if passwords are equal
    if($password === $verify_password) {
        
        // database connection
        require_once "db-connection.php";

        // get register function
        require_once "functions.inc.php";

        // if user exists
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?;');
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->execute();
    
        // user exists then go to login
        if($row = $stmt->fetch()) {
            die(header("location: ../login.php?error=user already exists"));
        }

        // if user doesnt exists then create one
        CreateUser($username, $password, $admin, $pdo);
        

    }


?>