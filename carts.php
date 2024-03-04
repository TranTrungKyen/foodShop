<?php
session_start();
require_once("./admin/db/db_func.php")
?>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Cart</title>
  <!-- MDB icon -->
  <!-- <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" /> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="./css/bootstrap-shopping-carts.min.css" />
  <!-- Custom css -->
  <link rel="stylesheet" href="./css/cart.css">
  <?php
  if (isset($_SESSION['noti'])) {
    echo $_SESSION['noti'];
    unset($_SESSION['noti']);
  }
  ?>
</head>

<body>
  <?php
  if (isset($_SESSION['id'])) {
    $uid = $_SESSION['id'];
    $total_bill = 0;
    // Viet cau lenh truy van 
    $sql = "SELECT cart.*,
    product.title AS p_title, product.price AS p_price, product.discount AS p_discount, product.thumbnail AS p_thumbnail,
    category.name AS c_name  
    FROM cart 
    INNER JOIN product ON cart.product_id = product.id
    INNER JOIN category ON product.category_id = category.id
    WHERE cart.user_id = '$uid'";
    // Thuc thi truy van
    $res = excuteResult($sql);
    // Dem so ban ghi
    $count = mysqli_num_rows($res);
  } else {
    header("Location: " . SITEURL . "login.php");
  }
  ?>
  <section class="d-flex" style="background-color: #cafafe;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div class="p-5">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <h1 class="fw-bold mb-0 text-black">Giỏ hàng</h1>
                      <h6 class="mb-0 text-muted"><?= $count ?> sản phẩm</h6>
                    </div>
                    <div class="list-cart">
                      <?php
                      // So ban ghi > 0 thi hien thi du lieu
                      if ($count > 0) {
                        while ($rows = mysqli_fetch_assoc($res)) {
                          // Lay ra cac truong du lieu
                          $cart_id = $rows['id'];
                          $pid = $rows['product_id'];
                          $quantity = $rows['quantity'];
                          $total_money = $rows['total_money'];
                          // Tinh tong hoa don hien tai
                          $total_bill += $total_money;
                          $category_name = $rows['c_name'];
                          $product_title = $rows['p_title'];
                          $product_price = $rows['p_price'];
                          $product_discount = $rows['p_discount'];
                          $currentPrice = $product_price - ($product_price * (($product_discount / 100)));
                          $product_thumbnail = $rows['p_thumbnail']; ?>
                          <div class="box-item-cart" key="<?= $cart_id; ?>">
                            <!-- Item cart -->
                            <hr class="my-4">

                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                              <div class="col-md-2 col-lg-2 col-xl-2">
                                <img src="<?= SITEURL; ?>images/food/<?= $product_thumbnail; ?>" class="img-fluid rounded-3" alt="<?= $product_title; ?>">
                              </div>
                              <div class="col-md-3 col-lg-3 col-xl-3">
                                <h6 class="text-muted"><?= $category_name; ?></h6>
                                <h6 class="text-black mb-0"><?= $product_title; ?></h6>
                              </div>
                              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <!-- <button class="btn btn-link px-2 change-quantity" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                  <i class="fas fa-minus"></i>
                                </button> -->

                                <input min="1" max="30" id="<?= $pid; ?>" onchange="updateQuantity(this,<?= $cart_id; ?>,<?= $currentPrice; ?>);" name="quantity" value="<?= $quantity; ?>" type="number" class="form-control form-control-sm quantity" />

                                <!-- <button class="btn btn-link px-2 change-quantity" 
                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                  <i class="fas fa-plus"></i>
                                </button> -->
                              </div>
                              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h6 class="mb-0 price total_product_money"><?= $total_money; ?></h6>
                              </div>
                              <div class="col-md-1 col-lg-1 col-xl-1 text-center text-lg-end">
                                <a href="<?= SITEURL; ?>admin/controllers/cart/delete.php?id=<?= $uid; ?>&cart_id=<?= $cart_id; ?>" class="text-muted"><i class="fas fa-times"></i></a>
                              </div>
                            </div>
                            <!-- End Item cart -->
                          </div>

                      <?php }
                      } else {
                        echo "<h1 class='justify-content-between'>Không có dữ liệu</h1>";
                      }
                      ?>
                    </div>
                    <hr class="my-4">

                    <div class="pt-1">
                      <h6 class="mb-0"><a href="<?= SITEURL; ?>" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Trang chủ</a></h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 bg-grey">
                  <div class="p-5">
                    <form action="./admin/controllers/order/add.php" method="post">
                      <h3 class="fw-bold mb-4 mt-2 pt-1">Thông tin nhận hàng</h3>
                      <!-- Field -->
                      <!-- <h5 class="text-uppercase mb-1">Họ tên</h5> -->

                      <div class="mb-3">
                        <div class="form-outline">
                          <input type="text" id="fullname" name="fullname" value="<?= $_SESSION['fullname']; ?>" class="form-control form-control-lg" require />
                          <label class="form-label" for="form3Examplea2">Họ tên</label>
                        </div>
                      </div>
                      <!-- End Field -->
                      <!-- Field -->
                      <!-- <h5 class="text-uppercase mb-1">Số điện thoại</h5> -->

                      <div class="mb-3">
                        <div class="form-outline">
                          <input type="tel" id="phone_number" name="phone_number" value="<?= $_SESSION['phone_number']; ?>" class="form-control form-control-lg" require />
                          <label class="form-label" for="form3Examplea2">Số điện thoại</label>
                        </div>
                      </div>
                      <!-- End Field -->
                      <!-- Field -->
                      <!-- <h5 class="text-uppercase mb-1">Email</h5> -->

                      <div class="mb-3">
                        <div class="form-outline">
                          <input type="email" id="email" name="email" value="<?= $_SESSION['email']; ?>" class="form-control form-control-lg" require />
                          <label class="form-label" for="form3Examplea2">Email</label>
                        </div>
                      </div>
                      <!-- End Field -->
                      <!-- Field -->
                      <!-- <h5 class="text-uppercase mb-1">Địa chỉ nhận hàng</h5> -->

                      <div class="mb-3">
                        <div class="form-outline">
                          <input type="text" id="address" name="address" value="<?= $_SESSION['address']; ?>" class="form-control form-control-lg" require />
                          <label class="form-label" for="form3Examplea2">Địa chỉ nhận hàng</label>
                        </div>
                      </div>
                      <!-- End Field -->
                      <!-- Field -->
                      <!-- <h5 class="text-uppercase mb-1">Ghi chú</h5>   -->

                      <div class="mb-3">
                        <div class="form-outline">
                          <input type="text" id="note" name="note" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Examplea2">Ghi chú</label>
                        </div>
                      </div>
                      <!-- End Field -->

                      <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">Tổng tiền</h5>
                        <h5 class="price total_bill"><?= $total_bill ?></h5>
                        <input type="text" id="total_bill" name="total_bill" value="<?= $total_bill ?>" class="form-control form-control-lg" hidden/>
                      </div>

                      <button type="submit" name="submit" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Đặt hàng</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="./js/mdb.min.js"></script>
  <!-- Custom scripts -->
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

    function updateQuantity(inputElement, cart_id, price) {
      // Lấy ra thẻ cha
      const parentElement = document.querySelector('.box-item-cart[key="' + cart_id + '"]');
      // lấy ra input
      const quantityElement = parentElement.querySelector('.quantity');
      // Lấy ra thẻ price
      const priceElement = parentElement.querySelector('.price');
      // Giá trị của 1 sản phẩm
      price = parseInt(price);
      // CHuyen chuoi thanh so
      const quantity = parseInt(quantityElement.value);
      // Kiểm tra xem có phải là số không
      if (isNaN(quantity)) {
        return 0;
      }

      var totalPriceProduct = quantity * price;
      quantityElement.value = quantity;
      priceElement.textContent = formatMoney(totalPriceProduct);

      // Xử lý gửi thông tin cập nhật giỏ hàng trong db
      var xhr = new XMLHttpRequest();
      var url = './admin/controllers/cart/update.php';
      var params = 'productId=' + inputElement.id + '&quantity=' + inputElement.value + '&currentPrice=' + price;

      xhr.open('POST', url, true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // Xử lý phản hồi từ máy chủ nếu cần
            console.log(xhr.responseText);
          } else {
            // Xử lý lỗi nếu có
            console.error('Error:', xhr.status);
          }
        }
      };

      xhr.send(params);

      updateTotalBill();
    }

    function updateTotalBill() {
      // Lay input total bill
      const inputTotalBillEement = document.getElementById('total_bill');
      // Lấy ra thẻ cha
      const totalBillEement = document.querySelector('.total_bill');
      
      var totalBill = 0;
      const totalProductMoneyElements = document.querySelectorAll('.total_product_money');
      totalProductMoneyElements.forEach((item) => {
        var totalPriceProduct = moneyToNumber(item.textContent);
        totalBill += totalPriceProduct;
      })
      totalBillEement.textContent = formatMoney(totalBill);
      inputTotalBillEement.value = totalBill;
      return totalBill;
    }

    var getPriceElements = document.querySelectorAll(".price");
    getPriceElements.forEach((item) => {
      item.textContent = formatMoney(item.textContent);
    })
  </script>
</body>

</html>