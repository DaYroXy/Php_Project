<?php $selected="login"; require_once "helper/navbar.php" ?>


<div class="login-wrapper">
    
    <div class="login-form">
        <h1>LOGIN</h1>
        
        <form action="includes/login.inc.php" method="post" autocomplete="false">
            <input type="text" placeholder="username" name="username" id="">
            <input type="password" placeholder="password" name="password" autocomplete="new-password">
            <input type="submit" name="Login" value="Log In">
            <p>dont have an account?<a href="register.php"> create one now!</a></p>
        </form>
    </div>

</div>

<?php require_once "helper/footer.php" ?>