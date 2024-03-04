
<?php
session_start();
require_once('../../db/db_func.php');


if (isset($_POST['submit'])) {
    // Get data input
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phone_number'];
    $id  = $_GET['id'];
    $roleId = isset($_GET['setRole']) ? $_GET['setRole'] : 1;
    $currentTime = date('Y-m-d H:i:s');
    // Viet cau lenh truy van chèn dữ liệu
    $sql = "UPDATE user SET 
        fullname='$fullname',
        email = '$email', 
        phone_number = '$phoneNumber', 
        address = '$address', 
        updated_at = '$currentTime' 
        WHERE id='$id'
        ";
    // Thuc thi cau lenh truy van
    excute($sql);
    if($_SESSION['id'] == $id){
        reloadSession();
    }
    if ($_SESSION['role_id'] == 1) {
        
        if ($roleId == 2) {
            
            $_SESSION['noti'] = "<div class='success'>Cập nhật người dùng thành công!</div>";

            header("location:" . SITEURL . "admin/layout/admin/manage-user.php");
            die();
        } else {
            $_SESSION['noti'] = "<div class='success'>Cập nhật người quản trị thành công!</div>";

            header("location:" . SITEURL . "admin/layout/admin/index.php");
            die();
        }
    } else {
        $_SESSION['noti'] = "<script>alert('Cập nhật thông tin thành công');</script>";

        header("location:" . SITEURL . "infoUser.php");
        die();
    }
}
?>