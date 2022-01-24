<?php $selected="register"; require_once "helper/navbar.php" ?>


<?php if(isset($_GET["error"])) { ?>
    <div class="AlertMessage">
        <div class="alert alertError">
            <?php echo  '<p">'.$_GET["error"].'</p>'; ?>
        </div>
    </div>
<?php } ?>

<?php if(isset($_GET["sucess"])) { ?>
    <div class="AlertMessage">
        <div class="alert alertSucess">
            <?php echo  '<p">'.$_GET["sucess"].'</p>'; ?>
        </div>
    </div>
<?php } ?>

<div class="register-wrapper">
    
    <div class="register-form">
        <h1>REGISTER</h1>
        
        <form action="../includes/register.inc.php" method="POST" autocomplete="off">
            <input type="text" name="username" placeholder="username">
            <input type="password" name="password" placeholder="password" autocomplete="new-password">
            <input type="password" name="veirfy-password" placeholder="veirfy-password" autocomplete="new-password">
            <input type="submit" name="Register" value="Register">
            <?php
                if(isset($_GET["error"])) {
                    echo  '<p style="color:red;">'.$_GET["error"].'</p>';
                }
            ?>
            <p style="margin-bottom: 15px;">already have an account?<a href="login.php"> login now</a></p>
        </form>
    </div>

</div>

<?php require_once "helper/footer.php" ?>