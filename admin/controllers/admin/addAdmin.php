
<?php
session_start();
require_once('../../db/db_func.php');

function checkEmail($email){
  $sql = "SELECT email FROM user WHERE email = '$email' AND deleted = '0'";
  $res = excuteResult($sql);
  $count = mysqli_num_rows($res);
  if($count > 0){
    return false;
  }
  return true;
}

if (isset($_POST['btnSubmit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $address = $_POST['address'];
    $phoneNumber = $_POST['phone_number'];
    $roleId = isset($_GET['setRole']) ? $_GET['setRole'] : 1;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentTime = date("Y-m-d H:i:s");
    $deleted = 0;
    if(!checkEmail($email)){
      if(isset($_SESSION['role_id'])){
        if($roleId == 2){
          $_SESSION['noti'] = "<div class='error'>Email đã tồn tại!</div>";
          header("location:" . SITEURL . "admin/layout/admin/add-admin.php?setRole=2");
          die();
        }else{
          $_SESSION['noti'] = "<div class='error'>Email đã tồn tại!</div>";
          header("location:" . SITEURL . "admin/layout/admin/add-admin.php");
          die();
        }
      }else{
        $_SESSION['noti'] = "<div class='error'>Email đã tồn tại!</div>";
        header("location:" . SITEURL . "register.php");
        die();
      }
    }
    $sql = "INSERT INTO user SET
      fullname = '$fullname',
      email = '$email', 
      phone_number = '$phoneNumber', 
      address = '$address', 
      password = '$password', 
      role_id = '$roleId', 
      created_at = '$currentTime', 
      updated_at = '$currentTime', 
      deleted = '$deleted'";
      excute($sql);
      if($roleId == 2){
        $_SESSION['noti'] = "<div class='success'>Thêm người dùng thành công!</div>";
        header("location:" . SITEURL . "admin/layout/admin/manage-user.php");
      }else{
        $_SESSION['noti'] = "<div class='success'>Thêm người quản trị thành công!</div>";
        header("location:" . SITEURL . "admin/layout/admin/index.php");
      }
}
