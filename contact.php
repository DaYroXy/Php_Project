<?php $selected="contact"; require_once "helper/navbar.php" ?>


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

<div class="content-wrapper">
    <div class="contents">
        <div class="title">
            <h2>CONTACT US</h2>
        </div>

        <ul class="contact-available">
            <li>
                <div class="contact-link">
                    <img src="images/pin.png" alt="phone">
                </div>

                <div class="link-content">
                    <h3>Address :</h3>
                    <p>Snunit St 51, Karmiel, 2161002</p>
                </div>
            </li>
            <li>
                <div class="contact-link">
                    <img src="images/phone.png" alt="phone">
                </div>

                <div class="link-content">
                    <h3>Phone :</h3>
                    <a href="tel:+0534505181">0534505181</a>
                </div>
            </li>
            <li>
                <div class="contact-link">
                    <img src="images/message.png" alt="phone">
                </div>

                <div class="link-content">
                    <h3>Mail :</h3>
                    <a href="mailto:Anasakko@hotmail.co.il">Anasakko-@hotmail.co.il</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="Message-wrapper">
        <h2>Get in touch with us</h2>
        <form action="#">
            <input type="text" placeholder="Name">
            <input type="text" placeholder="Email">
            <input type="text" placeholder="Subject">
            <textarea rows="4" cols="50" name="comment" form="usrform" placeholder="enter your message here"></textarea>
            <input type="submit" value="Send Message">
        </form>
    </div>
</div>

<?php require_once "helper/footer.php" ?>