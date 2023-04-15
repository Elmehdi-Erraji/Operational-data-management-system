<?php


if (isset($_POST["reset-request-submit"])) {


    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://localhost/simple-user-auth/create-new-password.php? selector=" . $selector
        . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;


    require 'dbcon.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "there was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector,pwdResetToken, pwdResetExpire ) 
     VALUES(?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "there was an error!";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }


    mysqli_stmt_close($stmt);
    mysqli_close($conn);


    $to = $userEmail;
    $subject = 'Reset your password for Allsafe';

    $message = '<p>We reecievd a password reset request. The link to reset your password is below.
    If you did not make this request , you can ignor this email</p>';
    $message .= '<p>Here is your password reset link : </p> </br>';
    $message .= '<p><a href = "' . $url . '">' . $url . '</a></p>';

    $headers = "Form: Allsaf < Allsaf@gmail.com> \r\n";
    $headers .= "Reply-To: Allsaf < AllsafAdmin@gmail.com> \r\n";
    $headers .= "Content-type: text/html \r\n";

    mail($to, $subject, $message, $headers);



    header("location:../reset-password.php");
} else {
    header("Location: ../index.php");
}
