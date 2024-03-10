<?php include('../../partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Thêm sản phẩm</h1>

        <?php
        if (isset($_SESSION['noti'])) {
            echo $_SESSION['noti'];
            unset($_SESSION['noti']);
        }
        ?>

        <form class="mt-16" action="<?= SITEURL; ?>admin/controllers/food/add.php" method="POST" enctype="multipart/form-data">
            <div class="field">
                <label for="title">Tiêu đề</label>
                <input type="text" placeholder="Tiêu đề" name="title" id="title" require>
            </div>
            <div class="field">
                <label for="price">Đơn giá</label>
                <input type="number" inputmode="numeric" pattern="[0-9]*" placeholder="Đơn giá" name="price" id="price" require>
            </div>
            <div class="field">
                <label for="discount">Giảm</label>
                <input type="number" inputmode="numeric" pattern="[0-9]*" placeholder="Giảm" name="discount" id="discount" require>
            </div>
            <div class="field">
                <label for="category_name">Danh mục </label>
                <select id="category_name" name="category_name">
                    <?php
                    $sql = "SELECT id, name FROM category WHERE deleted = '0'";
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
                <label for="description">Mô tả</label>
                <textarea class="description" name="description" id="description" placeholder="Mô tả" rows="4"></textarea>
            </div>
            <div class="field">
                <label for="">
                    <img style="width:240px; display:none;" src="" alt="" id="preview-image">
                </label>
                <span>Tên ảnh: <span class="file-name">Không có</span></span>
                <label for="image">Chọn ảnh</label>
                <input type="file" name="image" id="image" onchange="previewImage(event)" style="display: none;">
            </div>

            <input class="btn btn-primary mt-16" type="submit" name="submit" value="Thêm">
        </form>
    </div>
</div>

<?php include('../../partials/footer.php') ?>