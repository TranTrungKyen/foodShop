<?php include('./partials-front/header.php'); ?>

<?php
if (isset($_SESSION['noti'])) {
    echo $_SESSION['noti'];
    unset($_SESSION['noti']);
}
if (!empty($_SESSION['id'])) {
    $uid = $_SESSION['id'];
    $role_id = $_SESSION['role_id'];
    $fullname = $_SESSION['fullname'];
    $email = $_SESSION['email'];
    $phone_number = $_SESSION['phone_number'];
    $address = $_SESSION['address'];
}
?>

<section class="info-user">
    <div class="container">
        <div class="row">
            <div class="col c-12">
                <h2 class="mt-16">Thông tin cá nhân</h2>
                <div class="info">
                    <div class="row mt-16">
                        <div class="col w-16"><p class="info-desc">Họ tên:</p></div>
                        <div class="col"><p class="info-desc"><?= $fullname; ?></p></div>
                    </div>
                    <div class="row mt-16">
                        <div class="col w-16"><p class="info-desc">Email:</p></div>
                        <div class="col"><p class="info-desc"><?= $email; ?></p></div>
                    </div>
                    <div class="row mt-16">
                        <div class="col w-16"><p class="info-desc">Số điện thoại:</p></div>
                        <div class="col"><p class="info-desc"><?= $phone_number; ?></p></div>
                    </div>
                    <div class="row mt-16">
                        <div class="col w-16"><p class="info-desc">Địa chỉ:</p></div>
                        <div class="col"><p class="info-desc"><?= $address; ?></p></div>
                    </div>
                    <div class="row mt-16">
                        <?php if ($role_id != 1) { ?>
                            <a href="<?= SITEURL; ?>changePasswordUser.php" style="margin-right: 16px;" class="col btn btn-primary mr-16">Thay đổi mật khẩu</a>
                            <a href="<?= SITEURL; ?>updateUser.php" class="col btn btn-primary">Thay đổi thông tin cá nhân</a>
                        <?php } else { ?>
                            <a href="<?= SITEURL; ?>admin" class="col btn btn-primary">Chuyển sang trang quản trị</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include('./partials-front/footer.php') ?>