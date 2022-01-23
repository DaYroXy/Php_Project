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
    LoginUser($username, $password, $pdo, true);
}


function LoginUser($username, $password, $pdo, $remember) {
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

        if(!$remember) {
            setcookie("username", $username, time()+36500, '/');
            setcookie("password", $password, time()+36500, '/');
            setcookie("remember", "on", time()+36500, '/');
        } else {
            setcookie("username", $username, time()-3600, '/');
            setcookie("password", $password, time()-3600, '/');
            setcookie("remember", "on", time()-3600, '/');
        }

        if($user["admin"] > 0) {
            header("location: ../admin.php");
        } else {
            header("location: ../index.php");
        }

    }else {
        die(header("location:../login.php?error=incorrect username/password"));
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

function GetProductById($pdo, $productId) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id=?");
    $stmt->bindParam(1, $productId, PDO::PARAM_STR);
    $stmt->execute();

    $products = $stmt->fetch(PDO::FETCH_ASSOC);

    $pdo = null;
    return $products;
}

function GetProductsByCategory($pdo, $category) {
    $stmt = $pdo->prepare("SELECT * from products WHERE category=? ORDER BY id desc");
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

function AddProductToCart($pdo, $userid, $productId, $location) {
    $currentCart = GetCart($pdo, $userid);

    $found = false;
    foreach($currentCart as &$product) {
        if($product["productid"] === $productId) {
            $found = true;
            break;
        }
    }

    if($found) {
        $stmt = $pdo->prepare("UPDATE CART SET quantity = quantity + 1 WHERE userid=? AND productid=?");
        $stmt->bindParam(1, $userid, PDO::PARAM_STR);
        $stmt->bindParam(2, $productId, PDO::PARAM_STR);
        $status = $stmt->execute();

        if(!$status) {
            die($stmt->errorCode());
        }

    } else {
        
        $quantity = 1;
        $stmt = $pdo->prepare("INSERT INTO CART(userid, productid, quantity) VALUES(?,?,?)");
        $stmt->bindParam(1, $userid, PDO::PARAM_STR);
        $stmt->bindParam(2, $productId, PDO::PARAM_STR);
        $stmt->bindParam(3, $quantity, PDO::PARAM_STR);
        $status = $stmt->execute();
    
        if(!$status) {
            die($stmt->errorCode());
        }

    }

    $pdo = null;

    die(header("location: ../$location.php"));
}


function RemoveFromCart($pdo, $productId, $userid) {

    $stmt = $pdo->prepare("DELETE FROM cart WHERE userid=? AND productid=?");
    $stmt->bindParam(1, $userid, PDO::PARAM_STR);
    $stmt->bindParam(2, $productId, PDO::PARAM_STR);
    $status = $stmt->execute();

    if(!$status) {
        die($stmt->errorCode());
    }

    $pdo = null;

}


function DecreaseProductFromCart($pdo, $userid, $productId) {
    $product = GetProductById($pdo, $productId);

    $stmt = $pdo->prepare("SELECT * FROM cart WHERE userid=? AND productid =?");
    $stmt->bindParam(1, $userid, PDO::PARAM_INT);
    $stmt->bindParam(2, $productId, PDO::PARAM_INT);
    $status = $stmt->execute();

    if(!$status) {
        die($stmt->errorCode());
    }

    $inCart = $stmt->fetch(PDO::FETCH_ASSOC);


    if($inCart["quantity"] > 1) {
        $stmt = $pdo->prepare("UPDATE CART SET quantity = quantity - 1 WHERE userid=? AND productid=?");
        $stmt->bindParam(1, $userid, PDO::PARAM_INT);
        $stmt->bindParam(2, $productId, PDO::PARAM_INT);
        $status = $stmt->execute();
    
        if(!$status) {
            die($stmt->errorCode());
        }
    
        $pdo = null;
    } else {
        RemoveFromCart($pdo, $productId, $userid);
    }



    die(header("location: ../cart.php"));
}


function CalculateCartPrices($pdo, $cart) {

    
    $ItemsPrices = 0;
    foreach($cart as &$product) {
        $prod = GetProductById($pdo, $product["productid"]);
        $ItemsPrices += $prod["price"] * $product["quantity"];
    }

    $Shipping = (($ItemsPrices * 8) / 100);
    $Total = $ItemsPrices + $Shipping;

    $CartPrice = array(
        "items" => $ItemsPrices,
        "shipping" => $Shipping,
        "total" => $Total
    );
    $pdo = null;
    return $CartPrice;
}

function UpdateProduct($pdo, $product) {

    print_r($product);
    $stmt = $pdo->prepare("UPDATE products SET name=?, description=?, image=?, price=?, quantity=?, category=? WHERE id=?");
    $stmt->bindParam(1, $product["name"], PDO::PARAM_STR);
    $stmt->bindParam(2, $product["description"], PDO::PARAM_STR);
    $stmt->bindParam(3, $product["image"], PDO::PARAM_STR);
    $stmt->bindParam(4, $product["price"], PDO::PARAM_STR);
    $stmt->bindParam(5, $product["quantity"], PDO::PARAM_STR);
    $stmt->bindParam(6, $product["category"], PDO::PARAM_STR);
    $stmt->bindParam(7, $product["id"], PDO::PARAM_STR);
    $status = $stmt->execute();

    if(!$status) {
        die($stmt->errorCode());
    }

    $pdo = null;

    die(header("location: ../index.php"));
}

function RemoveProductFromDB($pdo, $productId) {

    $stmt = $pdo->prepare("DELETE FROM cart WHERE productid=?");
    $stmt->bindParam(1, $productId, PDO::PARAM_STR);
    $status = $stmt->execute();

    if(!$status) {
        die($stmt->errorCode());
    }


    $stmt = $pdo->prepare("DELETE FROM products WHERE id=?");
    $stmt->bindParam(1, $productId, PDO::PARAM_STR);
    $status = $stmt->execute();

    if(!$status) {
        die($stmt->errorCode());
    }

    $pdo = null;

    die(header("location: ../admin.php?removed sucess"));

}

function AddProductToDB($pdo, $product) {

    print_r($product);

    $stmt = $pdo->prepare("INSERT INTO products(name,description,image,price,quantity,category) VALUES(?,?,?,?,?,?)");
    $stmt->bindParam(1, $product["name"], PDO::PARAM_STR);
    $stmt->bindParam(2, $product["description"], PDO::PARAM_STR);
    $stmt->bindParam(3, $product["image"], PDO::PARAM_STR);
    $stmt->bindParam(4, $product["price"], PDO::PARAM_STR);
    $stmt->bindParam(5, $product["quantity"], PDO::PARAM_STR);
    $stmt->bindParam(6, $product["category"], PDO::PARAM_STR);
    $status = $stmt->execute();

    if(!$status) {
        die($stmt->errorCode());
    }

    $pdo = null;

    die(header("location: ../admin.php?success=Product Added"));
}

function CheckEmptyKeyValue($array, $skip) {
    foreach ($array as $key => $value) {
        if($skip != $key) {
            if(empty($value)) {
                return $key;
            }
        }
    }
    return false;
}


function PurchaseItem($pdo, $productId, $amount, $userid) {
    $stmt = $pdo->prepare("UPDATE products SET quantity = quantity - ? WHERE id=?");
    $stmt->bindParam(1, $amount, PDO::PARAM_STR);
    $stmt->bindParam(2, $productId, PDO::PARAM_STR);
    $status = $stmt->execute();

    if(!$status) {
        die($stmt->errorCode());
    }

    RemoveFromCart($pdo, $productId, $userid);
    $pdo = null;
}


?>