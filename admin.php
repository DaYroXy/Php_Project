<?php $selected="admin"; require_once "helper/navbar.php" ?>


<?php 

    if(!isset($user) || $user["admin"] < 1) {
        die(header("location: index.php"));
    }

?>

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


<div class="Admin-Wrapper">
    <form action="includes/admin.inc.php" method="post" class="Admin-Content" enctype="multipart/form-data" autocomplete="off">
        <div class="leftSide">
            <img src="/images/NoImage.jpg" id="imageOnChange" alt="">
            <input type="file" name="image" id="file" onchange="loadFile(event)">
            <label for="file"></label>
        </div>

        <div class="RightSide">
            <input type="text" name="Name" placeholder="Name">
            <input type="text" name="Price" placeholder="Price">
            <input type="text" name="Quantity" placeholder="Quantity">
            <select name="Category">
                        <option value="Men">Men</option>
                        <option value="Women">Women</option>
                        <option value="Kids">Kids</option>
                    </select> 
            <textarea name="Description" placeholder="Description" cols="30" rows="10"></textarea>
            <input type="submit" name="AddProduct" value="Add Product" placeholder="Quantity">
        </div>
    </form>
</div>

<?php require_once "helper/footer.php" ?>
