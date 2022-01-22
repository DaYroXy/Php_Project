<?php $selected="index"; require_once "helper/navbar.php" ?>



<div class="wrapper">
    <div class="overlay"></div>
        <div class="welcome-content">
            
            <div class="text-header">
                <h1>WELCOME TO SHOP<span>FORCE</span></h1>
            </div>

            <div class="text-content">
                <p>This website was made for the php project i hope you enjoy it thank you for visiting.</p>
                <button onclick="location.href = 'shop.php'">Discover More</button>
            </div>
        </div>
    <img src="images/start.jpg" alt="Welcome-Image" class="Welcome-Image">
    
</div>

<div class="home-items-content">

    <div class="title">
        <h1>Our most popular products</h1>
    </div>

    <div class="items-list">

        <?php
            $products = GetPopular($pdo);

            foreach($products as &$product) { ?>
            <div class="card">
                <div class="product-info">
                    <div class="product-inner-info">
                        <h4><?php echo $product["name"]; ?></h4>
                        <p><?php echo $product["description"]; ?></p>
                        <div class="price-buy">
                            <h2>$<?php echo $product["price"]; ?></h2>
                            <?php if(isset($user)) {
                                echo '<form action="includes/cart.inc.php" method="post">';
                            } else {
                                echo '<form action="login.php">';
                            } ?>
                                <input type="submit" name="AddToCart" value="Add to cart"></input>
                                <input type="hidden" name="ProductId" value="<?php echo $product['id']; ?>"></input>
                            </form>
                        </div>
                    </div>
                </div>
                <img src="images/products/<?php echo $product['image']; ?>" alt="">
            </div>
        <?php } ?>
            
    </div>

</div>



<?php require_once "helper/footer.php" ?>