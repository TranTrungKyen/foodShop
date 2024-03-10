<?php
require_once('./admin/db/db_func.php');
include('./partials-front/header.php');
if (isset($_GET['search'])) {
    $conn = mysqli_connect(LOCALHOST, DB_USER, DB_PASSWORD, DB_DBNAME);
    // Get data input
    $search = mysqli_real_escape_string($conn,$_GET['search']);

    mysqli_close($conn);
}

?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>Thực phẩm tìm kiếm của bạn <span class="text-white">"<?= $search; ?>"</span></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">THỰC ĐƠN</h2>
        <div class="row justify-around">
            <!-- Hien thi mon an moi -->
            <?php
            // Viet cau lenh truy van 
            $sql = "SELECT * FROM product WHERE deleted = '0' AND (title LIKE '%$search%' OR description LIKE '%$search%') ORDER BY category_id";
            // thuc thi sql
            $res = excuteResult($sql);
            // Kiem tra so ban ghi
            $count = mysqli_num_rows($res);
            // So ban ghi > 0 thi hien thi du lieu
            if ($count > 0) {
                while ($rows = mysqli_fetch_assoc($res)) {
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
                                    <img src="<?= SITEURL; ?>images/food/<?= $thumbnail; ?>" alt="<?= $title; ?>" class="img-responsive img-curve">
                                <?php } else { ?>
                                    <h3 class="img-responsive img-curve">Null Image</h3>
                                <?php } ?>
                            </div>
                            <div class="food-menu-desc col c-7">
                                <h4><?= $title; ?></h4>
                                <div class="food-price">
                                    <?php if ($discount > 0) { ?>
                                        <p class="price price_original"><?= $price; ?></p>
                                        <p class="price price_current"><?= ($price - ($discount * ($price / 100))); ?></p>
                                    <?php } else { ?>
                                        <p class="price price_current"><?= $price; ?></p>
                                    <?php } ?>

                                </div>
                                <p class="food-detail">
                                    <?= $description; ?>
                                </p>
                                <br>
                                <a href="<?= SITEURL; ?>admin/controllers/cart/add.php?id=<?= $id; ?>&search=<?= $search; ?>" class="btn btn-primary px-2 py-2">Thêm vào giỏ</a>
                            </div>
                        </div>
                    </div>

            <?php

                }
            } else {
                echo "<h1>Không tìm thấy dữ liệu</h1>";
            }
            ?>

        </div>

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->
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