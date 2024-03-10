<?php include('../../partials/menu.php'); ?>


<!-- Main Content Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Quản lý admin</h1>

        <?php
        if (isset($_SESSION['noti'])) {
            echo $_SESSION['noti'];
            unset($_SESSION['noti']);
        }
        ?>
        <div class="d-flex justify-space mt-16">
            <a href="<?= SITEURL; ?>admin/layout/admin/add-admin.php" class="btn btn-primary">Thêm admin</a>
            <form action="<?= SITEURL; ?>admin/controllers/admin/searchAdmin.php" method="POST" class="search-box">
                <button class="btn-search" name="btnSearch"><i class="fas fa-search"></i></button>
                <input type="text" class="input-search" name="search" placeholder="Tìm kiếm...">
            </form>
        </div>

        <?php
        $sql = "";
        if (isset($_SESSION['sql']) && !empty($_SESSION['sql'])) {
            $sql = $_SESSION['sql'];
        } else {
            $sql = "SELECT * FROM user WHERE role_id = '1' AND deleted ='0'";
        }
        $res = excuteResult($sql);
        if ($res == TRUE) {
            // Khoi tai so thu tu cho admin
            $sn = 1;

            // Kiem tra so ban ghi trong db
            $count = mysqli_num_rows($res);
            if ($count > 0) {
        ?>

                <table class="tbl-full mt-16">
                    <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Hành động</th>
                    </tr>
                    <?php
                    while ($rows = $res->fetch_assoc()) {
                        $fullname = $rows['fullname'];
                        $email = $rows['email'];
                        $phoneNumber = $rows['phone_number'];
                        $address = $rows['address'];
                        $id = $rows['id'];
                    ?>
                        <tr>
                            <td><?= $sn++ ?></td>
                            <td><?= $fullname ?></td>
                            <td><?= $email ?></td>
                            <td><?= $phoneNumber ?></td>
                            <td><?= $address ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?= SITEURL; ?>admin/layout/admin/update-admin.php?id=<?= $id ?>" class="btn btn-secondary">Cập nhật</a>
                                    <a href="<?= SITEURL; ?>admin/layout/admin/delete-admin.php?id=<?= $id ?>" class="btn btn-danger">Xóa</a>
                                    <a href="<?= SITEURL; ?>admin/layout/admin/change-password-admin.php?id=<?= $id ?>" class="btn btn-primary">Đổi mật khẩu</a>
                                </div>
                            </td>
                        </tr>
            <?php
                    }
                    echo "</table>";
                } else {
                    echo "<h1 class='mt-16'>Không có dữ liệu</h1>";
                }
            } else {
                echo "<h1 class='mt-16'>Lỗi truy vấn!</h1>";
            }
            if (!empty($_SESSION['sql'])) {
                unset($_SESSION['sql']);
            }
            ?>

    </div>
</div>
<!-- Main Content End -->

<?php include('../../partials/footer.php') ?>