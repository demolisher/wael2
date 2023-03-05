<?php
require 'config.php';
?>

<!-- Teachers Table -->
<section class="content  mt-2">
    <div class="row" style="margin-right: 0;margin-left: -5px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                    <h3 class="card-title" style="float: right !important">معلومات الاحتياج</h3>
                    <a class="btn btn-primary btn-sm m-2" href="need_report.php?n=<?php echo $need_id;?>" style="float: left !important;font-size:0.8rem; padding:5px 10px">تقرير احتياجات المرحلة والمقارنة</a>
                    <a class="btn btn-warning btn-sm m-2" href="classes.php?n=<?php echo $need_id; ?>" style="float: left !important;font-size:0.8rem; padding:5px 10px">الرجوع إلى قائمة الصفوف</a>

                    </div>
                    
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>المجمع التعليمي</td>
                            <td><?php echo $sl_need['compound']; ?></td>
                        </tr>
                        <tr>
                            <td>المسار التعليمي</td>
                            <td><?php echo $sl_need['path']; ?></td>
                        </tr>
                        <tr>
                            <td>المرحلة التعليمية</td>
                            <td><?php echo $sl_need['level']; ?></td>
                        </tr>
                        <tr>
                            <td>النوع</td>
                            <td><?php echo $sl_need['gender']; ?></td>
                        </tr>
                        <tr>
                            <td>النصاب</td>
                            <td><?php echo $sl_need['comple']; ?></td>
                        </tr>
                        <tr>
                            <td>كود الاحتياج</td>
                            <td><?php echo $sl_need['need_code']; ?></td>
                        </tr>
                    </table>
                    

                </div>

                <div class="card-body">
                    <div class="text-center">
                    <?php
                                $class_query = "SELECT * FROM classes where level='$chosen_level'";
                                $class_query_run = mysqli_query($conn, $class_query);
                                if (mysqli_num_rows($class_query_run) > 0) {
                                    foreach ($class_query_run as $class) {
                                ?>
                                        <h3 class="text-center">احتياجات <?php echo $class['class'] ?></h3><br>
                                        <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th style="width:35%">المادة</th>
                                <th style="width:15%">عدد الحصص</th>
                                <th style="width:20%">عدد الصفوف</th>
                                <th style="width:15%">المجموع</th>
                                <th style="width:15%">اللازم</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $c_id=$class['id'];
                            $sub_query = "SELECT * FROM subject_need where n_code = '$need_id' AND c_code='$c_id'";
                            $sub_query_run = mysqli_query($conn, $sub_query);
                            if (mysqli_num_rows($sub_query_run) > 0) {
                                foreach ($sub_query_run as $sub) {
                            ?>
                                    <tr>
                                        <td><?= $sub['subject'] ?></td>
                                        <td><?= $sub['l_number'] ?></td>
                                        <td><?= $sub['c_number'] ?></td>
                                        <td><?= $sub['total_no'] ?></td>
                                        <td><?= $sub['need_no'] ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        <tr>
                            <td style="font-weight: bolder; font-size:1.2rem">المجموع</td>
                            <td>
                            <?php
                            $sql = "select sum(l_number) from subject_need where n_code = '$need_id' AND c_code='$c_id'";
                            $q = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_array($q);
                            echo $row[0];
                            ?>
                            </td>
                            <td>
                            <?php
                            $sql = "select max(c_number) from subject_need where n_code = '$need_id' AND c_code='$c_id'";
                            $q = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_array($q);
                            echo $row[0];
                            ?>
                            </td>
                            <td>
                            <?php
                            $sql = "select sum(total_no) from subject_need where n_code = '$need_id' AND c_code='$c_id'";
                            $q = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_array($q);
                            echo $row[0];
                            ?>  
                            </td>
                            <td>
                            <?php
                            $sql = "select sum(need_no) from subject_need where n_code = '$need_id' AND c_code='$c_id'";
                            $q = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_array($q);
                            echo $row[0];
                            ?>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                                <?php }
                                } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>