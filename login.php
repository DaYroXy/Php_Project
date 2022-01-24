<?php $selected="login"; require_once "helper/navbar.php" ?>



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


<div class="login-wrapper">
    
    <div class="login-form">
        <h1>LOGIN</h1>
        
        <form action="includes/login.inc.php" method="post" autocomplete="off">
            <input type="text" value='<?php if(!empty($_COOKIE["username"])) echo $_COOKIE["username"];?>' placeholder="username" name="username" id="">
            <input type="password" value='<?php if(!empty($_COOKIE["password"])) echo $_COOKIE["password"];?>' placeholder="password" name="password" autocomplete="new-password">
            <input type="submit" name="Login" value="Log In">
            <div class="rememberMe">
                <p>Remember me ?</p>
                <input type="checkbox" name="remember">
            </div>

            <p style="margin-bottom: 15px;">dont have an account?<a href="register.php"> create one now!</a></p>
        </form>
    </div>

</div>

<?php require_once "helper/footer.php" ?>