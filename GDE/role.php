<?php
include 'inc/header.php';
Session::CheckSession();
$sId =  Session::get('roleid');  ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addUser'])) {

    $userAdd = $users->addNewUserByAdmin($_POST);
}

if (isset($userAdd)) {
    echo $userAdd;
}


?>




<div class="card ">
    <div class="card-header">
        <h3 class='text-center'>Add New Role</h3>
    </div>
    <div class="cad-body">



        <div style="width:600px; margin:0px auto">

            <form class="" action="" method="post">
                <div class="form-group pt-3">
                    <label for="name">Role name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="sel1">Select Action 1</label>
                        <select class="form-control" name="roleid" id="roleid">
                            <option value="1">--None--</option>
                            <option value="2">View</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="sel1">Select Action 2</label>
                        <select class="form-control" name="roleid" id="roleid">
                            <option value="1">--None--</option>
                            <option value="2">Edit</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="sel1">Select Action 3</label>
                        <select class="form-control" name="roleid" id="roleid">
                            <option value="1">--None--</option>
                            <option value="2">Remove</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="sel1">Select Action 4</label>
                        <select class="form-control" name="roleid" id="roleid">
                            <option value="1">--None--</option>
                            <option value="2">Disable</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="addUser" class="btn btn-success">Add role</button>
                </div>


            </form>
        </div>


    </div>
</div>














<?php
include 'inc/footer.php';

?>