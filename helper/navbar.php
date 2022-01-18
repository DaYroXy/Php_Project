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
    <title>ShopMarket</title>
</head>
<body>

<div class="navigation">
    <div class="nav-Content">
        <a href="#"><img class="Logo" src="../images/ShopForce.png" alt="Logo"></a>
    
        <ul class="nav-links">
            <li><a <?php if($selected == "index")  { echo "class='selected'";} ?> href="#">Home</a></li>
            <li><a <?php if($selected == "Shop")  { echo "class='selected'";} ?> href="#">Shop</a></li>
            <li><a <?php if($selected == "Cart")  { echo "class='selected'";} ?> href="#">Cart</a><span>0</span></li>
            <li><a <?php if($selected == "Contact")  { echo "class='selected'";} ?> href="#">Contact</a></li>
        </ul>
    
        <div class="Avatar">
            <img src="../images/defaultAvatar.png" class="Avatar-Logo" alt="Avatar-Logo">
            <a href="#">Log In</a>
        </div>
    </div>
</div>
