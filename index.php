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

        <div class="card">
            <div class="product-info">
                <div class="product-inner-info">
                    <h4>Green Jacket</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat </p>
                    <div class="price-buy">
                        <h2>$35</h2>
                        <form action="#">
                            <input type="submit" value="Add to cart"></input>
                        </form>
                    </div>
                </div>
            </div>
            <img src="images/products/GreenJacket.webp" alt="">
        </div>
        
            
    </div>

</div>



<?php require_once "helper/footer.php" ?>