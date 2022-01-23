<?php

session_start();

if(!isset($_SESSION["user"]) || $_SESSION["user"]["admin"] < 1) {
    die(header("location: ../index.php"));
} 



// database connection
require_once "db-connection.php";

// get register function
require_once "functions.inc.php";

if(isset($_POST["Update"])) {

    $target_dir = "../images/products/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);


    if(empty(basename($_FILES["image"]["name"]))) {
        $image = $_POST["DefaultImage"];
    } else if(file_exists($target_file)){
        $image = basename($_FILES["image"]["name"]);
    } else {
        $image = basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }


    $product = array(
        "id" => $_POST["ProductId"],
        "name" => $_POST["Name"],
        "description" => $_POST["Description"],
        "image" => $image,
        "price" => $_POST["Price"],
        "quantity" => $_POST["Quantity"],
        "category" => $_POST["Category"]
    );
    if($error = CheckEmptyKeyValue($product, "image")) {
        die(header("location: ../index.php?error=$error"));
    }

    UpdateProduct($pdo, $product);
}


if(isset($_GET["remove"])) {
    $productId = $_GET["id"]; 
    RemoveProductFromDB($pdo, $productId);
}



if(isset($_POST["AddProduct"])) {

    // print_r($_POST);
    
    $target_dir = "../images/products/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    $product = array(
        "name" => $_POST["Name"],
        "description" => $_POST["Description"],
        "image" => basename($_FILES["image"]["name"]),
        "price" => $_POST["Price"],
        "quantity" => $_POST["Quantity"],
        "category" => $_POST["Category"]
    );
    

    if($error = CheckEmptyKeyValue($product, true)) {
        die(header("location: ../admin.php?error=$error"));
    }

    if(!file_exists($target_file)) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    AddProductToDB($pdo, $product);
}


?>