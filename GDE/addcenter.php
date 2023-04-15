<?php
include 'inc/header.php';
Session::CheckSession();
$sId =  Session::get('roleid');
include 'lib/dbcon.php';


if (isset($_POST['addCenter'])) {
    $code = $_POST['code_centre'];
    $center_lib = $_POST['center_lib'];
    $adress = $_POST['adr_centre'];
    $province = $_POST['prov'];
    $Agency = $_POST['ag'];


    $insert_data = "INSERT INTO centre(code_centre, lib_centre, code_prov, code_ag, adr_centre) VALUES( $code, $center_lib, $province, $Agency , $adress)";
    $run_data = mysqli_query($con, $insert_data);

    if ($run_data) {
        $added = true;
    } else {
        echo "Data not insert";
    }
}


?>





<div class="card ">
    <div class="card-header">
        <h3 class='text-center'>Add Center</h3>
    </div>
    <div class="cad-body">



        <div style="width:600px; margin:0px auto">

            <form class="" action="" method="POST">
                <div class="form-group pt-3">
                    <label for="code_centre">Center code</label>
                    <input type="text" name="code_centre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="center_lib">center_lib</label>
                    <input type="text" name="center_lib" class="form-control">
                </div>
                <div class="form-group">
                    <label for="adr_centre">center adress</label>
                    <input type="text" name="adr_centre" class="form-control">

                    <div class="form-group">
                        <div class="form-group">
                            <label for="prov">province code</label>
                            <select class="form-control" name="prov" id="roleid">
                                <option selected disabled>Select province code</option>
                                <option value="1">105</option>
                                <option value="2">107</option>
                                <option value="3">110</option>
                                <option value="4">111</option>
                                <option value="5">112</option>
                                <option value="6">114</option>
                                <option value="7">115</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="ag">Agency code</label>
                            <select class="form-control" name="ag" id="roleid">
                                <option selected disabled>Select agency code</option>
                                <option value="1">101</option>
                                <option value="2">102</option>
                                <option value="3">103</option>
                                <option value="4">104</option>
                                <option value="5">105</option>
                                <option value="6">106</option>
                                <option value="7">107</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="addCenter" class="btn btn-success">Add Center </button>
                    </div>


            </form>
        </div>


    </div>

</div>

<?php
include 'inc/footer.php';

?>