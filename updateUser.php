<?php include('./partials-front/header.php'); ?>

<?php
if (isset($_SESSION['noti'])) {
    echo $_SESSION['noti'];
    unset($_SESSION['noti']);
}
if (isset($_SESSION['id'])) {
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
                <h2 class="mt-16">Cập nhật thông tin</h2>
                <form action="<?= SITEURL; ?>admin/controllers/admin/updateAdmin.php?id=<?= $uid; ?>" method="post">
                    <div class="info">
                        <div class="row mt-16">
                            <label for="fullname" class="col w-16">
                                <p class="info-desc">Họ tên:</p>
                            </label>
                            <input type="text" id="fullname" class="col info-desc" name="fullname" value="<?= $fullname; ?>">
                        </div>
                        <div class="row mt-16">
                            <label for="email" class="col w-16">
                                <p class="info-desc">Email:</p>
                            </label>
                            <input type="email" id="email" class="col info-desc" name="email" value="<?= $email; ?>">
                        </div>
                        <div class="row mt-16">
                            <label for="phone_number" class="col w-16">
                                <p class="info-desc">Số điện thoại:</p>
                            </label>
                            <input type="text" id="phone_number" class="col info-desc" name="phone_number" value="<?= $phone_number; ?>">
                        </div>
                        <div class="row mt-16">
                            <label for="address" class="col w-16">
                                <p class="info-desc">Địa chỉ:</p>
                            </label>
                            <input type="text" id="address" class="col info-desc" name="address" value="<?= $address; ?>">
                        </div>
                        <div class="row mt-16">
                            <button type="submit" name="submit" class="btn btn-green">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php include('./partials-front/footer.php') ?>