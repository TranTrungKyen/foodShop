<?php 
require_once('../../db/config.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete food</title>
    <link rel="stylesheet" href="../../../css/admin.css">
</head>
<body>
    
    <div class="model">
        <?php 
            if(isset($_SESSION['noti'])){
                $_SESSION['noti'];
                echo $_SESSION['noti'];
                unset($_SESSION['noti']);
            }
        ?>
        <form class="mt-16" action="<?= SITEURL; ?>admin/controllers/food/delete.php?id=<?= $_GET['id']; ?>" method="POST">
            <div class="model-box">
                <h3 class="model-box__title">Are you sure?</h3>
                <div class="btn-group mt-16">
                    <input type="submit" value="Yes" class="btn btn-danger" name="btnDelete">
                    <input type="submit" value="No" class="btn btn-secondary" name="btnCancel">
                </div>
            </div>
        </form>
    </div>
</body>
</html>


