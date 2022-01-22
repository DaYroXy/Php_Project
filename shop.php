<?php $selected="shop"; require_once "helper/navbar.php" ?>



<div class="content-wrapper">
    <div class="category-nav">
        <ul>
            <li><a href="shop.php?category=men">Men's</a></li>
            <li><a href="shop.php?category=women">Women's</a></li>
            <li><a href="shop.php?category=kids">Kids'</a></li>
        
        </ul>
    </div>
</div>

<div class="home-items-content">
    <div class="items-list">
        <?php

            if(isset($_GET["category"])) {
                $category = $_GET["category"];
                $products = GetProductsByCategory($pdo, $category);
            } else {
                $products = GetProducts($pdo);
            }
            
            
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