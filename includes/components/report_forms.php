<?php
require 'config.php';
?>

<!-- Teachers Table -->
<section class="content  mt-2">
    <div class="row" style="margin-right: 0;margin-left: -5px;">
        <div class="col-12">
            <div id="need_info" class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="card-title" style="float: right !important">تقرير المسح و الاحتياج </h3>
                        <div>
                            <button class="btn btn-success btn-sm m-2" style="float: left !important;font-size:0.8rem; padding:5px 10px" onclick="ExportToExcel('xlsx')">تصدير إلى إكسيل <i class="fas fa-table float-right p-1 text-white"></i></button>
                            <button class="btn btn-danger btn-sm m-2" style="float: left !important;font-size:0.8rem; padding:5px 10px" onclick="exportPDF()">تصدير إلى PDF <i class="fas fa-file float-right p-1 text-white"></i></button>
                        </div>
                        <a class="btn btn-warning btn-sm m-2" href="need_calc.php?n=<?php echo $need_id; ?>" style="float: left !important;font-size:0.8rem; padding:5px 10px">الرجوع لمعلومات الاحتياج</a>
                    </div>
                    <div class="d-flex">
                        <table class="w-75 table table-bordered table-striped m-1">
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
                        </table>
                        <table class="w-25 table table-bordered table-striped m-1">

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



                </div>

                <div class="card-body">

                    <table id="myTable" class="w-100 table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th style="width:25%">المادة</th>
                                <th style="width:10%">عدد الحصص</th>
                                <th style="width:10%">عدد الصفوف</th>
                                <!-- <th style="width:10%">المجموع</th> -->
                                <th style="width:10%">اللازم</th>
                                <th style="width:10%">المتوفر</th>
                                <th style="width:10%">الزيادة</th>
                                <th style="width:10%">العجز</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $max = 0;
                            $sum = 0;
                            $sub_query = "SELECT *  FROM subject_need where n_code = '$need_id' GROuP BY subject";
                            $sub_query_run = mysqli_query($conn, $sub_query);
                            if (mysqli_num_rows($sub_query_run) > 0) {
                                foreach ($sub_query_run as $sub) {
                            ?>
                                    <tr>
                                        <td><?= $sub['subject'] ?></td>
                                        <td><?php
                                            $s_name = $sub['subject'];
                                            $sql1 = "select sum(total_no) from subject_need where n_code = '$need_id' AND subject='$s_name'";
                                            $q1 = mysqli_query($conn, $sql1);
                                            $row1 = mysqli_fetch_array($q1);
                                            echo $row1[0];
                                            ?></td>
                                        <td><?php
                                            $s_name = $sub['subject'];
                                            $sql2 = "select sum(c_number) from subject_need where n_code = '$need_id' AND subject='$s_name'";
                                            $q2 = mysqli_query($conn, $sql2);
                                            $row2 = mysqli_fetch_array($q2);
                                            echo $row2[0];
                                            $row2[0] > $max ? $max = $row2[0] : $max = $max;
                                            ?>
                                        </td>
                                        <!-- <td><?php echo $row1[0] * $row2[0]; ?></td> -->
                                        <td><?php $tot = bcdiv(($row1[0]), $sl_need['comple'], 2);
                                            echo $tot;
                                            $sum = $sum + $tot;
                                            ?></td>
                                        <td><input class="available" type="number" min="0.00" name="" id="" step="0.01" value="0.00"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            <tr>
                                <td style="font-weight: bolder; font-size:1.2rem">المجموع</td>
                                <td>
                                    <?php

                                    $sql = "select sum(total_no) from subject_need where n_code = '$need_id'";
                                    $q = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($q);
                                    echo $row[0];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $max;
                                    ?>
                                </td>
                                <!-- <td>
                                    <?php
                                    $sql = "select sum(total_no) from subject_need where n_code = '$need_id'";
                                    $q = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($q);
                                    echo $row[0];
                                    ?>
                                </td> -->
                                <td>
                                    <?php
                                    echo $sum;
                                    ?>
                                </td>
                                <td id="accom1">
                                    <?php
                                    $sql = "select sum(need_no) from subject_need where n_code = '$need_id'";
                                    $q = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($q);
                                    echo '...';
                                    ?>
                                </td>
                                <td id="accom2">
                                    <?php
                                    $sql = "select sum(need_no) from subject_need where n_code = '$need_id'";
                                    $q = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($q);
                                    echo '...';
                                    ?>
                                </td>
                                <td id="accom3">
                                    <?php
                                    $sql = "select sum(need_no) from subject_need where n_code = '$need_id'";
                                    $q = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($q);
                                    echo '...';
                                    ?>
                                </td>

                            </tr>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>

                    <table id="myTable2" class="w-100 table table-bordered table-striped">
                        <thead>
                            <tr>
                                <h1 class="text-center">التسديد بالأسماء</h1>
                            </tr>
                            <tr class="text-center">
                                <th style="width:25%">المواد الدراسية</th>
                                <th style="width:10%">اللازم</th>
                                <th style="width:20%">التسديد بالأسماء</th>
                                <th style="width:10%">الشاغر</th>
                                <th style="width:10%">الزيادة</th>
                                <th style="width:25%">ملاحظات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i=0; $i < 12; $i++) { 
                              ?>
                           

                            <tr>
                                <td>
                                    <select class="form-control" name="subject" id="subject">
                                        <?php
                                        $subject_query = "SELECT * FROM subjects ORDER BY subject";
                                        $subject_query_run = mysqli_query($conn, $subject_query);
                                        if (mysqli_num_rows($subject_query_run) > 0) {
                                            foreach ($subject_query_run as $subject) {
                                        ?>
                                                <option value="<?php echo $subject['subject']; ?>"><?php echo $subject['subject']; ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </td>
                                <td><input class="available" type="text" placeholder="اللازم"></td>
                                <td><select class="form-control" name="teacher" id="teacher">
                                        <?php
                                        $teacher_query = "SELECT * FROM teachers ORDER BY name";
                                        $teacher_query_run = mysqli_query($conn, $teacher_query);
                                        if (mysqli_num_rows($teacher_query_run) > 0) {
                                            foreach ($teacher_query_run as $teacher) {
                                        ?>
                                                <option value="<?php echo $teacher['name']; ?>"><?php echo $teacher['name']; ?></option>
                                        <?php }
                                        } ?>
                                    </select></td>
                                <td><input class="available" type="text" placeholder="الشاغر"></td>
                                <td><input class="available" type="text" placeholder="الزيادة"></td>
                                <td><input class="available" type="text" placeholder="ملاحظة"></td>
                            </tr>
                            <?php  } ?>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>