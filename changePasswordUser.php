<?php include('./partials-front/header.php'); ?>

<?php
if (isset($_SESSION['noti'])) {
    echo $_SESSION['noti'];
    unset($_SESSION['noti']);
}
if (isset($_SESSION['id'])) {
    $uid = $_SESSION['id'];
    $role_id = $_SESSION['role_id'];
}
?>

<section class="info-user">
    <div class="container">
        <div class="row">
            <div class="col c-12">
                <h2 class="mt-16">Thay đổi mật khẩu</h2>
                <form action="<?= SITEURL; ?>admin/controllers/admin/changePasswordAdmin.php?id=<?= $uid; ?>" method="post">
                    <div class="info">
                        <div class="row mt-16">
                            <label for="password" class="col w-16">
                                <p class="info-desc">Mật khẩu:</p>
                            </label>
                            <input type="password" id="password" class="col info-desc" name="password">
                        </div>
                        <div class="row mt-16">
                            <label for="newPassword" class="col w-16">
                                <p class="info-desc">Mật khẩu mới:</p>
                            </label>
                            <input type="password" id="newPassword" class="col info-desc" name="newPassword">
                        </div>
                        <div class="row mt-16">
                            <label for="confirmPassword" class="col w-16">
                                <p class="info-desc">Xác nhận:</p>
                            </label>
                            <input type="password" id="confirmPassword" class="col info-desc" name="confirmPassword">
                        </div>
                        <div class="row mt-16">
                            <button type="submit" name="btnSubmit" class="btn btn-green">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php include('./partials-front/footer.php') ?>