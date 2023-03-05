<section class="content">
    <div class="container-fluid">
        <?php if ($fetch['rule'] != 'admin') { ?>
            <div class="row" style="margin-left: -10px;">
                <div class="prof-image col-lg-3 col-sm-12 col-6 text-center">
                    <img src="dist/img/user_icon1.png" alt="" style="width: 80%;height: auto;border-radius:5px;padding:5px;margin: auto;">

                    <p class="text-center"><?php echo  $user_role . ': ' . $fetch['name']; ?></p>
                    <p class="text-center">
                        <?php if ($fetch['rule'] == 'manager') {
                            echo 'الصلاحية: مشرف';
                        }
                        if ($fetch['rule'] == 'data_entry') {
                            echo 'الصلاحية: مدخل بيانات';
                        }
                        ?></p>
                </div>
                <div class="col-lg-9 col-12" style="border-radius:10px; padding:5px;">
                    <div class="row" style="margin-left:0;">
                        <?php
                        $query = "SELECT * FROM sections";
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        $c = 1;
                        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                            if ($row['id'] == 6) { ?>
                                <div class="col-lg-4 col-sm-6 col-6">
                                    <div class="small-box" style="background-color: #<?php echo $row['sub_bg']; ?>;color:#<?php echo $row['font_color']; ?>">
                                        <div class="inner text-center w-75">
                                            <h3><?php echo "0" . $c; ?><sup style="font-size: 20px"></sup></h3>
                                            <p><?php echo $row['sub_name']; ?></p>
                                        </div>
                                        <div class="icon w-25">
                                            <i class="<?php echo $row['sub_icon']; ?>"></i>
                                        </div>
                                        <?php if (($fetch['rule'] == 'manager')) { ?> <a href="needs.php" class="small-box-footer" style="color: #<?php echo $row['font_color']; ?>;">التفاصيل<i class="fas fa-arrow-circle-left ml-2"></i></a><?php } else { ?> <a href="metrics.php?t=<?php echo $fetch['id']; ?>&sub=<?php echo $row['id']; ?>" class="small-box-footer" style="color: #<?php echo $row['font_color']; ?>;">مهام <?php echo $row['sub_name']; ?> <i class="fas fa-arrow-circle-left ml-2"></i></a><?php } ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-lg-4 col-sm-6 col-6">
                                    <div class="small-box" style="background-color: #<?php echo $row['sub_bg']; ?>;color:#<?php echo $row['font_color']; ?>">
                                        <div class="inner text-center w-75">
                                            <h3><?php echo "0" . $c; ?><sup style="font-size: 20px"></sup></h3>
                                            <p><?php echo $row['sub_name']; ?></p>
                                        </div>
                                        <div class="icon w-25">
                                            <i class="<?php echo $row['sub_icon']; ?>"></i>
                                        </div>
                                        <?php if (($fetch['rule'] == 'manager')) { ?> <a href="teach.php" class="small-box-footer" style="color: #<?php echo $row['font_color']; ?>;">التفاصيل<i class="fas fa-arrow-circle-left ml-2"></i></a><?php } else { ?> <a href="subject.php?t=<?php echo $fetch['id']; ?>&sub=<?php echo $row['id']; ?>" class="small-box-footer" style="color: #<?php echo $row['font_color']; ?>;">مهام <?php echo $row['sub_name']; ?> <i class="fas fa-arrow-circle-left ml-2"></i></a><?php } ?>
                                    </div>
                                </div>
                            <?php }
                            ?>

                        <?php
                            $c += 1;
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>