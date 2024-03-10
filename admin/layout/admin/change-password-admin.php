<?php include('../../partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Đổi mật khẩu</h1>

        <?php 
            if(isset($_SESSION['noti'])){
                echo $_SESSION['noti'];
                unset($_SESSION['noti']);
            }
        ?>

        <form class="mt-16" action="<?= SITEURL; ?>admin/controllers/admin/changePasswordAdmin.php?id=<?php echo $_GET['id'];?>" method="POST">
            <div class="field">
                <label for="password">Mật khẩu cũ:</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
            </div>
            <div class="field">
                <label for="newPassword">Mật khẩu mới:</label>
                <input type="password" id="newPassword" name="newPassword" placeholder="Nhập mật khẩu mới">
            </div>
            <div class="field">
                <label for="confirmPassword">Xác nhận mật khẩu:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Xác nhận mật khẩu">
            </div>
            <input class="btn btn-primary" type="submit" name="btnSubmit" value="Đổi mật khẩu">
        </form>
    </div>
</div>

<?php include('../../partials/footer.php') ?>
