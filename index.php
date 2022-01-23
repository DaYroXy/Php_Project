<?php $selected="index"; require_once "helper/navbar.php" ?>


<?php
    if(isset($_GET["Remove"])){
        if(isset($_GET["ProductId"])) {
            $ProdId = $_GET["ProductId"];
            header("location: includes/admin.inc.php?remove&id=$ProdId");
        }
    }
?>


<?php if(isset($_GET["update"]) && isset($user)){ if($user["admin"] > 0) { $EditProduct = GetProductById($pdo, $_GET["ProductId"]); ?>

<div class="EditMode">
    <div class="Edit-Main-Wrapper">
        <form action="includes/admin.inc.php" method="post" class="Edit-Wrapper" autocomplete="off" enctype="multipart/form-data">
            
        <div class="Edit-Content">
                <div class="LeftSection">
                    <img src="/images/products/<?php echo $EditProduct['image'] ?>" alt="" id="imageOnChange" >
                    <input type="file" name="image" id="file" onchange="loadFile(event)">
                    <input type="hidden" name="DefaultImage" value="<?php echo $EditProduct['image'] ?>">
                    <label for="file"></label>
                </div>

                <div class="rightSection">
                    <a href="index.php">X</a>

                    <div class="column">
                        <label>Name</label>
                        <input type="text" name="Name" value="<?php echo $EditProduct['name'] ?>" placeholder="Name">
                    </div>

                    <div class="column">
                        <label>Price</label>
                        <input type="text" name="Price" value="<?php echo $EditProduct['price'] ?>" placeholder="Price">
                </div>
                <div class="column">
                        <label>Quantity</label>
                        <input type="text" name="Quantity" value="<?php echo $EditProduct['quantity'] ?>" placeholder="Quantity">
                </div>
                <div class="column">
                <select name="Category">
                            <option value="Men">Men</option>
                            <option value="Women">Women</option>
                            <option value="Kids">Kids</option>
                        </select>             
                    </div>

                    <textarea name="Description" placeholder="Description" cols="30" rows="10" ><?php echo $EditProduct['description']; ?></textarea>
                    <input type="hidden" name="ProductId" value="<?php echo $EditProduct['id']; ?>">
                    <input type="submit" name="Update" value="Update" placeholder="Category">
                </div>
            </div>
        </form>
    </div>
</div>

<?php } } ?>

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
                <?php if(isset($user)) { if($user["admin"] == 1) { ?>
                <form action="index.php" method="get" class="AdminCard">
                    <input type="submit" name="update" value="Edit">
                    <input type="submit" name="Remove" value="Remove">
                    <input type="hidden" name="ProductId" value="<?php echo $product['id'] ?>"></input>
                </form>

                <?php }} ?>
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