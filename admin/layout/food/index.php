<?php include('../../partials/menu.php'); ?>


<!-- Main Content Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Quản lý sản phẩm</h1>
        <!-- Hien thi thong bao -->
        <?php
        if (isset($_SESSION['noti'])) {
            echo $_SESSION['noti'];
            unset($_SESSION['noti']);
        }
        ?>
        <!-- Nut them san pham va input search theo ten san pham -->
        <div class="d-flex justify-space mt-16">
            <a href="./add-food.php" class="btn btn-primary">Thêm sản phẩm</a>
            <form action="<?= SITEURL; ?>admin/controllers/food/search.php" method="POST" class="search-box">
                <button class="btn-search" name="btnSearch"><i class="fas fa-search"></i></button>
                <input type="text" class="input-search" name="search" placeholder="Tìm kiếm...">
            </form>
        </div>

        <?php
        $sql = "";
        if (isset($_SESSION['sql']) && !empty($_SESSION['sql'])) {
            $sql = $_SESSION['sql'];
        } else {
            $sql = "SELECT product.*, category.name as category_name FROM product 
                JOIN category ON product.category_id = category.id WHERE product.deleted = '0' AND category.deleted = '0'";
        }
        $res = excuteResult($sql);
        if ($res == TRUE) {
            // Khoi tai so thu tu cho category
            $sn = 1;

            // Kiem tra so ban ghi trong db
            $count = mysqli_num_rows($res);
            if ($count > 0) { ?>
                <!-- In bảng -->
                <table class="tbl-full mt-16">
                    <tr>
                        <th style="width: 32px;">STT</th>
                        <th style="width: 100px;">Tiêu đề</th>
                        <th style="width: 100px;">Đơn giá</th>
                        <th style="width: 32px;">Giảm</th>
                        <th style="width: 80px;">Danh mục</th>
                        <th style="width: 200px;">Mô tả</th>
                        <th style="width: 100px;">Ảnh</th>
                        <th style="width: 80px;">Tạo ngày</th>
                        <th style="width: 112px;">Cập nhật ngày</th>
                        <th style="width: 100px;">Hành động</th>
                    </tr>

                    <!-- In dòng dữ liệu -->
                    <?php while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $price = $rows['price'];
                        $discount = $rows['discount'];
                        $category_name = $rows['category_name'] ? $rows['category_name'] : 'Null';
                        $description = $rows['description'];
                        $thumbnail = $rows['thumbnail'];
                        $created_at = $rows['created_at'];
                        $updated_at = $rows['updated_at'];
                    ?>
                        <tr>
                            <td><?= $sn++; ?></td>
                            <td><?= $title; ?></td>
                            <td class="price"><?= $price; ?></td>
                            <td><?= $discount . "%"; ?></td>
                            <td><?= $category_name; ?></td>
                            <td><?= $description; ?></td>
                            <td>
                                <?php if (!empty($thumbnail)) { ?>
                                    <img src="<?= SITEURL . "images/food/" . $thumbnail ?>" alt="<?= $thumbnail ?>" height="80px">
                                <?php } else { ?>
                                    <p class="error" style="line-height: 100px;">Null</p>
                                <?php } ?>
                            </td>
                            <td><?= formatDate($created_at); ?></td>
                            <td><?= formatDate($updated_at); ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="./update-food.php?id=<?= $id; ?>" class="btn btn-secondary" style="width: 100px; padding-left: 4px; padding-right: 4px;">Cập nhật</a>
                                    <a href="./delete-food.php?id=<?= $id; ?>" class="btn btn-danger">Xóa</a>
                                </div>
                            </td>
                        </tr>
                        <!-- Ket thuc in dòng -->
            <?php    }
                    // Ket thuc neu kiem tra khong co du lieu
                    echo "</table>";
                } else {
                    // Không có dữ liệu thông báo cho người dùng
                    echo "<h1 class='mt-16'>Không có dữ liệu</h1>";
                }
            } else {
                echo "<h1 class='mt-16'>Lỗi truy vấn</h1>";
            }
            function formatDate($date){
                return date('d/m/Y', strtotime($date));
            }
            if(!empty($_SESSION['sql'])){
                unset($_SESSION['sql']);
            }
            ?>

    </div>
</div>
<!-- Main Content End -->
<script>
    // Format du lieu tu số sang tiền
    function formatMoney(input) {
      // Chuyển đổi chuỗi thành số
      const number = parseInt(input);

      // Kiểm tra xem có phải là số không
      if (isNaN(number)) {
        return "0";
      }

      // Định dạng số tiền thành chuỗi và thêm đơn vị VND vào cuối
      const formattedCurrency = number.toLocaleString('vi-VN') + ' VNĐ';
      // Sử dụng toLocaleString để định dạng số với dấu cách phân tách hàng nghìn tự động

      return formattedCurrency;
    }
    // Format du lieu tu tiền sang số
    function moneyToNumber(input) {
      // Loại bỏ ký tự tiền tệ và dấu cách
      const cleanedInput = input.replace(/[^\d]/g, '');

      // Chuyển đổi chuỗi thành số
      const number = parseInt(cleanedInput);

      // Kiểm tra xem có phải là số không
      if (isNaN(number)) {
        return 0;
      }

      return number;
    }
    var getPriceElements = document.querySelectorAll(".price");
    getPriceElements.forEach((item) => {
      item.textContent = formatMoney(item.textContent);
    })
</script>
<?php include('../../partials/footer.php') ?>