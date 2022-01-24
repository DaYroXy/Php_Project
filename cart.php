<?php $selected="cart"; require_once "helper/navbar.php" ?>


<?php if(isset($_GET["error"])) { ?>
    <div class="AlertMessage">
        <div class="alert alertError">
            <?php echo  '<p">'.$_GET["error"].'</p>'; ?>
        </div>
    </div>
<?php } ?>

<?php if(isset($_GET["success"])) { ?>
    <div class="AlertMessage">
        <div class="alert alertsuccess">
            <?php echo  '<p">'.$_GET["success"].'</p>'; ?>
        </div>
    </div>
<?php } ?>

<?php if(isset($_GET["cart"])) { ?>
    <div class="AlertMessage">
        <div class="alert alertsuccess">
            <?php echo  '<p">'.$_GET["cart"].'</p>'; ?>
        </div>
    </div>
<?php } ?>




<div class="cart-wrapper">


    <div class="cart-content">
        <div class="products-list">
            <h2>SHOPPING CART</h2>
            <div class="products-content">
                <?php
                
                if(isset($user)) {
                    foreach($cart as &$product) { 
                        $prod = GetProductById($pdo, $product["productid"]);

                ?>
                    

                <div class="cart-item">
                    <img src="images/products/<?php echo $prod["image"]; ?>" alt="">
                    <div class="item-info">
                        <p><?php echo $prod["description"]; ?></p>
                        <h4>$<?php echo $prod["price"]; ?></h4>
                    </div>
                    <div class="item-quantity">
                        <form action="includes/cart.inc.php" method="POST">
                            <input type="submit" name="increaseQuantity" value="+">
                            <input type="text" name="" value="<?php echo $product["quantity"]; ?>" disabled>
                            <input type="submit" name="decreaseQuantity" value="-">
                            <input type="hidden" name="ProductId" value="<?php echo $prod["id"]; ?>">
                        </form>
                    </div>
                    <form class="deleteItem" action="includes/cart.inc.php" method="post">
                        <input type="submit" name="RemoveFromCart" value="">
                        <input type="hidden" name="ProductId" value="<?php echo $prod["id"]; ?>">
                    </form>
                </div>

                <?php } } ?>
                
                
            </div>
        </div>

        <div class="checkout-list">
            <div class="inner-checkout-list">
                <div class="checkout-line">
                    <?php
                        if(isset($user)){
                            if(count($cart) > 1) {
                                echo "<p><span>".count($cart)."</span> Items</p>"; 
                            } else {
                                echo "<p><span>".count($cart)."</span> Item</p>"; 
                            }
                        } else {
                            echo "<p><span>0</span> Items</p>"; 
                        }
                    ?>
                    <?php if(isset($user)) $CartPrices = CalculateCartPrices($pdo, $cart) ?>
                    <h4>$<?php if(isset($user)) echo  number_format($CartPrices["items"],2); else echo 0; ?></h4>
                </div>
                <div class="checkout-line">
                    <p>Shipping</p>
                    <h4>$<?php if(isset($user)) echo  number_format($CartPrices["shipping"],2); else echo 0; ?></h4>
                </div>
                <br>
                <div class="checkout-line">
                    <p>Total</p>
                    <h4>$<?php if(isset($user)) echo  number_format($CartPrices["total"],2); else echo 0; ?></h4>
                </div>
                <form action="includes/cart.inc.php" method="POST">
                    <input type="text" name="promoCode" placeholder="have a promo code?">
                    <input type="submit" name="purchase" value="PROCEED TO CHECKOUT">
                </form>
            </div>
        </div>
    </div>

</div>

<?php require_once "helper/footer.php" ?>