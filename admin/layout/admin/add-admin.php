<?php include('../../partials/menu.php');
    if(isset($_GET['setRole'])){
        $roleId = $_GET['setRole'];
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Thêm <?= (isset($roleId) == 2) ? 'User' : 'Admin' ?></h1>

        <?php 
            if(isset($_SESSION['noti'])){
                echo $_SESSION['noti'];
                unset($_SESSION['noti']);
            }
        ?>

        <form class="mt-16" action="<?= SITEURL; ?>admin/controllers/admin/addAdmin.php<?= (isset($_GET['setRole'])) ? ('?setRole='.$roleId) : '' ?>" method="POST">
            <div class="field">
                <label for="fullname">Họ tên</label>
                <input type="text" placeholder="Họ tên" name="fullname" id="fullname" require>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input type="email" placeholder="Email" name="email" id="email" require>
            </div>
            <div class="field">
                <label for="password">Mật khẩu</label>
                <input type="password" placeholder="Mật khẩu" name="password" id="password" require>
            </div>
            <div class="field">
                <label for="phone_number">Số điện thoại</label>
                <input type="text" placeholder="Số điện thoại" name="phone_number" id="phone_number" require>
            </div>
            <div class="field">
                <label for="address">Địa chỉ</label>
                <input type="text" placeholder="Địa chỉ" name="address" id="address" require>
            </div>
            <input class="btn btn-primary" type="submit" name="btnSubmit" value="Thêm">
        </form>
    </div>
</div>

<?php include('../../partials/footer.php') ?>
