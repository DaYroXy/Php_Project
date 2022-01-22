<?php

// Check if method is post and was clicked on register button
if($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_POST["ProductId"])) {
    die(header("location: ../login.php"));
} 

// database connection
require_once "db-connection.php";

// get register function
require_once "functions.inc.php";

session_start();

$productId = $_POST["ProductId"];
$userId = $_SESSION["user"]["id"];

if(isset($_POST["AddToCart"])) {
    AddProductToCart($pdo, $userId, $productId);
}




?>