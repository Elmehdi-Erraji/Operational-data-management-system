<?php
include 'inc/header.php';
Session::CheckSession();

?>

<?php

if (isset($_GET['id'])) {
  $userid = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
  $updateUser = $users->updateUserByIdInfo($userid, $_POST);
}
if (isset($updateUser)) {
  echo $updateUser;
}




?>

<div class="card ">
  <div class="card-header">
    <h3>User Profile <span class="float-right"> <a href="index.php" class="btn btn-primary">Back</a> </h3>
  </div>
  <div class="card-body">

    <?php
    $getUinfo = $users->getUserInfoById($userid);
    if ($getUinfo) {






    ?>


      <div style="width:600px; margin:0px auto">

        <form class="" action="" method="POST">
          <div class="form-group">
            <label for="name">Code center</label>
            <input type="text" name="name" value="<?php echo $getUinfo->name; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="username">Full name</label>
            <input type="text" name="username" value="<?php echo $getUinfo->username; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" id="email" name="email" value="<?php echo $getUinfo->email; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="mobile">Mobile Number</label>
            <input type="text" id="mobile" name="mobile" value="<?php echo $getUinfo->mobile; ?>" class="form-control">
          </div>

          <?php if (Session::get("roleid") == '1') { ?>

            <div class="form-group
              <?php if (Session::get("roleid") == '1' && Session::get("id") == $getUinfo->id) {
                echo "d-none";
              } ?>
              ">
              <div class="form-group">
                <label for="sel1">Select user Role</label>
                <select class="form-control" name="roleid" id="roleid">

                  <?php
                  if ($getUinfo->roleid == '1') { ?>
                    <option value="1" selected='selected'>DPA</option>
                    <option value="2">DR</option>
                    <option value="3">AM</option>
                    <option value="4">AS</option>
                    <option value="5">ST</option>
                    <option value="6">SP</option>
                  <?php } elseif ($getUinfo->roleid == '2') { ?>
                    <option value="1">DPA</option>
                    <option value="2" selected='selected'>DR</option>
                    <option value="3">AM</option>
                    <option value="4">AS</option>
                    <option value="5">ST</option>
                    <option value="6">SP</option>
                  <?php } elseif ($getUinfo->roleid == '3') { ?>
                    <option value="1">DPA</option>
                    <option value="2">DR</option>
                    <option value="4">AS</option>
                    <option value="5">ST</option>
                    <option value="6">SP</option>
                    <option value="3" selected='selected'>AM</option>
                  <?php } elseif ($getUinfo->roleid == '4') { ?>
                    <option value="1">DPA</option>
                    <option value="2">DR</option>
                    <option value="4">AS</option>
                    <option value="5">ST</option>
                    <option value="6">SP</option>
                    <option value="3" selected='selected'>AS</option>
                  <?php } elseif ($getUinfo->roleid == '5') { ?>
                    <option value="1">DPA</option>
                    <option value="2">DR</option>
                    <option value="4">AS</option>
                    <option value="5">ST</option>
                    <option value="6">SP</option>
                    <option value="3" selected='selected'>ST</option>
                  <?php } elseif ($getUinfo->roleid == '6') { ?>
                    <option value="1">DPA</option>
                    <option value="2">DR</option>
                    <option value="4">AS</option>
                    <option value="5">ST</option>
                    <option value="6">SP</option>
                    <option value="3" selected='selected'>SP</option>
                  <?php } ?>
                </select>
              </div>
            </div>

          <?php } else { ?>
            <input type="hidden" name="roleid" value="<?php echo $getUinfo->roleid; ?>">
          <?php } ?>

          <?php if (Session::get("id") == $getUinfo->id) { ?>


            <div class="form-group">
              <button type="submit" name="update" class="btn btn-success">Update</button>
              <a class="btn btn-primary" href="changepass.php?id=<?php echo $getUinfo->id; ?>">Password change</a>
            </div>
          <?php } elseif (Session::get("roleid") == '1') { ?>


            <div class="form-group">
              <button type="submit" name="update" class="btn btn-success">Update</button>
              <a class="btn btn-primary" href="changepass.php?id=<?php echo $getUinfo->id; ?>">Password change</a>
            </div>
          <?php } elseif (Session::get("roleid") == '2') { ?>


            <div class="form-group">
              <button type="submit" name="update" class="btn btn-success">Update</button>

            </div>

          <?php   } else { ?>
            <div class="form-group">

              <a class="btn btn-primary" href="index.php">Ok</a>
            </div>
          <?php } ?>


        </form>
      </div>

    <?php } else {

      header('Location:index.php');
    } ?>



  </div>
</div>


<?php
include 'inc/footer.php';

?>