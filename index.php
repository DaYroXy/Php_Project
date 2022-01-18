<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/global.css">
    <link rel="stylesheet" href="Styles/index.css">
    <link rel="stylesheet" href="Styles/navbar.css">
    <title>ShopMarket</title>
</head>
<body>
    <!-- Navigation Bar -->

    <?php $selected="Home"; require_once "helper/navbar.php" ?>

    <div class="wrapper">
        <img src="images/start.jpg" alt="Welcome-Image" class="Welcome-Image">
        <div class="welcome-content">
            
            <div class="text-header">
                <h1>Welcome to SHOP<span>FORCE</span></h1>
            </div>

            <div class="text-content">
                <p>This website was made for the php project i hope you enjoy it thank you for visiting.</p>
                <button>Discover More</button>
            </div>
        </div>
    </div>

    <div class="home-items-content">
        
    </div>
</body>
</html>