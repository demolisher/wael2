<?php
require 'config.php';
?>


<!-- Add Task -->
<div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة مادة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="saveStudent">
                <div class="modal-body p-4">

                    <div id="errorMessage" class="alert alert-warning d-none"></div>
                    <input type="hidden" name="c_code" value="<?php echo $class_id;?>">
                    <input type="hidden" name="n_code" value="<?php echo $need_id;?>">
                    <div class="mb-3">
                        <div class="form-group">
                            <label>المادة الدراسية</label>
                            <select name="subject" class="mb-2 form-select form-control" aria-label="Default select example">
                                <option value="" selected>قم باختيار المادة</option>
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
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="l_number">عدد الحصص</label>
                        <input type="text" class="form-control text-center" name="l_number" placeholder="عدد الحصص">
                    </div>
                    <div class="form-group">
                        <label for="c_number">عدد الفصول</label>
                        <input type="text" class="form-control text-center" name="c_number" placeholder="عدد الفصول">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding:10px 20px;line-height: 1rem;">إغلاق</button>
                    <button type="submit" class="btn btn-primary" style="padding:10px 20px;line-height: 1rem;">حفظ المادة</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Task Modal -->
<div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تحرير معلومات المادة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateStudent">
                <div class="modal-body">

                    <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                    <input type="hidden" name="student_id" id="student_id">
                    <input type="hidden" name="c_code" value="<?php echo $class_id;?>">
                    <input type="hidden" name="n_code" value="<?php echo $need_id;?>">

                    <div class="mb-3">
                        <div class="form-group">
                            <label>المادة الدراسية</label>
                            <select name="subject"  id="subject" class="mb-2 form-select form-control" aria-label="Default select example">
                                <option value="" selected>قم باختيار المادة</option>
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
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comple">عدد الحصص</label>
                        <input type="text" class="form-control text-center" name="l_number"  id="l_number" placeholder="النصاب">
                    </div>
                    <div class="form-group">
                        <label for="comple">عدد الفصول</label>
                        <input type="text" class="form-control text-center" name="c_number" id="c_number" placeholder="النصاب">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding:10px 20px;line-height: 1rem;">إغلاق</button>
                    <button type="submit" class="btn btn-primary" style="padding:10px 20px;line-height: 1rem;">تحديث معلومات المادة</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Teachers Table -->
<section class="content  mt-2">
    <div class="row" style="margin-right: 0;margin-left: -5px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                    <h3 class="card-title" style="float: right !important">معلومات الاحتياج</h3>
                    <a class="btn btn-primary btn-sm m-2" href="need_calc.php?n=<?php echo $need_id;?>" style="float: left !important;font-size:0.8rem; padding:5px 10px">جدول احتياجات المرحلة والمجاميع</a>
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
                    <h3 class="card-title" style="float: right !important">احتياجات <?php echo $sl_class['class'] ?> من المواد الدراسية</h3>
                    <?php if ($type != 'student') { ?>

                        <button type="button" class="float-right" data-bs-toggle="modal" data-bs-target="#studentAddModal">
                            <span class="pl-2">إضافة</span><i class="fas fa-plus-circle float-right p-1 bg-primary" style="border-radius: 50%;"></i>
                        </button>
                    <?php } ?>

                </div>

                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th style="width:25%">المادة</th>
                                <th style="width:15%">عدد الحصص</th>
                                <th style="width:15%">عدد الصفوف</th>
                                <th style="width:10%">المجموع</th>
                                <th style="width:10%">اللازم</th>
                                <th class="text-center" style="width:25%;">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tas_query = "SELECT * FROM subject_need where n_code = '$need_id' AND c_code='$class_id'";
                            $tas_query_run = mysqli_query($conn, $tas_query);
                            if (mysqli_num_rows($tas_query_run) > 0) {
                                foreach ($tas_query_run as $task) {
                            ?>
                                    <tr>
                                        <td><?= $task['subject'] ?></td>
                                        <td><?= $task['l_number'] ?></td>
                                        <td><?= $task['c_number'] ?></td>
                                        <td><?= $task['total_no'] ?></td>
                                        <td><?= $task['need_no'] ?></td>

                                        <td class="text-center" style="display: flex;justify-content:center;vertical-align:middle">
                                            <?php if ($fetch['rule']  != 'data_entry') { ?> <button type="button" class="editStudentBtn btn-warning btn-sm m-1" value="<?= $task['id']; ?>">عدّل</button> <?php } ?>
                                            <?php if ($fetch['rule']  != 'data_entry') { ?> <button type="button" class="deleteStudentBtn btn-danger btn-sm m-1" value="<?= $task['id']; ?>">حذف</button> <?php } ?>
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