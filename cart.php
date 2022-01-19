<?php $selected="cart"; require_once "helper/navbar.php" ?>

<div class="cart-wrapper">
   
    <div class="cart-content">
        <div class="products-list">
            <h2>SHOPPING CART</h2>
            <div class="products-content">
                <div class="cart-item">
                    <img src="images/products/GreenJacket.webp" alt="">
                    <div class="item-info">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat</p>
                        <h4>$35</h4>
                    </div>
                    <div class="item-quantity">
                        <form action="#">
                            <input type="submit" name="increaseQuantity" value="+">
                            <input type="text" name="" value="0" disabled>
                            <input type="submit" name="decreaseQuantity" value="-">
                        </form>
                    </div>
                    <form class="deleteItem" action="">
                        <input type="submit" name="removeItem" value="">
                    </form>
                </div>
            </div>
        </div>

        <div class="checkout-list">
            <div class="inner-checkout-list">
                <div class="checkout-line">
                    <p><span>1</span> Items</p>
                    <h4>$54.00</h4>
                </div>
                <div class="checkout-line">
                    <p>Shipping</p>
                    <h4>$7.00</h4>
                </div>
                <br>
                <div class="checkout-line">
                    <p>Total</p>
                    <h4>$61.00</h4>
                </div>
                <form action="#">
                    <input type="text" name="promoCode" placeholder="have a promo code?">
                    <input type="submit" name="purchase" value="PROCEED TO CHECKOUT" id="">
                </form>
            </div>
        </div>
    </div>

</div>

<?php require_once "helper/footer.php" ?>