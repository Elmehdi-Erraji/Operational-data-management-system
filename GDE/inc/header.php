<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . "/../lib/Session.php";
Session::init();



spl_autoload_register(function ($classes) {

  include 'classes/' . $classes . ".php";
});


$users = new Users();
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>GDE</title>
  <link rel="stylesheet" href="assets/bootstrap.min.css">
  <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="assets/menu.css">
  <link rel="apple-touch-icon" href="/PAM/assets/img/1-removebg-preview (1).png">
  <link rel="icon" type="png/x-icon" href="/PAM/assets/img/1-removebg-preview (1).png">
  <link rel="shortcut icon" type="image/x-icon" href="/PAM/assets/img/1-removebg-preview (1).png">
  <link rel="shortcut icon" href="/PAM/assets/img/1-removebg-preview (1).png" type="image/x-icon" />
</head>

<body>


  <?php


  if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    // Session::set('logout', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
    // <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    // <strong>Success !</strong> You are Logged Out Successfully !</div>');
    Session::destroy();
  }



  ?>


  <div class="container">

    <nav class="navbar navbar-expand-md navbar-dark card-header" class="dropedown_menue" style="background-color: #0F52BA;">
      <!--<img src="/front/assets/img/1-removebg-preview (1).png" href="index.php" alt="onep">-->
      <a class="navbar-brand" href="index.php"> <strong>GDE</strong> </a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">


        <?php if (Session::get('id') == TRUE) { ?>
          <ul class="navbar-nav ml-auto" id="menu">
            <li id="li" class="nav-item"> <a class="nav-link" href=""></a>
              <ul id="ul">
                <li id="li" class="nav-item"> <a class="nav-link" href="Region.php"></a> </li>
                <li id="li" class="nav-item"> <a class="nav-link" href="Province.php"></a></li>
                <li id="li" class="nav-item"> <a class="nav-link" href="DR.php"></a> </li>
                <li id="li" class="nav-item"> <a class="nav-link" href="AM.php"></a></li>
                <li id="li" class="nav-item"> <a class="nav-link" href="Unite.php"></a> </li>
                <li id="li" class="nav-item"> <a class="nav-link" href="Center.php"></a></li>
            </li>
          </ul>
          <?php if (Session::get('roleid') == '1') { ?>
            <li id="li" class="nav-item"> <a class="nav-link" href="#">Centers management </span> </a>
              <ul id="menu">
                <li id="li" class="nav-item"><a class="nav-link" href="centerlist.php">centers list</span></a> </li>
                <li id="li" class="nav-item
              <?php
              $path = $_SERVER['SCRIPT_FILENAME'];
              $current = basename($path, 'addcenter.php');
              if ($current == 'addcenter') {
                echo " active ";
              }
              ?>">
                  <a class="nav-link" href="addcenter.php">Add center</a>
                </li>
            </li>
            </ul>


            <li id="li" class="nav-item"> <a class="nav-link" href="#">Employee management</span> </a>
              <ul>
                <li id="li" class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-users mr-2"></i>User lists </span></a> </li>
                <li id="li" class="nav-item
              <?php
              $path = $_SERVER['SCRIPT_FILENAME'];
              $current = basename($path, 'test.php');
              if ($current == 'test') {
                echo " active ";
              }
              ?>">
                  <a class="nav-link" href="test.php"><i class="fas fa-user-plus mr-2"></i>Add User </span></a>
                </li>
            </li>
            </ul>

          <?php  } ?>
          <?php if (Session::get('roleid') == '2') { ?>

            <li id="li" class="nav-item"><a class="nav-link" href="centerlist.php">centers list</span></a> </li>


            <li id="li" class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-users mr-2"></i>User lists </span></a> </li>


          <?php  } ?>
          <?php if (Session::get('roleid') == '3') { ?>

            <li id="li" class="nav-item"><a class="nav-link" href="centerlist.php">centers list</span></a> </li>


            <li id="li" class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-users mr-2"></i>User lists </span></a> </li>


          <?php  } ?>
          <?php if (Session::get('roleid') == '4') { ?>

            <li id="li" class="nav-item"><a class="nav-link" href="centerlist.php">centers list</span></a> </li>


            <li id="li" class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-users mr-2"></i>User lists </span></a> </li>


          <?php  } ?>
          <?php if (Session::get('roleid') == '5') { ?>

            <li id="li" class="nav-item"><a class="nav-link" href="centerlist.php">centers list</span></a> </li>


            <li id="li" class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-users mr-2"></i>User lists </span></a> </li>


          <?php  } ?>
          <?php if (Session::get('roleid') == '6') { ?>

            <li id="li" class="nav-item"><a class="nav-link" href="centerlist.php">centers list</span></a> </li>


            <li id="li" class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-users mr-2"></i>User lists </span></a> </li>


          <?php  } ?>


          <li class="nav-item
            <?php

            $path = $_SERVER['SCRIPT_FILENAME'];
            $current = basename($path, '.php');
            if ($current == 'profile') {
              echo "active ";
            }
            ?>
            ">
            <a class="nav-link" href="profile.php?id=<?php echo Session::get("id"); ?>"><i class="fab fa-500px mr-2"></i>Profile <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="?action=logout"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
          </li>

        <?php } else { ?>


        <?php } ?>


        </ul>

      </div>
    </nav>