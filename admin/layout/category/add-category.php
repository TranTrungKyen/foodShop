<?php include('../../partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add category</h1>

        <?php 
            if(isset($_SESSION['noti'])){
                echo $_SESSION['noti'];
                unset($_SESSION['noti']);
            }
        ?>

        <form class="mt-16" action="<?= SITEURL; ?>admin/controllers/category/add.php" method="POST" enctype="multipart/form-data">
        <div class="field">
                <label for="name">Name</label>
                <input type="text" placeholder="Category name" name="name" id="name" require>
            </div>
            <div class="field">
                <label class="" for="">Current image:
                    <img style="height:200px; display:none;"src="" alt="" id="preview-image">
                </label>
                <span>Image name: <span class="file-name">No image</span></span>
                <label for="image">Choose new file</label>
                <input type="file" name="image" id="image" onchange="previewImage(event)" style="display: none;">
            </div>
            <input class="btn btn-primary mt-16" type="submit" name="submit">
        </form>
    </div>
</div>

<?php include('../../partials/footer.php') ?>
