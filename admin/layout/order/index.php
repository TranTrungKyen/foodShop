<?php include('../../partials/menu.php'); ?>
<?php
if (isset($_SESSION['noti'])) {
    echo $_SESSION['noti'];
    unset($_SESSION['noti']);
}
?>

<!-- Main Content Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>
        <ul class="order-status d-flex mt-16">
            <li class="order-status_item mr-16">
                <a href="<?= SITEURL; ?>admin/controllers/order/searchByStatus.php?status=0" class="btn btn-primary">Processing</a>
            </li>
            <li class="order-status_item mr-16">
                <a href="<?= SITEURL; ?>admin/controllers/order/searchByStatus.php?status=1" class="btn btn-primary">Processed</a>
            </li>
            <li class="order-status_item mr-16">
                <a href="<?= SITEURL; ?>admin/controllers/order/searchByStatus.php?status=2" class="btn btn-primary">Shipping</a>
            </li>
            <li class="order-status_item mr-16">
                <a href="<?= SITEURL; ?>admin/controllers/order/searchByStatus.php?status=3" class="btn btn-primary">Completed</a>
            </li>
            <li class="order-status_item">
                <a href="<?= SITEURL; ?>admin/controllers/order/searchByStatus.php" class="btn btn-primary">All order</a>
            </li>
        </ul>
        <?php
        function convertStatusToString($status)
        {
            switch ($status) {
                case 0:
                    $status = "Processing";
                    break;
                case 1:
                    $status = "Processed";
                    break;
                case 2:
                    $status = "Delivering";
                    break;
                case 3:
                    $status = "Completed";
                    break;
                default:
                    $status = "Null";
                    break;
            }
            return $status;
        }
        $sql = "";
        if (isset($_SESSION['sql']) && !empty($_SESSION['sql'])) {
            $sql = $_SESSION['sql'];
        } else {
            $sql = "SELECT * FROM `order` WHERE status = '0'";
        }
        $res = excuteResult($sql);
        if ($res == TRUE) {
            // Khoi tai so thu tu cho admin
            $sn = 1;
            // Kiem tra so ban ghi trong db
            $count = mysqli_num_rows($res);
            // Neu so ban ghi > 0 hien thi ra bang 
            if ($count > 0) { ?>

                <table class="tbl-full mt-16">
                    <tr>
                        <th>S.N.</th>
                        <th>Full name</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th>Address</th>
                        <th>Note</th>
                        <th>Created at</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    // Lay ra du lieu trong bang order
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $order_id = $rows['id'];
                        $fullname = $rows['fullname'];
                        $email = $rows['email'];
                        $phone_number = $rows['phone_number'];
                        $address = $rows['address'];
                        $note = $rows['note'];
                        $created_at = $rows['order_date'];
                        $status = $rows['status'];
                        $total_money = $rows['total_money']; ?>
                        <!-- Hien thi cac ban ghi  -->
                        <tr>
                            <td><?= $sn++; ?></td>
                            <td><?= $fullname; ?></td>
                            <td><?= $email; ?></td>
                            <td><?= $phone_number; ?></td>
                            <td><?= $address; ?></td>
                            <td><?= $note; ?></td>
                            <td><?= formatDate($created_at); ?></td>
                            <td><?= convertStatusToString($status); ?></td>
                            <td class="price"><?= $total_money; ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?= SITEURL; ?>admin/layout/order/order_details.php?order_id=<?= $order_id; ?>&status=<?= $status; ?>" class="btn btn-secondary">Details</a>
                                </div>
                            </td>
                        </tr>
            <?php
                    }
                    echo "</table>";
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
            function formatDate($date){
                return date('d/m/Y', strtotime($date));
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