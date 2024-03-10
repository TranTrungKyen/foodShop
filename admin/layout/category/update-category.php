<?php include('../../partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Cập nhật danh mục</h1>

        <?php
        if (isset($_SESSION['noti'])) {
            $_SESSION['noti'];
            echo $_SESSION['noti'];
            unset($_SESSION['noti']);
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // Lay ra category co id muon sua
            $sql = "SELECT * from category WHERE id='$id'";
            // Thuc hien truy van
            $res =  excuteResult($sql);
            if ($res == TRUE) {
                $count = mysqli_num_rows($res);
                if ($count == 1) {
                    $rows = $res->fetch_assoc();
                    $name = $rows['name'];
                    $thumbnail = $rows['thumbnail'];
                }
            }
        }
        ?>

        <form class="mt-16" action="<?= SITEURL; ?>admin/controllers/category/update.php?id=<?= $id; ?>" 
        method="POST" 
        enctype="multipart/form-data">
            <div class="field">
                <label for="name">Tên danh mục</label>
                <input type="text" placeholder="Tên danh mục" name="name" id="name" value="<?= $name; ?>" require>
            </div>
            <div class="field">
                <label for="">Hình ảnh
                    <img style="height:200px; display:block;"   
                    src="<?= (!empty($thumbnail)) ? SITEURL.'images/category/'.$thumbnail : '' ?>"  
                    alt="<?= (!empty($thumbnail)) ? $thumbnail : 'Null' ?>" 
                    id="preview-image">
                </label>
                <span>Tên ảnh: <span class="file-name"><?= (!empty($thumbnail)) ? $thumbnail : 'No image' ?></span></span>
                <label for="image">Chọn ảnh</label>
                <input type="file" name="image" id="image" onchange="previewImage(event)" style="display: none;">
                <input type="text" name="currentImage" id="currentImage" 
                value="<?= (!empty($thumbnail)) ? $thumbnail : '' ?>" 
                style="display: none;">
            </div>
            <input class="btn btn-primary mt-16" type="submit" name="submit" value="Cập nhật">
        </form>
    </div>
</div>

<?php include('../../partials/footer.php') ?>