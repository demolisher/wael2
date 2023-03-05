<?php
require 'config.php';
?>



<!-- Teachers Table -->
<section class="content  mt-2">
    <div class="row" style="margin-right: 0;margin-left: -5px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="float: right !important">معلومات الاحتياج</h3>
                    <a class="btn btn-warning btn-sm m-2" href="needs.php" style="float: left !important;font-size:0.8rem; padding:5px 10px">الرجوع إلى قائمة الاحتياجات</a>

                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>المجمع التعليمي</td>
                            <td><?php echo $sl_need['compound'];?></td>
                        </tr>
                        <tr>
                            <td>المسار التعليمي</td>
                            <td><?php echo $sl_need['path'];?></td>
                        </tr>
                        <tr>
                            <td>المرحلة التعليمية</td>
                            <td><?php echo $sl_need['level'];?></td>
                        </tr>
                        <tr>
                            <td>النوع</td>
                            <td><?php echo $sl_need['gender'];?></td>
                        </tr>
                        <tr>
                            <td>النصاب</td>
                            <td><?php echo $sl_need['comple'];?></td>
                        </tr>
                        <tr>
                            <td>كود الاحتياج</td>
                            <td><?php echo $sl_need['need_code'];?></td>
                        </tr>
                    </table>

                    <h3 class="card-title" style="float: right !important">صفوف المرحلة</h3>

                </div>

                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th style="width:60%">الصف</th>
                                <th class="text-center" style="width:40%;">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl_level = $sl_need['level'];
                            $tas_query = "SELECT * FROM classes where level='$sl_level'";
                            $tas_query_run = mysqli_query($conn, $tas_query);
                            if (mysqli_num_rows($tas_query_run) > 0) {
                                foreach ($tas_query_run as $task) {
                            ?>
                                    <tr>
                                        <td><?= $task['class'] ?></td>

                                        <td class="text-center" style="display: flex;justify-content:center;vertical-align:middle">
                                          <a href="subjects.php?n=<?= $need_id;?>&c=<?= $task['id'];?>" class="btn-primary btn-sm m-1">احتياجات المواد</a>
                                        </td>
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