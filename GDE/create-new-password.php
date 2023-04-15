<?php
include 'inc/header.php';
Session::CheckLogin();
?>




<div class="card ">
    <div class="card-header">
        <h3 class='text-center'><i class="fas fa-sign-in-alt mr-2"></i>reset your password</h3>
        <p>An e-mail will be send to you with instruction on how to reset your password</p>
    </div>
    <div class="card-body">


        <div style="width:450px; margin:0px auto">

            <?php
            $selector = $_GET["selector"];
            $validator = $_GET["validator"];

            if (empty($selector) || empty($validator)) {
                echo "Could not validate your request!";
            } else {
                if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
            ?>
                    <form action="includes/reset-password.php" method="post">
                        <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                        <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                        <input type="password" name="pwd" placeholder="Enter a new password..">
                        <input type="password" name="pwd-repeat" placeholder="Repeat new password">
                        <button type="submit" name="reset-password-submit">Reset password</button>
                    </form>



            <?php

                }
            }
            ?>


        </div>


    </div>
</div>



<?php
include 'inc/footer.php';

?>