<?php include('../../partials/menu.php');
    if(isset($_GET['setRole'])){
        $roleId = $_GET['setRole'];
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add <?= (isset($roleId) == 2) ? 'User' : 'Admin' ?></h1>

        <?php 
            if(isset($_SESSION['noti'])){
                echo $_SESSION['noti'];
                unset($_SESSION['noti']);
            }
        ?>

        <form class="mt-16" action="<?= SITEURL; ?>admin/controllers/admin/addAdmin.php<?= (isset($_GET['setRole'])) ? ('?setRole='.$roleId) : '' ?>" method="POST">
            <div class="field">
                <label for="fullname">Full name</label>
                <input type="text" placeholder="Full name" name="fullname" id="fullname" require>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input type="email" placeholder="Email" name="email" id="email" require>
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input type="password" placeholder="Password" name="password" id="password" require>
            </div>
            <div class="field">
                <label for="phone_number">Phone number</label>
                <input type="text" placeholder="Phone number" name="phone_number" id="phone_number" require>
            </div>
            <div class="field">
                <label for="address">Address</label>
                <input type="text" placeholder="Address" name="address" id="address" require>
            </div>
            <input class="btn btn-primary" type="submit" name="btnSubmit">
        </form>
    </div>
</div>

<?php include('../../partials/footer.php') ?>
