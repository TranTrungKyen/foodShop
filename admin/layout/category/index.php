<?php include('../../partials/menu.php'); ?>

<!-- Main Content Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <?php
        if (isset($_SESSION['noti'])) {
            echo $_SESSION['noti'];
            unset($_SESSION['noti']);
        }
        ?>
        <div class="d-flex justify-space mt-16">
            <a href="./add-category.php" class="btn btn-primary">Add category</a>
            <form action="<?= SITEURL; ?>admin/controllers/category/search.php" method="POST" class="search-box">
                <button class="btn-search" name="btnSearch"><i class="fas fa-search"></i></button>
                <input type="text" class="input-search" name="search" placeholder="Type to Search...">
            </form>
        </div>

        <?php
        $sql = "";
        if (isset($_SESSION['sql']) && !empty($_SESSION['sql'])) {
            $sql = $_SESSION['sql'];
        } else {
            $sql = "SELECT * FROM category";
        }
        $res = excuteResult($sql);
        if ($res == TRUE) {
            // Khoi tai so thu tu cho category
            $sn = 1;

            // Kiem tra so ban ghi trong db
            $count = mysqli_num_rows($res);
            if ($count > 0) {
        ?>

                <table class="tbl-full mt-16">
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    while ($rows = $res->fetch_assoc()) {
                        $name = $rows['name'];
                        $thumbnail = $rows['thumbnail'];
                        $id = $rows['id'];
                    ?>
                        <tr>
                            <td><?= $sn++ ?></td>
                            <td><?= $name ?></td>
                            <td>
                                <?php if (!empty($thumbnail)) { ?>
                                    <img src="<?= SITEURL . "images/category/" . $thumbnail ?>" alt="<?= $thumbnail ?>" height="80px">
                                <?php } else { ?>
                                    <p class="error" style="line-height: 100px;">Null</p>
                                <?php } ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="./update-category.php?id=<?= $id; ?>" class="btn btn-secondary">Update</a>
                                    <a href="./delete-category.php?id=<?= $id; ?>" class="btn btn-danger">Delete</a>
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
            if(!empty($_SESSION['sql'])){
                unset($_SESSION['sql']);
            }
            ?>

    </div>
</div>
<!-- Main Content End -->

<?php include('../../partials/footer.php') ?>