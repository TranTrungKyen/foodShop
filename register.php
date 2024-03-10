<?php session_start(); ?>
<html>
<head>
    <title>Đăng ký</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/login-register.css">
    <style>

    </style>
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="./admin/controllers/admin/addAdmin.php?setRole=2" method="POST">
        <h1>KFOOD</h1>
        <?php 
            if(isset($_SESSION['noti'])){
                echo $_SESSION['noti'];
                unset($_SESSION['noti']);
            }
        ?>
        <div class="form-content">
            <div class="field">
                <label for="fullname">Họ tên</label>
                <input type="text" placeholder="Full name" name="fullname" id="fullname" require>
            </div>
            <div class="field">
                <label for="phone_number">Số điện thoại</label>
                <input type="tel" placeholder="Phone number" name="phone_number" id="phone_number" require>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input type="email" placeholder="Email" name="email" id="email" require>
            </div>
            <div class="field">
                <label for="address">Địa chỉ</label>
                <input type="text" placeholder="Address" name="address" id="address" require>
            </div>
            <div class="field">
                <label for="password">Mật khẩu</label>
                <input type="password" placeholder="Password" name="password" id="password" require>
            </div>
        </div>
        <button name="btnSubmit">Đăng ký</button>
        <div class="social">
            <div class="go"><i class="fab fa-google"></i> Google</div>
            <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>
        <div class="extends">
            <p>Bạn đã có tài khoản?</p><a href="login.php">Đăng nhập</a>
        </div>
    </form>
</body>

</html>