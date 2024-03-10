<?php
session_start();
include('../../db/db_func.php');
?>
<?php
if (isset($_POST['btnDelete'])) {
    // Get data input
    $id  = $_GET['id'];
    // Lay ra category can xoa tham chieu den ten file anh
    $sql = "SELECT * FROM product
        WHERE id='$id'
        ";

    $res = excuteResult($sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $imageName = $row['thumbnail'];
        // Viet cau lenh truy van xoa dữ liệu
        $sql = "UPDATE product SET 
        deleted='1'
        WHERE id='$id'
        ";
        // Thuc thi cau lenh truy van
        $res = excute($sql);
        if ($res == TRUE) {
            $_SESSION["noti"] = "<div class='success'>Xóa sản phẩm thành công!</div>";
            // Xóa ảnh trong bộ nhớ
            $file_path = "../../../images/food/" . $imageName;
            // Kiểm tra xem tệp tồn tại trước khi xóa
            if (file_exists($file_path)) {
                // Thực hiện xóa tệp
                if (unlink($file_path)) {
                    echo "File has been deleted successfully.";
                } else {
                    echo "Failed to delete the file.";
                    die();
                }
            } else {
                echo "File does not exist.";
                die();
            }
            header("location:" . SITEURL . "admin/layout/food/index.php");
        } else {
            $_SESSION["noti"] = "<div class='error'>Xóa sản phẩm thất bại!</div>";

            header("location:" . SITEURL . "admin/layout/food/index.php");
        }
    }
} else if (isset($_POST['btnCancel'])) {
    $_SESSION["noti"] = "<div class='error'>Xóa sản phẩm thất bại!</div>";
    header("location:" . SITEURL . "admin/layout/food/index.php");
}
?>