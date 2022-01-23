<?php

session_start();

// Check if method is post and was clicked on register button
if($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_POST["ProductId"])) {

    if($_SESSION["user"]) {
        die(header("location: ../shop.php"));
    } else{
        die(header("location: ../login.php"));
    }

} 

// database connection
require_once "db-connection.php";

// get register function
require_once "functions.inc.php";


$productId = $_POST["ProductId"];
$userid = $_SESSION["user"]["id"];

if(isset($_POST["AddToCart"])) {
    AddProductToCart($pdo, $userid, $productId, "shop");
}

if(isset($_POST["RemoveFromCart"])) {
    RemoveFromCart($pdo, $productId, $userid);
}

if(isset($_POST["increaseQuantity"])) {
    AddProductToCart($pdo, $userid, $productId, "cart");
}

if(isset($_POST["decreaseQuantity"])) {
    DecreaseProductFromCart($pdo, $userid, $productId);
}





?>