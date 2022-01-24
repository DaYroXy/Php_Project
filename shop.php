<?php $selected="shop"; require_once "helper/navbar.php" ?>



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

<div class="content-wrapper">
    <div class="category-nav">
        <ul>
            <li><a href="shop.php?category=men">Men's</a></li>
            <li><a href="shop.php?category=women">Women's</a></li>
            <li><a href="shop.php?category=kids">Kids'</a></li>
        
        </ul>
    </div>
</div>

<?php
if(isset($_GET["continue"])) {
    if($_GET["continue"]==="suggestion") { ?>

<div class="Continue" id="Continue">
    <p>Product has been added to your cart</p>
    <div class="buttons">
        <button onclick="document.getElementById('Continue').style = 'display: none;'" id="ContinueButton">Continue Shopping</button>
        <button onclick="location.href = 'cart.php'" >Go to Cart</button>
    </div>
</div>

<?php } } ?>



<?php if(isset($_GET["update"]) && isset($user)){ if($user["admin"] > 0) { $EditProduct = GetProductById($pdo, $_GET["ProductId"]); ?>

<div class="EditMode">
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

<?php } } ?>

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
                        <?php if($product["quantity"] > 0) {
                            echo '<div class="price-buy">';
                        } else {
                            echo '<div style="margin-top:15px">';
                        } ?>
                            <h2><?php if($product["quantity"] > 0) {echo "$" . $product["price"];} else { echo "OUT OF STUCK";} ?></h2>
                            <?php if(isset($user)) {
                                echo '<form action="includes/cart.inc.php" method="post">';
                            } else {
                                echo '<form action="login.php">';
                            } ?>
                            <?php if($product["quantity"] > 0) echo  '<input type="submit" name="AddToCart" value="Add to cart">';  ?>
                                <input type="hidden" name="ProductId" value="<?php echo $product['id']; ?>"></input>
                                <input type="hidden" name="continue" value=<?php 
                                if(isset($_GET["continue"])) { 
                                    if($_GET["continue"]==="continue") {
                                    echo 1 ;
                                    } else {
                                        echo 1;
                                    }
                                } else{
                                    echo 0;
                                } ?>>
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