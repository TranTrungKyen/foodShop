<?php 
require_once('../../db/config.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa danh mục</title>
    <link rel="stylesheet" href="../../../css/admin.css">
</head>
<body>
    
    <div class="model">
        <form class="mt-16" action="<?= SITEURL; ?>admin/controllers/category/delete.php?id=<?= $_GET['id']; ?>" method="POST">
            <div class="model-box">
                <h3 class="model-box__title">Bạn chắc chắn muốn xóa?</h3>
                <div class="btn-group mt-16">
                    <input type="submit" value="Xác nhận" class="btn btn-danger" name="btnDelete">
                    <input type="submit" value="Huỷ" class="btn btn-secondary" name="btnCancel">
                </div>
            </div>
        </form>
    </div>
</body>
</html>


