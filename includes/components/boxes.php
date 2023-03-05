<section class="content">
    <div class="container-fluid">
        <div class="row" style="margin-left: -10px;  margin-right: -5px;">
            <div class="col-lg-12 col-12" style="border-radius:10px; padding:5px;">
                <div class="row" style="justify-content: center; margin-left: -10px;">
                    <div class="col-lg-12 col-sm-6 col-6">
                        <?php
                        $sub_id = $_GET['sub'];
                        $sub = mysqli_query($conn, "SELECT * FROM `subjects` WHERE id = '$sub_id'") or die('query failed');
                        if (mysqli_num_rows($sub) > 0) {
                            $fetch_sub = mysqli_fetch_assoc($sub);
                        } ?>
                        <div class="small-box" style="background-color: #<?php echo $fetch_sub['sub_bg']; ?>;color:#<?php echo $fetch_sub['font_color']; ?>">
                            <div class="inner text-center w-100">
                                <button class="btn btn-danger btn-sm float-left" style="font-size: 0.9rem;line-height: 1rem;" onclick="history.back()">العودة للخلف</button>
                                <h3 style="display: inline;font-size: 24px !important;font-weight:300; padding:0; margin-bottom:0">
                                    <?php echo $fetch_sub['sub_name']; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if ($fetch_sub['sub_name'] == 'دولية معيارية') {
                    echo '';
                } elseif ($fetch_sub['sub_name'] == 'دولية مهارية') {
                    echo '';
                } else {
                ?>
                    <div class="row" style="margin-left: -10px;">
                        <div class="col-lg-3 col-sm-6 col-6">
                            <div class="small-box" style="background-color: #65c7d0;color:#2a3f54">
                                <div class="inner text-center w-75">
                                    <h3 style="font-size: 18px !important; font-weight:300;padding-top:15px;">الواجبات<sup style="font-size: 14px !important"></sup></h3>
                                </div>
                                <div class="icon w-25" style="padding-bottom: 5px;">
                                    <i class="fas fa-tasks text-dark"></i>
                                </div>
                                <a href="exams.php?sub=<?php echo $fetch_sub['id']; ?>&type=1" class="small-box-footer"><i class="fas fa-arrow-circle-left ml-2"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-6">
                            <div class="small-box" style="background-color: #038995;color:#fff">
                                <div class="inner text-center w-75">
                                    <h3 style="font-size: 18px !important; font-weight:300;padding-top:15px;">التدريبات<sup style="font-size: 14px !important;"></sup></h3>
                                </div>
                                <div class="icon w-25" style="padding-bottom: 5px;">
                                    <i class="fas fa-street-view text-white"></i>
                                </div>
                                <a href="exams.php?sub=<?php echo $fetch_sub['id']; ?>&type=2" class="small-box-footer"><i class="fas fa-arrow-circle-left ml-2"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-6">
                            <div class="small-box" style="background-color: #f7921e;color:#2a3f54">
                                <div class="inner text-center w-75">
                                    <h3 style="font-size: 18px !important; font-weight:300;padding-top:15px;">الأنشطة<sup style="font-size: 14px !important;"></sup></h3>
                                </div>
                                <div class="icon w-25" style="padding-bottom: 5px;">
                                    <i class="fas fa-star text-dark"></i>
                                </div>
                                <a href="exams.php?sub=<?php echo $fetch_sub['id']; ?>&type=3" class="small-box-footer"><i class="fas fa-arrow-circle-left ml-2"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-6">
                            <div class="small-box" style="background-color: #ef4b28;color:#fff">
                                <div class="inner text-center w-75">
                                    <h3 style="font-size: 18px !important; font-weight:300;padding-top:15px;">الاختبارات<sup></sup></h3>
                                </div>
                                <div class="icon w-25" style="padding-bottom: 5px;">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                                <a href="exams.php?sub=<?php echo $fetch_sub['id']; ?>&type=4" class="small-box-footer"><i class="fas fa-arrow-circle-left ml-2"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-6">
                            <div class="small-box" style="background-color: #a4c92c;color:#2a3f54">
                                <div class="inner text-center w-75">
                                    <h3 style="font-size: 18px !important; font-weight:300;padding-top:15px;">المهارات<sup style="font-size: 14px !important;"></sup></h3>
                                </div>
                                <div class="icon w-25" style="padding-bottom: 5px;">
                                    <i class="fas fa-graduation-cap text-dark"></i>
                                </div>
                                <a href="exams.php?sub=<?php echo $fetch_sub['id']; ?>&type=5" class="small-box-footer"><i class="fas fa-arrow-circle-left ml-2"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-6">
                            <div class="small-box" style="background-color: #ac9a76;color:#fff">
                                <div class="inner text-center w-75">
                                    <h3 style="font-size: 18px !important; font-weight:300;padding-top:15px;">تحليل النتائج<sup style="font-size: 14px !important;"></sup></h3>
                                </div>
                                <div class="icon w-25" style="padding-bottom: 5px;">
                                    <i class="fas fa-chart-bar text-white"></i>
                                </div>
                                <a href="analysis.php?t=<?php echo $user_id; ?>&sub=<?php echo $fetch_sub['id']; ?>&class=<?php echo $fetch['class_id']; ?>" class="small-box-footer"><i class="fas fa-arrow-circle-left ml-2"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
            </div>
        </div>
    </div>
</section>