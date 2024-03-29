<?php include('../../partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add food</h1>

        <?php
        if (isset($_SESSION['noti'])) {
            echo $_SESSION['noti'];
            unset($_SESSION['noti']);
        }
        ?>

        <form class="mt-16" action="<?= SITEURL; ?>admin/controllers/food/add.php" method="POST" enctype="multipart/form-data">
            <div class="field">
                <label for="title">Title</label>
                <input type="text" placeholder="Title" name="title" id="title" require>
            </div>
            <div class="field">
                <label for="price">Price</label>
                <input type="number" inputmode="numeric" pattern="[0-9]*" placeholder="Price" name="price" id="price" require>
            </div>
            <div class="field">
                <label for="discount">Discount</label>
                <input type="number" inputmode="numeric" pattern="[0-9]*" placeholder="discount" name="discount" id="discount" require>
            </div>
            <div class="field">
                <label for="category_name">Category name: </label>
                <select id="category_name" name="category_name">
                    <?php
                    $sql = "SELECT id, name FROM category";
                    $res = excuteResult($sql);
                    if ($res == TRUE) {
                        // Khoi tai so thu tu cho category
                        $sn = 1;

                        // Kiem tra so ban ghi trong db
                        $count = mysqli_num_rows($res);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $c_id = $row['id'];
                                $c_name = $row['name']; ?>
                                <option value="<?= $c_id ?>"><?= $c_name ?></option>
                    <?php
                            }
                        } else {
                            // Không có dữ liệu thông báo cho người dùng
                            echo "<option value='0'>Empty</option>";
                        }
                    } else {
                        echo "<h1 class='mt-16'>Lỗi truy vấn</h1>";
                    }
                    ?>

                </select>
            </div>
            <div class="field">
                <label for="description">Desciption</label>
                <textarea class="description" name="description" id="description" placeholder="Description" rows="4"></textarea>
            </div>
            <div class="field">
                <label for="">
                    <img style="width:240px; display:none;" src="" alt="" id="preview-image">
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