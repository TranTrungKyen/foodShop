
<?php
require_once('../../db/db_func.php');

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  // Xu ly anh
  $imageName = "";
  if(isset($_FILES['image'])){
    $imageName =  $_FILES['image']['name'];
    if(preg_match("/\.(jpg|jpeg|png|gif)$/i", $imageName)){
      $newImageName = 'category_'. uniqid() . '.' . pathinfo($imageName, PATHINFO_EXTENSION);
      $srcPath =  $_FILES['image']['tmp_name'];
      $destinationPath = "../../../images/category/".$newImageName;
  
      $upload = move_uploaded_file($srcPath,$destinationPath);
      if($upload == false){
        $_SESSION['noti'] = "<div class='error'>Failed to upload image</div>";
        header("location:" . SITEURL . "admin/layout/category/add-category.php");
        die();
      }
      $imageName =  $newImageName;
    }
  }
  
  $sql = "INSERT INTO category SET
      name = '$name',
      thumbnail = '$imageName'
      ";
  excute($sql);
  header("location:" . SITEURL . "admin/layout/category/index.php");
}
