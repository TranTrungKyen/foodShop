<?php
include('./partials-front/header.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="<?= SITEURL; ?>food-search.php" method="GET">
            <input type="search" name="search" placeholder="Nhập tên món ăn" required>
            <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">KHÁM PHÁ ẨM THỰC</h2>
        <!-- Hien thi data category noi bat -->
        <?php
        // Viet cau lenh truy van 
        $sql = "SELECT * FROM category LIMIT 3";
        // Thuc thi truy van
        $res = excuteResult($sql);
        // Dem so ban ghi
        $count = mysqli_num_rows($res);
        // So ban ghi > 0 thi hien thi du lieu
        if ($count > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {
                // Lay ra cac truong du lieu
                $cid = $rows['id'];
                $name = $rows['name'];
                $thumbnail = $rows['thumbnail']; ?>
                <a href="<?= SITEURL; ?>category-foods.php?cid=<?= $cid; ?>">
                    <div class="box-3 float-container">
                        <!-- Neu co image thi hien thi -->
                        <?php if (!empty($thumbnail)) { ?>
                            <img src="<?= SITEURL; ?>images/category/<?= $thumbnail; ?>" alt="<?= $name; ?>" class="img-responsive img-curve">
                            <h3 class="float-text text-white"><?= $name; ?></h3>
                            <!-- Neu khong co anh -->
                        <?php } else { ?>
                            <h3 class="float-text text-primary">Image Null</h3>
                        <?php } ?>
                    </div>
                </a>
        <?php
            }
        }
        ?>
        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">THỰC ĐƠN</h2>
        <div class="row justify-around">
            <!-- Hien thi mon an moi -->
            <?php
            // Viet cau lenh truy van 
            $sql2 = "SELECT * FROM product WHERE deleted = '0' LIMIT 6";
            // Thuc thi truy van
            $res2 = excuteResult($sql2);
            // Dem so ban ghi
            $count2 = mysqli_num_rows($res2);
            // So ban ghi > 0 thi hien thi du lieu
            if ($count2 > 0) {
                while ($rows = mysqli_fetch_assoc($res2)) {
                    $id = $rows['id'];
                    $title = $rows['title'];
                    $price = $rows['price'];
                    $description = $rows['description'];
                    $discount = $rows['discount'];
                    $thumbnail = $rows['thumbnail']; ?>
                    <div class="food-menu-box px-2 py-2 col c-5 mt-24">
                        <div class="row justify-between">
                            <div class="food-menu-img col c-4">
                                <?php if (!empty($thumbnail)) { ?>
                                    <img src="<?= SITEURL; ?>images/food/<?= $thumbnail; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php } else { ?>
                                    <h3 class="img-responsive img-curve">Null Image</h3>
                                <?php } ?>
                            </div>
                            <div class="food-menu-desc col c-7">
                                <h4><?= $title; ?></h4>
                                <div class="food-price">
                                    <?php if ($discount > 0) { ?>
                                        <p class="price price_original"><?= $price; ?></p>
                                        <p class="price price_current"><?= ($price - ($price * ($discount / 100))); ?></p>
                                    <?php } else { ?>
                                        <p class="price price_current"><?= $price; ?></p>
                                    <?php } ?>

                                </div>
                                <p class="food-detail">
                                    <?= $description; ?>
                                </p>
                                <br>
                                <a href="<?= SITEURL; ?>admin/controllers/cart/add.php?id=<?= $id; ?>&dir=1" class="btn btn-primary px-2 py-2">Thêm vào giỏ</a>
                            </div>
                        </div>
                    </div>

            <?php

                }
            }
            ?>

        </div>
    </div>

    <p class="text-center">
        <a href="<?= SITEURL; ?>foods.php">Xem thêm</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->
<?php
if (isset($_SESSION['model'])) {
    echo $_SESSION['model'];
    unset($_SESSION['model']);
}
?>
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
<?php include('./partials-front/footer.php') ?>