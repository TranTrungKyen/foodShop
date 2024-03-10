<?php include('./partials-front/header.php'); ?>


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">DANH MỤC SẢN PHẨM</h2>

            <?php
        // Viet cau lenh truy van 
        $sql = "SELECT * FROM category WHERE deleted ='0'";
        // Thuc thi truy van
        $res = excuteResult($sql);
        // Dem so ban ghi
        $count = mysqli_num_rows($res);
        // So ban ghi > 0 thi hien thi du lieu
        if ($count > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {
                // Lay ra cac truong du lieu
                $cid = $rows['id'];
                $name = $rows['name'];
                $thumbnail = $rows['thumbnail']; ?>
                <a href="<?= SITEURL; ?>category-foods.php?cid=<?= $cid; ?>">
                    <div class="box-3 float-container">
                        <!-- Neu co image thi hien thi -->
                        <?php if (!empty($thumbnail)) { ?>
                            <img src="<?= SITEURL; ?>images/category/<?= $thumbnail; ?>" alt="<?= $name; ?>" class="img-responsive img-curve">
                            <h3 class="float-text text-white"><?= $name; ?></h3>
                            <!-- Neu khong co anh -->
                        <?php } else { ?>
                            <h3 class="float-text text-primary">Image Null</h3>
                        <?php } ?>
                    </div>
                </a>

        <?php
            }
        }

        ?>
        <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <?php include('./partials-front/footer.php') ?>
