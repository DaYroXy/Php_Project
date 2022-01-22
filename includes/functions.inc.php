<?php

function CreateUser($username, $password, $admin, $pdo) {
    $stmt = $pdo->prepare('INSERT INTO users(username, password, admin) VALUES(?,?,?)');
    $stmt->bindParam(1, $username, PDO::PARAM_STR);
    $stmt->bindParam(2, $password, PDO::PARAM_STR);
    $stmt->bindParam(3, $admin, PDO::PARAM_BOOL);
    $status = $stmt->execute();

    // check if error
    if(!$status) {
        die($stmt->errorCode());
    }

    // Login user automaticlly after signup
    LoginUser($username, $password, $pdo);
}


function LoginUser($username, $password, $pdo) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bindParam(1, $username, PDO::PARAM_STR);
    $status = $stmt->execute();

    // check if error
    if(!$status) {
        die($stmt->errorCode());
    }

    // Fetch user details
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user["password"] == $password) {

        // set user details in a session

        session_start();
        $_SESSION["user"] = $user;
        header("location: ../index.php");

    }else {
        die(header("location:../login.php?error=incorrectUP"));
    }

    $pdo = null;

}


function SignOut($pdo) {
	session_start();
	session_unset();
	session_destroy();
	header("location: ../index.php");
	exit();
}

function GetProducts($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM products");
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    return $products;
}

?>