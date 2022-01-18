<div class="navigation">
    <div class="nav-Content">
        <a href="#"><img class="Logo" src="../images/ShopForce.png" alt="Logo"></a>
    
        <ul class="nav-links">
            <li><a <?php if($selected == "Home")  { echo "class='selected'";} ?> href="#">Home</a></li>
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
