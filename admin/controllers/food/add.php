
<?php
session_start();
require_once('../../db/db_func.php');

if (isset($_POST['submit'])) {
    // Lay du lieu tu form
    $title = trim($_POST['title']);
    $price = intval($_POST['price']);
    $discount = intval($_POST['discount']);
    $category_id = intval($_POST['category_name']);
    $description = trim($_POST['description']);
    // Security input
    $conn = mysqli_connect(LOCALHOST, DB_USER, DB_PASSWORD, DB_DBNAME);
    $title = mysqli_real_escape_string($conn, $title);
    // $price = mysqli_real_escape_string($conn, $price);
    // $discount = mysqli_real_escape_string($conn, $discount);
    // $category_id = mysqli_real_escape_string($conn, $category_id);
    $description = mysqli_real_escape_string($conn, $description);

    mysqli_close($conn);
    // lay du lieu anh 
    $imageName = "";
    if (isset($_FILES['image'])) {
        $imageName =  $_FILES['image']['name'];
        if (preg_match("/\.(jpg|jpeg|png|gif)$/i", $imageName)) {
            $newImageName = 'food_' . uniqid() . '.' . pathinfo($imageName, PATHINFO_EXTENSION);
            $srcPath =  $_FILES['image']['tmp_name'];
            $destinationPath = "../../../images/food/" . $newImageName;

            $upload = move_uploaded_file($srcPath, $destinationPath);
            if ($upload == false) {
                $_SESSION['noti'] = "<div class='error'>Failed to upload image</div>";
                header("location:" . SITEURL . "admin/layout/food/add-food.php");
                die();
            }
            $imageName =  $newImageName;
        }
    }
    $currentTime = date('Y-m-d H:i:s');

    $sql = "INSERT INTO product SET
    category_id = '$category_id',
    title = '$title',
    price = '$price',
    discount = '$discount',
    thumbnail = '$imageName',
    description = '$description',
    created_at = '$currentTime',
    updated_at = '$currentTime',
    deleted = '0';
    ";
    if (excute($sql) != true) {
        $_SESSION['noti'] = "<div class='error'>Failed to add food</div>";
        // Xóa ảnh trong bộ nhớ
        $file_path = "../../../images/food/" . $imageName;
        // Kiểm tra xem tệp tồn tại trước khi xóa
        if (file_exists($file_path)) {
            // Thực hiện xóa tệp
            unlink($file_path);
        }
        echo "Loi thuc thi lenh";
        die();
    }
    $_SESSION['noti'] = "<div class='success'>Add food successful</div>";
    header("location:" . SITEURL . "admin/layout/food/index.php");
}
