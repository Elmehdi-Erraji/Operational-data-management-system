<?php
include 'inc/header.php';

Session::CheckSession();

$logMsg = Session::get('logMsg');
if (isset($logMsg)) {
    echo $logMsg;
}
$msg = Session::get('msg');
if (isset($msg)) {
    echo $msg;
}
Session::set("msg", NULL);
Session::set("logMsg", NULL);
?>
<?php

if (isset($_GET['remove'])) {
    $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove']);
    $removeUser = $users->deleteUserById($remove);
}

if (isset($removeUser)) {
    echo $removeUser;
}
if (isset($_GET['deactive'])) {
    $deactive = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['deactive']);
    $deactiveId = $users->userDeactiveByAdmin($deactive);
}

if (isset($deactiveId)) {
    echo $deactiveId;
}
if (isset($_GET['active'])) {
    $active = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['active']);
    $activeId = $users->userActiveByAdmin($active);
}

if (isset($activeId)) {
    echo $activeId;
}


?>
<div class="card ">
    <div class="card-header">
        <h3><i class="fas fa-users mr-2"></i>Center list <span class="float-right">Welcome<strong>
                    <span class="badge badge-lg badge-secondary text-white">
                        <?php
                        $username = Session::get('username');
                        if (isset($username)) {
                            echo $username;
                        }
                        ?></span>

                </strong></span></h3>
    </div>
    <div class="card-body pr-2 pl-2">

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Center_code</th>
                    <th class="text-center">Lib_center</th>
                    <th class="text-center">address</th>
                    <th class="text-center">Mobile</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Created</th>
                    <th width='25%' class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $allUser = $users->selectAllUserData();

                if ($allUser) {
                    $i = 0;
                    foreach ($allUser as  $value) {
                        $i++;

                ?>

                        <tr class="text-center" <?php if (Session::get("id") == $value->id) {
                                                    echo "style='background:#d9edf7' ";
                                                } ?>>

                            <td><?php echo $i; ?></td>
                            <td><?php echo $value->name; ?></td>
                            <td><?php echo $value->username; ?> <br>
                                <?php if ($value->roleid  == '1') {
                                    echo "<span class='badge badge-lg badge-info text-white'>DPA</span>";
                                } elseif ($value->roleid == '2') {
                                    echo "<span class='badge badge-lg badge-dark text-white'>DR</span>";
                                } elseif ($value->roleid == '3') {
                                    echo "<span class='badge badge-lg badge-dark text-white'>AM</span>";
                                } elseif ($value->roleid == '4') {
                                    echo "<span class='badge badge-lg badge-dark text-white'>AS</span>";
                                } elseif ($value->roleid == '5') {
                                    echo "<span class='badge badge-lg badge-dark text-white'>ST</span>";
                                } elseif ($value->roleid == '6') {
                                    echo "<span class='badge badge-lg badge-dark text-white'>SP</span>";
                                }

                                ?></td>
                            <td><?php echo $value->email; ?></td>

                            <td><span class="badge badge-lg badge-secondary text-white"><?php echo $value->mobile; ?></span></td>
                            <td>
                                <?php if ($value->isActive == '0') { ?>
                                    <span class="badge badge-lg badge-info text-white">Active</span>
                                <?php } else { ?>
                                    <span class="badge badge-lg badge-danger text-white">Deactive</span>
                                <?php } ?>

                            </td>
                            <td><span class="badge badge-lg badge-secondary text-white"><?php echo $users->formatDate($value->created_at);  ?></span></td>

                            <td>
                                <?php if (Session::get("roleid") == '1') { ?>
                                    <a class="btn btn-success btn-sm
                            " href="centerprofile.php?id=<?php echo $value->id; ?>">View</a>
                                    <a class="btn btn-info btn-sm " href="centerprofile.php?id=<?php echo $value->id; ?>">Edit</a>
                                    <a onclick="return confirm('Are you sure To Delete ?')" class="btn btn-danger
                    <?php if (Session::get("id") == $value->id) {
                                        echo "disabled";
                                    } ?>
                    
                             btn-sm " href="?remove=<?php echo $value->id; ?>">Remove</a>






                                <?php  } elseif (Session::get("id") == $value->id  && Session::get("roleid") == '2') { ?>
                                    <a class="btn btn-success btn-sm " href="centerprofile.php?id=<?php echo $value->id; ?>">View</a>
                                    <a class="btn btn-info btn-sm " href="centerprofile.php?id=<?php echo $value->id; ?>">Edit</a>
                                <?php  } elseif (Session::get("roleid") == '2') { ?>
                                    <a class="btn btn-success btn-sm
                          <?php if ($value->roleid == '1') {
                                        echo "disabled";
                                    } ?>
                          " href="profile.php?id=<?php echo $value->id; ?>">View</a>
                                    <a class="btn btn-info btn-sm
                          <?php if ($value->roleid == '1') {
                                        echo "disabled";
                                    } ?>
                          " href="centerprofile?id=<?php echo $value->id; ?>">Edit</a>
                                <?php } elseif (Session::get("id") == $value->id  && Session::get("roleid") == '3') { ?>
                                    <a class="btn btn-success btn-sm " href="centerprofile.php?id=<?php echo $value->id; ?>">View</a>
                                    <a class="btn btn-info btn-sm " href="centerprofile.php?id=<?php echo $value->id; ?>">Edit</a>
                                <?php } else { ?>
                                    <a class="btn btn-success btn-sm
                          <?php if ($value->roleid == '1') {
                                        echo "disabled";
                                    } ?>
                          " href="centerprofile.php?id=<?php echo $value->id; ?>">View</a>

                                <?php } ?>

                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr class="text-center">
                        <td>No Center availabe now !</td>
                    </tr>
                <?php } ?>

            </tbody>

        </table>









    </div>
</div>



<?php
include 'inc/footer.php';

?>