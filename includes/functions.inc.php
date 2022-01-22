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
        $_SESSION["cart"] = GetCart($pdo, $user["id"]);
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
    $stmt = $pdo->prepare("SELECT * FROM products ORDER BY id DESC");
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    return $products;
}

function GetProductsByCategory($pdo, $category) {
    $stmt = $pdo->prepare("SELECT * from products WHERE category=?");
    $stmt->bindParam(1, $category, PDO::PARAM_STR);
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    return $products;
}

function GetPopular($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM products ORDER BY quantity desc LIMIT 6");
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    return $products;
}

function GetCart($pdo, $userid) {
    $stmt = $pdo->prepare("SELECT * from cart WHERE userid=?");
    $stmt->bindParam(1, $userid, PDO::PARAM_STR);
    $stmt->execute();

    $userCart = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    return $userCart;
}

function AddProductToCart($pdo, $userId, $productId) {
    $currentCart = GetCart($pdo, $userId);

    $found = false;
    foreach($currentCart as &$product) {
        if($product["productid"] === $productId) {
            $found = true;
            break;
        }
    }

    if($found) {
        $stmt = $pdo->prepare("UPDATE CART SET quantity = quantity + 1 WHERE userid=? AND productid=?");
        $stmt->bindParam(1, $userId, PDO::PARAM_STR);
        $stmt->bindParam(2, $productId, PDO::PARAM_STR);
        $status = $stmt->execute();

        if(!$status) {
            die($stmt->errorCode());
        }

    } else {
        
        $quantity = 1;
        $stmt = $pdo->prepare("INSERT INTO CART(userid, productid, quantity) VALUES(?,?,?)");
        $stmt->bindParam(1, $userId, PDO::PARAM_STR);
        $stmt->bindParam(2, $productId, PDO::PARAM_STR);
        $stmt->bindParam(3, $quantity, PDO::PARAM_STR);
        $status = $stmt->execute();
    
        if(!$status) {
            die($stmt->errorCode());
        }

    }

    $_SESSION['cart'] = GetCart($pdo, $userId);
    $pdo = null;

    die(header("location: ../cart.php"));
}

?>