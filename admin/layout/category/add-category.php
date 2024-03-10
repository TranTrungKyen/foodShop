<?php include('../../partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Thêm danh mục</h1>

        <?php 
            if(isset($_SESSION['noti'])){
                echo $_SESSION['noti'];
                unset($_SESSION['noti']);
            }
        ?>

        <form class="mt-16" action="<?= SITEURL; ?>admin/controllers/category/add.php" method="POST" enctype="multipart/form-data">
        <div class="field">
                <label for="name">Tên danh mục</label>
                <input type="text" placeholder="Tên danh mục" name="name" id="name" require>
            </div>
            <div class="field">
                <label class="" for="">Hình ảnh hiện tại:
                    <img style="height:200px; display:none;"src="" alt="" id="preview-image">
                </label>
                <span>Tên ảnh: <span class="file-name">Không có ảnh</span></span>
                <label for="image">Chọn ảnh</label>
                <input type="file" name="image" id="image" onchange="previewImage(event)" style="display: none;">
            </div>
            <input class="btn btn-primary mt-16" type="submit" name="submit">
        </form>
    </div>
</div>

<?php include('../../partials/footer.php') ?>
