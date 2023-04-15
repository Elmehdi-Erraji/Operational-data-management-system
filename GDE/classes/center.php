<?php
error_reporting(0);
include 'lib/Database.php';
include_once 'lib/Session.php';


class Center
{


    // Db Property
    private $db;

    // Db __construct Method
    public function __construct()
    {
        $this->db = new Database();
    }

    // Date formate Method
    public function formatDate($date)
    {
        // date_default_timezone_set('َAfrica/Maroc');
        $strtime = strtotime($date);
        return date('Y-m-d H:i:s', $strtime);
    }



    // Check Exist code Address Method
    public function checkExistEmail($email)
    {
        $sql = "SELECT code_centre from  centre WHERE code_centre = :code_centre";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':code_centre', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    // Check Exist center code Address Method
    public function checkExistCode($code)
    {
        $sql = "SELECT code_centre from  center WHERE code_centre = :code_centre";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':code_centre', $code);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    // User Registration Method
    /*public function userRegistration($data)
    {
        $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];
        $mobile = $data['mobile'];
        $roleid = $data['roleid'];
        $password = $data['password'];

        $checkEmail = $this->checkExistEmail($email);

        if ($name == "" || $username == "" || $email == "" || $mobile == "" || $password == "") {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Please, User Registration field must not be Empty !</div>';
            return $msg;
        } elseif (strlen($username) < 3) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Username is too short, at least 3 Characters !</div>';
            return $msg;
        } elseif (filter_var($mobile, FILTER_SANITIZE_NUMBER_INT) == FALSE) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Enter only Number Characters for Mobile number field !</div>';
            return $msg;
        } elseif (strlen($password) < 5) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Password at least 6 Characters !</div>';
            return $msg;
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Your Password Must Contain At Least 1 Number !</div>';
            return $msg;
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Your Password Must Contain At Least 1 Number !</div>';
            return $msg;
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL === FALSE)) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Invalid email address !</div>';
            return $msg;
        } elseif ($checkEmail == TRUE) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Email already Exists, please try another Email... !</div>';
            return $msg;
        } else {

            $sql = "INSERT INTO tbl_users(name, username, email, password, mobile, roleid) VALUES(:name, :username, :email, :password, :mobile, :roleid)";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', SHA1($password));
            $stmt->bindValue(':mobile', $mobile);
            $stmt->bindValue(':roleid', $roleid);
            $result = $stmt->execute();
            if ($result) {
                $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success !</strong> Wow, you have Added a new user Successfully !</div>';
                return $msg;
            } else {
                $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Something went Wrong !</div>';
                return $msg;
            }
        }
    }

*/


    // Add New Center By Admin

    public function addNewCenterByAdmin($data1)
    {
        $code = $data1['code_centre'];
        $center_lib = $data1['center_lib'];
        $adress = $data1['adr_centre'];
        $province = $data1['code_prov'];
        $Agency = $data1['code_ag'];

        $checkcode = $this->checkExistCode($code);

        if ($code == "" || $center_lib == "" || $adress == "" || $province == "" || $Agency == "") {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Input fields must not be Empty !</div>';
            return $msg;
        } elseif (strlen($center_lib) < 5) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> center_lib is too short, at least 5 Characters !</div>';
            return $msg;
        } elseif ($checkcode == TRUE) {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Center code already Exists, please try another code... !</div>';
            return $msg;
        } else {

            $sql = "INSERT INTO centre(code_centre, lib_centre, code_prov, code_ag, adr_centre) VALUES(:code_centre, :lib_centre, :code_prov, :code_ag, , :adr_centre)";
            $stm = $this->db->pdo->prepare($sql);
            $stm->bindValue(':code_centre', $code);
            $stm->bindValue(':lib_centre', $center_lib);
            $stm->bindValue(':code_prov', $province);
            $stm->bindValue(':code_ag', $Agency);
            $stm->bindValue(':adr_centre', $adress);
            $result = $stm->execute();
            if ($result) {
                $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success !</strong> You have added a new center Successfully !</div>';
                return $msg;
            } else {
                $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Something went Wrong !</div>';
                return $msg;
            }
        }
    }


    // Select All User Method



    // User login Autho Method

    // Check User Account Satatus





    // User Login Authotication Method



    // Get Single User Information By Id Method



    //
    //   Get Single User Information By Id Method


    // Delete User by Id Method


    // User Deactivated By Admin


    // User Deactivated By Admin





    // Check Old password method


    // Change User pass By Id



}
