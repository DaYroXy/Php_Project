<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/global.css">
    <link rel="stylesheet" href="Styles/<?php echo $selected ?>.css">
    <link rel="stylesheet" href="Styles/navbar.css">
    <link rel="stylesheet" href="Styles/footer.css">
    <link rel="shortcut icon" href="../images/ShopForceLogo.png" type="image/x-icon">
    <title>ShopForce™</title>
</head>
<body>

<div class="navigation">
    <div class="nav-Content">
        <a href="../index.php"><img class="Logo" src="../images/ShopForce.png" alt="Logo"></a>

        <ul class="nav-links" id="navLinks">
            <li><a <?php if($selected == "index")  { echo "class='selected'";} ?> href="../index.php">Home</a></li>
            <li><a <?php if($selected == "shop")  { echo "class='selected'";} ?> href="../shop.php">Shop</a></li>
            <li><a <?php if($selected == "cart")  { echo "class='selected'";} ?> href="../cart.php">Cart</a><span>1</span></li>
            <li><a <?php if($selected == "contact")  { echo "class='selected'";} ?> href="../contact.php">Contact</a></li>
            <li class="resp-col">
                <div class="res-Avatar" id="resAvatar">
                    <img src="../images/defaultAvatar.png" class="Avatar-Logo" alt="Avatar-Logo">
                    <a href="#">Log In</a>
                </div>
            </li>
        </ul>
    
        <div class="Avatar">
            <img src="../images/defaultAvatar.png" class="Avatar-Logo" alt="Avatar-Logo">
            <a href="#">Log In</a>
        </div>

        <div class="menu-icon" id="hamburger">
            <span class="line-1"></span>
            <span class="line-2"></span>
            <span class="line-3"></span>
        </div>
    </div>
</div>
