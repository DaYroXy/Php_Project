<?php $selected="register"; require_once "helper/navbar.php" ?>


<div class="register-wrapper">
    
    <div class="register-form">
        <h1>REGISTER</h1>
        
        <form action="#" autocomplete="false">
            <input type="text" name="username" placeholder="username">
            <input type="password" name="password" placeholder="password" autocomplete="new-password">
            <input type="password" name="veirfy-password" placeholder="veirfy-password" autocomplete="new-password">
            <input type="submit" name="Register" value="Register">
            <p>already have an account?<a href="login.php"> login now</a></p>
        </form>
    </div>

</div>

<?php require_once "helper/footer.php" ?>