<section class="content">
    <div class="container-fluid">
        <div class="row" style="margin-left: -10px;  margin-right: -5px;">
            <div class="col-lg-12 col-12" style="border-radius:10px; padding:5px;">
                <div class="row" style="justify-content: center; margin-left: -10px;">
                    <div class="col-lg-12 col-sm-6 col-6">
                        <?php


                        $sub = mysqli_query($conn, "SELECT * FROM `subjects` WHERE id = '$sub_id'") or die('لم ينجح الوصول للبيانات');
                        if (mysqli_num_rows($sub) > 0) {
                            $fetch_sub = mysqli_fetch_assoc($sub);
                        } ?>
                        <div class="small-box" style="background-color: #<?php echo $fetch_sub['sub_bg']; ?>;color:#<?php echo $fetch_sub['font_color']; ?>">
                            <div class="inner text-center w-100">
                                <button class="btn btn-danger btn-sm float-left" style="font-size: 0.9rem;line-height: 1rem;" onclick="history.back()">العودة للخلف</button>
                                <h3 style="font-size: 24px !important;font-weight:300; padding:0; margin-bottom:0">
                                    <?php echo $s_n; ?> - <?php echo $t_n; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if ($sub_id == 5 || $sub_id == 6) {
                    echo '';
                }
                ?>
            </div>
        </div>
    </div>
</section>