
<?php
session_start();
require_once('../../db/db_func.php');

if (isset($_POST['submit'])) {
    // Get data input
    $title = $_POST['title'];
    $price = intval($_POST['price']);
    $discount = intval($_POST['discount']);
    $category_id = intval($_POST['category_name']);
    $description = $_POST['description'];
    $currentImage = $_POST['currentImage'] ? $_POST['currentImage'] : '';
    $imageName = $currentImage;
    if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
        $imageName =  $_FILES['image']['name'];
        if (preg_match("/\.(jpg|jpeg|png|gif)$/i", $imageName)) {
            $newImageName = 'food_' . uniqid() . '.' . pathinfo($imageName, PATHINFO_EXTENSION);
            $srcPath =  $_FILES['image']['tmp_name'];
            $destinationPath = "../../../images/food/" . $newImageName;

            $upload = move_uploaded_file($srcPath, $destinationPath);
            if ($upload == false) {
                $_SESSION['noti'] = "<div class='error'>Failed to upload image</div>";
                header("location:" . SITEURL . "admin/layout/food/update-food.php");
                die();
            }
            $imageName =  $newImageName;
        }
    }
    // Xóa ảnh trong bộ nhớ
    if($currentImage != '' && $imageName  != $currentImage){
        $file_path = "../../../images/food/" . $currentImage;
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
    $currentTime = date('Y-m-d H:i:s');

    // Viet cau lenh truy van chèn dữ liệu
    $sql = "UPDATE product SET 
        category_id = '$category_id',
        title = '$title',
        price = '$price',
        discount = '$discount',
        thumbnail = '$imageName',
        description = '$description',
        updated_at = '$currentTime'
        WHERE id='$id'
        ";
    // Thuc thi cau lenh truy van
    excute($sql);
    
    $_SESSION['noti'] = "<div class='success'>Update food successful</div>";

    header("location:" . SITEURL . "/admin/layout/food/index.php");
}
?>