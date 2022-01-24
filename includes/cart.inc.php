<?php

session_start();

// Check if method is post and was clicked on register button
if($_SERVER['REQUEST_METHOD'] != 'POST') {

    if($_SESSION["user"]) {
        die(header("location: ../shop.php"));
    } else{
        die(header("location: ../login.php"));
    }

} 

$userid = $_SESSION["user"]["id"];


// database connection
require_once "db-connection.php";

// get register function
require_once "functions.inc.php";


if(isset($_POST["purchase"])) {
    $productsInCart = GetCart($pdo, $userid);

    if(empty($productsInCart)) {
        die(header("location: ../cart.php?error=cart is empty"));
    }

    foreach($productsInCart as &$cartProduct) {
        print_r($cartProduct);
        $product = GetProductById($pdo, $cartProduct["productid"]);

        if(($product["quantity"] - $cartProduct["quantity"]) < 0) {
            die(header("location: ../cart.php?error=We dont have enough items."));
        } else {
            PurchaseItem($pdo, $cartProduct["productid"], $cartProduct["quantity"], $userid);
        }
    }
    die(header("location: ../cart.php?success=thank you for buying"));
}


if(!isset($_POST["ProductId"])) {
    if($_SESSION["user"]) {
        die(header("location: ../shop.php"));
    } else{
        die(header("location: ../login.php"));
    }
}

$productId = $_POST["ProductId"];

if(isset($_POST["AddToCart"])) {

    if(!isset($_POST["continue"])) {
       die(header("location: ../cart")); 
    }


    $continue = $_POST["continue"];

    if(isset($_POST["location"])) {
        AddProductToCart($pdo, $userid, $productId, "index", $continue);
    } else {
        AddProductToCart($pdo, $userid, $productId, "shop", $continue);
    }
}

if(isset($_POST["RemoveFromCart"])) {
    RemoveFromCart($pdo, $productId, $userid);
    die(header("location: ../cart.php?success=item removed successfully"));
}

if(isset($_POST["increaseQuantity"])) {
    AddProductToCart($pdo, $userid, $productId, "cart", false);
}

if(isset($_POST["decreaseQuantity"])) {
    DecreaseProductFromCart($pdo, $userid, $productId);
}



?>