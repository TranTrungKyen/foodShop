
<?php
session_start();
require_once('../../db/db_func.php');

if (isset($_POST['submit'])) {
    // Get data input
    $name = $_POST['name'];
    // Security input
    $conn = mysqli_connect(LOCALHOST, DB_USER, DB_PASSWORD, DB_DBNAME);
    $name = mysqli_real_escape_string($conn, $name);

    mysqli_close($conn);
    
    $currentImage = $_POST['currentImage'] ? $_POST['currentImage'] : '';
    $imageName = $currentImage;
    if (!empty($_FILES['image']['name'])) {
        $imageName =  $_FILES['image']['name'];
        if (preg_match("/\.(jpg|jpeg|png|gif)$/i", $imageName)) {
            $newImageName = 'category_' . uniqid() . '.' . pathinfo($imageName, PATHINFO_EXTENSION);
            $srcPath =  $_FILES['image']['tmp_name'];
            $destinationPath = "../../../images/category/" . $newImageName;

            $upload = move_uploaded_file($srcPath, $destinationPath);
            if ($upload == false) {
                $_SESSION['noti'] = "<div class='error'>Failed to upload image</div>";
                header("location:" . SITEURL . "admin/layout/category/add-category.php");
                die();
            }

            $imageName =  $newImageName;
        }
    }
    // Xóa ảnh trong bộ nhớ
    if ($currentImage != '' && $imageName  != $currentImage) {
        $file_path = "../../../images/category/" . $currentImage;
        // Kiểm tra xem tệp tồn tại trước khi xóa
        if (file_exists($file_path)) {
            // Thực hiện xóa tệp
            if (unlink($file_path)) {
                echo "File has been deleted successfully.";
            } else {
                echo "Failed to delete the file.";
                die();
            }
        }
    }
    // Lay ra id
    $id  = $_GET['id'];

    // Viet cau lenh truy van chèn dữ liệu
    $sql = "UPDATE category SET 
        name='$name',
        thumbnail = '$imageName'
        WHERE id='$id'
        ";
    // Thuc thi cau lenh truy van
    excute($sql);

    $_SESSION['noti'] = "<div class='success'>Update category successful</div>";
    header("location:" . SITEURL . "/admin/layout/category/index.php");
}
?>