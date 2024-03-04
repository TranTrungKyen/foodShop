<?php include('../../partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <?php
        if (isset($_SESSION['noti'])) {
            $_SESSION['noti'];
            echo $_SESSION['noti'];
            unset($_SESSION['noti']);
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // Lay ra admin co id muon sua
            $sql = "SELECT * from user WHERE id='$id'";
            // Thuc hien truy van
            $res =  excuteResult($sql);
            if ($res == TRUE) {
                $count = mysqli_num_rows($res);
                if ($count == 1) {
                    $rows = $res->fetch_assoc();
                    $fullname = $rows['fullname'];
                    $email = $rows['email'];
                    $phoneNumber = $rows['phone_number'];
                    $address = $rows['address'];
                }
            }
        }
        ?>

        <form class="mt-16" action="<?= SITEURL; ?>admin/controllers/admin/updateAdmin.php?id=<?= $id; ?><?= (isset($_GET['setRole'])) ? ('&setRole='.$_GET['setRole']) : '' ?>" method="POST">
            <div class="field">
                <label for="fullname">Full name</label>
                <input type="text" placeholder="Full name" name="fullname" id="fullname" value="<?= $fullname; ?>" require>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input type="email" placeholder="Email" name="email" id="email" value="<?= $email; ?>" require>
            </div>
            <div class="field">
                <label for="phone_number">Phone number</label>
                <input type="text" placeholder="Phone number" name="phone_number" value="<?= $phoneNumber; ?>" id="phone_number" require>
            </div>
            <div class="field">
                <label for="address">Address</label>
                <input type="text" placeholder="Address" name="address" value="<?= $address; ?>" id="address" require>
            </div>
            <input class="btn btn-primary" type="submit" name="submit">
        </form>
    </div>
</div>

<?php include('../../partials/footer.php') ?>