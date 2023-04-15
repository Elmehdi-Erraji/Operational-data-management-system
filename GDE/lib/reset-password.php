<?php

use function Composer\Autoload\includeFile;

if (isset($_POST["reset-password-submit"])) {
    if (isset($_POST["reset-password-submit"])) {

        include_once 'dbcon.php';
        $selector = $_POST["selector"];
        $validator = $_POST["validator"];
        $password = $_POST["pwd"];
        $passwordRepeat = $_POST["pwd-repeat"];

        if (empty($password) || empty($passwordRepeat)) {

            header("Location: ../reset-password.php?newpwd=empty");
            exit();
        } else if ($password != $passwordRepeat) {
            header("Location: ../reset-password.php?newpwd%3pwdnotsame");
            exit();
        }

        $currentDate = date("U");
        require 'dbcon.php';

        $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >=? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Ther was an error!";
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "s", $selector, $currentDate);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (!$row = mysqli_fetch_assoc($result)) {
                echo "you need to re-submit your reset request.";
                exit();
            } else {

                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
                if ($tokenCheck === false) {
                    echo "You need to re-submit your reset request.";
                    exit();
                } elseif ($tokenCheck === true) {


                    $tokenEmail = $row['pwdResetEmail'];

                    $sq1 = "SELECT * FROM tbl_users WHERE email=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {

                        echo "There was an error!";
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if (!$row = mysqli_fetch_assoc($result)) {
                            echo "there was an errore !";
                            exit();
                        } else {

                            $sql = "UPDATE tbl_users SET password=? WHERE email=?";
                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt, $sq1)) {
                                echo "There was an error!";
                                exit();
                            } else {
                                $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                                $stmt = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {

                                    echo "There was an error!";
                                    exit();
                                } else {
                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: ../login.php?newpwd=passwordupdated");
                                }
                            }
                        }
                    }
                }
            }
        }
    }
} else {
    header("Location: ../index.php");
}
