<?php

use PHPMailer\PHPMailer\PHPMailer;

include 'inc/header.php';
include("lib/dbcon.php");


Session::CheckLogin();
?>




<div class="card ">
    <div class="card-header">
        <h3 class='text-center'><i class="fas fa-sign-in-alt mr-2"></i>reset your password</h3>
        <p style="text-align : center;">An e-mail will be send to you with instruction on how to reset your password</p>
    </div>
    <div class="card-body">


        <div style="width:450px; margin:0px auto">

            <form class="" action="password-reset.php" method="post">
                <div class="form-group">
                    <label for="email"> Enter your e-mail address</label>
                    <input type="email" name="email" class="form-control">
                </div>


                <div class="form-group">
                    <button type="submit" name="password-reset" class="btn btn-success">Recive new password by e-mail</button>
                </div>


            </form>


        </div>


    </div>
</div>



<?php
include 'inc/footer.php';

?>
<?php

if (isset($_POST['password-reset'])) {

    $c_email = $_POST['email'];

    $sel_c = "select * from tbl_users where email='$c_email'";

    $run_c = mysqli_query($conn, $sel_c);

    $count_c = mysqli_num_rows($run_c);

    $row_c = mysqli_fetch_array($run_c);

    $c_name = $row_c['name'];

    $c_pass = $row_c['password'];

    if ($count_c == 0) {

        echo "<script> alert('Sorry, We do not have your email') </script>";

        exit();
    } else {

        $message = "

<h1 align='center'> Your Password Has Been Sent To You </h1>

<h2 align='center'> Dear $c_name </h2>

<h3 align='center'>

Your Password is : <span> <b>$c_pass</b> </span>

</h3>

<h3 align='center'>

<a href='localhost/pfe/password-reset.php'>

Click Here To Login Your Account

</a>

</h3>

";

        $from = "Allsafe.Superuser@gmail.com";

        $subject = "Your Password";

        $headers = "From: $from\r\n";

        $headers = "Content-type: text/html\r\n";

        mail($c_email, $subject, $message, $headers);

        echo "<script> alert('Your Password Reset Link has been sent to you, check your inbox ') </script>";

        echo "<script>window.open('password-reset.php','_self')</script>";
    }
}

?>