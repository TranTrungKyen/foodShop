<?php 
session_start();
include('../../db/db_func.php');

if (isset($_POST['btnDelete'])) {
    // Get data input
    $id  = $_GET['id'];
    $roleId  = isset($_GET['setRole']) ? $_GET['setRole'] : 1;

    // Viet cau lenh truy van chèn dữ liệu
    $sql = "UPDATE user SET 
        deleted = '1'
        WHERE id='$id'
        ";
    // Thuc thi cau lenh truy van
    excute($sql);
    if ($roleId == 2) {
        $_SESSION['noti'] = "<div class='success'>Xóa người dùng thành công!</div>";
        header("location:" . SITEURL . "admin/layout/admin/manage-user.php");
    } else {
        $_SESSION['noti'] = "<div class='success'>Xóa người quản trị thành công!</div>";
        header("location:" . SITEURL . "admin/layout/admin/index.php");
    }
} else if (isset($_POST['btnCancel'])) {
    if ($roleId == 2) {
        $_SESSION['noti'] = "<div class='error'>Xóa người dùng thất bại!</div>";
        header("location:" . SITEURL . "admin/layout/admin/manage-user.php");
    } else {
        $_SESSION['noti'] = "<div class='error'>Xóa người quản trị thất bại!</div>";

        header("location:" . SITEURL . "admin/layout/admin/index.php");
    }
}
?>