<?php
require 'config.php';
?>

<!-- Responses Table -->
<section class="content  mt-2">
    <div class="row" style="margin-right: 0;margin-left: -5px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="float: right !important">أحدث <?php if (isset($_GET['type'])) {
                                                                                    echo $t_n;
                                                                                } else {
                                                                                    echo 'نتائج';
                                                                                } ?> الطالبات</h3>

                </div>

                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th style="width:30%">الطالبة</th>
                                <th style="width:30%">المهمة</th>
                                <th style="width:10%">النوع</th>
                                <th style="width:10%">الدرجة</th>
                                <th style="width:20%">الدرجة الكلية</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $classroom = $fetch['class_id'];
                                $sb_id = $_GET['sub'];
                            if(isset($_GET['sub'])){
                                $res_query = "SELECT * FROM responses where class='$classroom' And sub_id='$sb_id' order by id desc";
                            }
                            elseif(isset($_GET['sub']) && isset($_GET['type'])){
                                $tt = $_GET['type'];
                                $res_query = "SELECT * FROM responses where class='$classroom' And sub_id='$sb_id' AND type_id='$tt' order by id desc";
                            }
                            else {
                                $res_query = "SELECT * FROM responses where class='$classroom'  order by id desc";
                            }
                            
                            $res_query_run = mysqli_query($conn, $res_query);
                            if (mysqli_num_rows($res_query_run) > 0) {
                                foreach ($res_query_run as $resp) {
                                    $stu_id = $resp['st_id'];
                                    $select_student = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$stu_id'");
                                    if (mysqli_num_rows($select_student) > 0) {
                                        $fetch_student = mysqli_fetch_assoc($select_student);
                                    }
                                    $rsp_id=$resp['ex_id'];
                                    $select_exam = mysqli_query($conn, "SELECT * FROM `tasks` WHERE id = '$rsp_id'");
                                    if (mysqli_num_rows($select_exam) > 0) {
                                        $fetch_exam = mysqli_fetch_assoc($select_exam);
                                    }
                            ?>
                                    <tr>
                                        <td><?= $fetch_student['name'] ?></td>
                                        <td><?= $fetch_exam['name'] ?></td>
                                        <td><?= $fetch_exam['type_name'] ?></td>
                                        <td><?= $resp['res_grade'] ?></td>
                                        <td><?= $fetch_exam['grade'] ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>



                        <tfoot>

                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>