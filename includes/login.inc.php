
<?php

// Check if method is post and was clicked on register button
if($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_POST["Login"])) {
    die(header("location: ../login.php"));
} 

// check if all inputs are recieved
if(!isset($_POST["username"]) || !isset($_POST["password"])) {
    die(header("location: ../login.php?error=all fields required"));
}

$username =  $_POST["username"];
$password = $_POST["password"];

// check if inputs are empty
if(empty(trim($username)) || empty(trim($password))){
    die(header("location: ../login.php?error=fields cannot be set empty"));
}


// database connection
require_once "db-connection.php";

// get register function
require_once "functions.inc.php";


// check if user exists function from functions.inc.php
LoginUser($username, $password, $pdo, isset($_POST["remember"]));


?>