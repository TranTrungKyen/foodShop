
<?php
session_start();
require_once('../../db/db_func.php');

if (isset($_POST['btnSubmit'])) {
    // Get data input
    $inputPassword = md5($_POST['password']);
    $newPassword = md5($_POST['newPassword']);
    $confirmPassword = md5($_POST['confirmPassword']);
    $conn = mysqli_connect(LOCALHOST, DB_USER, DB_PASSWORD, DB_DBNAME);
    // Get data input
    $inputPassword = mysqli_real_escape_string($conn, $inputPassword);
    $newPassword = mysqli_real_escape_string($conn, $newPassword);
    $confirmPassword = mysqli_real_escape_string($conn, $confirmPassword);

    mysqli_close($conn);
    $id  = $_GET['id'];

    // Viet cau lenh truy van chọn lọc dữ liệu
    $sql = "SELECT * FROM user WHERE id='$id'";
    // Thuc thi cau lenh truy van
    $res = excuteResult($sql);
    if ($res == TRUE) {
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            $row = $res->fetch_assoc();
            $password = $row['password'];
            $roleId = $row['role_id'];
            if ($password == $inputPassword) {
                if ($newPassword == $confirmPassword) {
                    // Viet cau lenh truy van thay doi password
                    $sql = "UPDATE user SET password='$newPassword' WHERE id='$id'";
                    // Thuc thi cau lenh
                    $res = excute($sql);
                    if ($res == TRUE) {
                        if ($_SESSION['id'] == $id) {
                            reloadSession();
                        }
                        if ($_SESSION['role_id'] != 1) {
                            $_SESSION['noti'] = "<script>alert('Cập nhật mật khẩu thành công');</script>";
                            header("location:" . SITEURL . "infoUser.php");
                            exit();
                        }
                        $_SESSION["noti"] = "<div class='success'>Cập nhật mật khẩu thành công!</div>";
                        if ($roleId == 2) {
                            header("location:" . SITEURL . "admin/layout/admin/manage-user.php");
                            exit();
                        } else {
                            header("location:" . SITEURL . "admin/layout/admin/index.php");
                            exit();
                        }
                    } else {
                        $_SESSION["noti"] = "<div class='error'>Lỗi thực thi truy vấn!</div>";

                        header("location:" . SITEURL . "admin/layout/admin/change-password-admin.php?id=$id");
                        exit();
                    }
                } else {
                    if ($_SESSION['role_id'] != 1) {
                        $_SESSION['noti'] = "<script>alert('Mật khẩu mới không trùng khớp!');</script>";
                        header("location:" . SITEURL . "changePasswordUser.php");
                        exit();
                    }
                    $_SESSION["noti"] = "<div class='error'>Mật khẩu mới không trùng khớp!</div>";

                    header("location:" . SITEURL . "admin/layout/admin/change-password-admin.php?id=$id");
                    exit();
                }
            } else {

                if ($_SESSION['role_id'] != 1) {
                    $_SESSION['noti'] = "<script>alert('Mật khẩu không chính xác');</script>";
                    header("location:" . SITEURL . "changePasswordUser.php");
                    exit();
                }
                $_SESSION["noti"] = "<div class='error'>Mật khẩu cũ không đúng!</div>";

                header("location:" . SITEURL . "admin/layout/admin/change-password-admin.php?id=$id");
                exit();
            }
        }
    } else {
        $_SESSION["noti"] = "<div class='error'>Cập nhật mật khẩu thất bại!</div>";

        header("location:" . SITEURL . "admin/layout/admin/change-password-admin.php?id=$id");
        exit();
    }
}
?>