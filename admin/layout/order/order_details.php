<?php include('../../partials/menu.php'); ?>


<!-- Main Content Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Order details</h1>
        <?php
        $order_id = '';
        $status = '';
        if (isset($_GET['order_id']) && isset($_GET['status'])) {
            $order_id = $_GET['order_id'];
            $status = $_GET['status'];
        } else {
            echo "<h1>Hóa đơn không tồn tại</h1>";
            die();
        }
        // Viet cau lenh truy van 
        $sql = "SELECT order_details.price AS od_price, order_details.num AS od_quantity, order_details.total_money AS od_total_money,
                product.title AS p_title, product.thumbnail AS p_thumbnail,
                category.name AS c_name  
                FROM order_details 
                INNER JOIN product ON order_details.product_id = product.id
                INNER JOIN category ON product.category_id = category.id
                WHERE order_details.order_id = '$order_id'";
        $res = excuteResult($sql);
        if ($res == TRUE) {
            // Khoi tai so thu tu
            $sn = 1;
            // Kiem tra so ban ghi trong db
            $count = mysqli_num_rows($res);
            // Neu so ban ghi > 0 hien thi ra bang 
            if ($count > 0) { ?>

                <table class="tbl-full mt-16">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>

                    <?php
                    // Lay ra du lieu trong bang order
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $title = $rows['p_title'];
                        $thumbnail = $rows['p_thumbnail'];
                        $category = $rows['c_name'];
                        $price = $rows['od_price'];
                        $quantity = $rows['od_quantity'];
                        $total_money = $rows['od_total_money']; ?>
                        <!-- Hien thi cac ban ghi  -->
                        <tr>
                            <td><?= $sn++; ?></td>
                            <td><?= $title; ?></td>
                            <td>
                                <?php if (!empty($thumbnail)) { ?>
                                    <img src="<?= SITEURL . "images/food/" . $thumbnail ?>" alt="<?= $thumbnail ?>" height="80px">
                                <?php } else { ?>
                                    <p class="error" style="line-height: 100px;">Null</p>
                                <?php } ?>
                            </td>
                            <td><?= $category; ?></td>
                            <td><?= $quantity; ?></td>
                            <td class="price"><?= $price; ?></td>
                            <td class="price"><?= $total_money; ?></td>
                        </tr>
            <?php
                    }
                    echo "</table>";
                    switch ($status) {
                        case 0:
                            echo '
                                <div class="btn-group btn-group--center mt-16">
                                    <a href="' . SITEURL . 'admin/controllers/order/updateStatus.php?order_id=' . $order_id . '&status=' . $status . '" class="btn btn-secondary">Confirm</a>
                                </div>
                            ';
                            break;
                        case 1:
                            echo '
                                <div class="btn-group btn-group--center mt-16">
                                    <a href="' . SITEURL . 'admin/controllers/order/updateStatus.php?order_id=' . $order_id . '&status=' . $status . '" class="btn btn-secondary">Delivery</a>
                                </div>
                            ';
                            break;
                        default:
                            break;
                    }
                } else {
                    // Neu khong co bann ghi nao
                    echo "<h1 class='mt-16'>Không có dữ liệu</h1>";
                }
            } else {
                // Neu khong truy van duoc du lieu
                echo "<h1 class='mt-16'>Lỗi truy vấn!</h1>";
            }
            if (!empty($_SESSION['sql'])) {
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