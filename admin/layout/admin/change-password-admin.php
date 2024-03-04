<?php include('../../partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change password Admin</h1>

        <?php 
            if(isset($_SESSION['noti'])){
                echo $_SESSION['noti'];
                unset($_SESSION['noti']);
            }
        ?>

        <form class="mt-16" action="<?= SITEURL; ?>admin/controllers/admin/changePasswordAdmin.php?id=<?php echo $_GET['id'];?>" method="POST">
            <div class="field">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter password">
            </div>
            <div class="field">
                <label for="newPassword">New password:</label>
                <input type="password" id="newPassword" name="newPassword" placeholder="Enter new password">
            </div>
            <div class="field">
                <label for="confirmPassword">Confirm password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Enter confirm password">
            </div>
            <input class="btn btn-primary" type="submit" name="btnSubmit">
        </form>
    </div>
</div>

<?php include('../../partials/footer.php') ?>
