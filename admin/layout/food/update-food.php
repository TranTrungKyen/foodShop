<?php include('../../partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Cập nhật sản phẩm</h1>

        <?php
        if (isset($_SESSION['noti'])) {
            $_SESSION['noti'];
            echo $_SESSION['noti'];
            unset($_SESSION['noti']);
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // Lay ra food co id muon sua
            $sql = "SELECT product.*, category.name as category_name FROM product 
                JOIN category ON product.category_id = category.id WHERE product.id = '$id'";
            // Thuc hien truy van
            $res =  excuteResult($sql);
            if ($res == TRUE) {
                $count = mysqli_num_rows($res);
                if ($count == 1) {
                    $rows = $res->fetch_assoc();
                    $title = $rows['title'];
                    $price = $rows['price'];
                    $discount = $rows['discount'];
                    $category_id = $rows['category_id'];
                    $category_name = $rows['category_name'];
                    $description = $rows['description'];
                    $thumbnail = $rows['thumbnail'];
                }
            }
        }
        ?>

        <form class="mt-16" action="<?= SITEURL; ?>admin/controllers/food/update.php?id=<?= $id; ?>" method="POST" enctype="multipart/form-data">
            <div class="field">
                <label for="title">Tiêu đề</label>
                <input type="text" placeholder="Tiêu đề" name="title" id="title" value="<?= $title; ?>" require>
            </div>
            <div class="field">
                <label for="price">Đơn giá</label>
                <input type="number" inputmode="numeric" pattern="[0-9]*" placeholder="Đơn giá" name="price" id="price" value="<?= $price; ?>" require>
            </div>
            <div class="field">
                <label for="discount">Giảm</label>
                <input type="number" inputmode="numeric" pattern="[0-9]*" placeholder="Giảm" name="discount" id="discount" value="<?= $discount; ?>" require>
            </div>
            <div class="field">
                <label for="category_name">Danh mục</label>
                <select id="category_name" name="category_name">
                    <?php
                    $sql = "SELECT id, name FROM category";
                    $res = excuteResult($sql);
                    if ($res == TRUE) {
                        // Khoi tai so thu tu cho product
                        $sn = 1;

                        // Kiem tra so ban ghi trong db
                        $count = mysqli_num_rows($res);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $c_id = $row['id'];
                                $c_name = $row['name']; ?>
                                <option value="<?= $c_id ?>"
                                <?= ($c_id == $category_id) ? 'selected' : ''?>
                                ><?= $c_name ?></option>
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
                <textarea class="description" name="description" id="description" placeholder="Mô tả" rows="4"><?= trim($description); ?></textarea>
            </div>
            <div class="field">
                <label for="">Ảnh
                    <img style="height:200px; display:block;" 
                    src="<?= (!empty($thumbnail)) ? SITEURL . 'images/food/' . $thumbnail : '' ?>" 
                    alt="<?= (!empty($thumbnail)) ? $thumbnail : 'Null' ?>" 
                    id="preview-image">
                </label>
                <span>Tên ảnh: <span class="file-name"><?= (!empty($thumbnail)) ? $thumbnail : 'No image' ?></span></span>
                <label for="image">Chọn ảnh</label>
                <input type="file" name="image" id="image" onchange="previewImage(event)" style="display: none;">
                <input type="text" name="currentImage" id="currentImage" value="<?= (!empty($thumbnail)) ? $thumbnail : '' ?>" style="display: none;">
            </div>
            <input class="btn btn-primary mt-16" type="submit" name="submit" value="Cập nhật">
        </form>
    </div>
</div>

<?php include('../../partials/footer.php') ?>