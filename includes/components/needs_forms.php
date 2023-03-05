<?php
require 'config.php';
?>


<!-- Add Task -->
<div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة احتياج</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="saveStudent">
                <div class="modal-body p-4">

                    <div id="errorMessage" class="alert alert-warning d-none"></div>



                    <div class="mb-3">
                        <div class="form-group">
                            <label for="compound">المجمع التعليمي</label>
                            <select class="form-control" name="compound">
                                <option value="" selected>قم بالاختيار</option>
                                <?php
                                $compound_query = "SELECT * FROM compounds ORDER BY compound";
                                $compound_query_run = mysqli_query($conn, $compound_query);
                                if (mysqli_num_rows($compound_query_run) > 0) {
                                    foreach ($compound_query_run as $compound) {
                                ?>
                                        <option value="<?php echo $compound['compound']; ?>"><?php echo $compound['compound']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="path">المسار التعليمي</label>
                        <select class="form-control" name="path">
                            <option value="" selected>قم بالاختيار</option>
                            <option value="العام">العام</option>
                            <option value="التحفيظ">التحفيظ</option>
                            <option value="الدولي">الدولي</option>
                            <option value="الدبلوما الأمريكية">الدبلوما الأمريكية</option>
                            <option value="المصري">المصري</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="level">المرحلة التعليمية</label>
                        <select class="form-control" name="level">
                            <option value="" selected>قم بالاختيار</option>
                            <option value="رياض الأطفال">رياض الأطفال</option>
                            <option value="المرحلة الابتدائية">المرحلة الابتدائية</option>
                            <option value="المرحلة المتوسطة">المرحلة المتوسطة</option>
                            <option value="المرحلة الثانوية">المرحلة الثانوية</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="term">الفصل الدراسي</label>
                        <select class="form-control" name="term">
                            <option value="" selected>قم بالاختيار</option>
                            <option value="الفصل الدراسي الأول">الفصل الدراسي الأول</option>
                            <option value="الفصل الدراسي الثاني">الفصل الدراسي الثاني</option>
                            <option value="الفصل الدراسي الثالث">الفصل الدراسي الثالث</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gender">النوع</label>
                        <select class="form-control" name="gender">
                            <option value="" selected>قم بالاختيار</option>
                            <option value="بنين">بنين</option>
                            <option value="بنات">بنات</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comple">النصاب</label>
                        <input type="text" class="form-control text-center" name="comple" placeholder="النصاب">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding:10px 20px;line-height: 1rem;">إغلاق</button>
                    <button type="submit" class="btn btn-primary" style="padding:10px 20px;line-height: 1rem;">حفظ الاحتياج</button>
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
                <h5 class="modal-title" id="exampleModalLabel">تحرير معلومات المعلم</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateStudent">
                <div class="modal-body">

                    <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                    <input type="hidden" name="student_id" id="student_id">

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="compound">المجمع التعليمي</label>
                            <select class="form-control" name="compound" id="compound">
                                <option value="" selected>قم بالاختيار</option>
                                <?php
                                $compound_query = "SELECT * FROM compounds ORDER BY compound";
                                $compound_query_run = mysqli_query($conn, $compound_query);
                                if (mysqli_num_rows($compound_query_run) > 0) {
                                    foreach ($compound_query_run as $compound) {
                                ?>
                                        <option value="<?php echo $compound['compound']; ?>"><?php echo $compound['compound']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="path">المسار التعليمي</label>
                        <select class="form-control" name="path" id="path">
                            <option value="" selected>قم بالاختيار</option>
                            <option value="العام">العام</option>
                            <option value="التحفيظ">التحفيظ</option>
                            <option value="الدولي">الدولي</option>
                            <option value="الدبلوما الأمريكية">الدبلوما الأمريكية</option>
                            <option value="المصري">المصري</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="level">المرحلة التعليمية</label>
                        <select class="form-control" name="level" id="level">
                            <option value="" selected>قم بالاختيار</option>
                            <option value="رياض الأطفال">رياض الأطفال</option>
                            <option value="المرحلة الابتدائية">المرحلة الابتدائية</option>
                            <option value="المرحلة المتوسطة">المرحلة المتوسطة</option>
                            <option value="المرحلة الثانوية">المرحلة الثانوية</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="term">الفصل الدراسي</label>
                        <select class="form-control" name="term" id="term">
                            <option value="" selected>قم بالاختيار</option>
                            <option value="الفصل الدراسي الأول">الفصل الدراسي الأول</option>
                            <option value="الفصل الدراسي الثاني">الفصل الدراسي الثاني</option>
                            <option value="الفصل الدراسي الثالث">الفصل الدراسي الثالث</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gender">النوع</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="" selected>قم بالاختيار</option>
                            <option value="بنين">بنين</option>
                            <option value="بنات">بنات</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comple">النصاب</label>
                        <input type="text" class="form-control text-center" name="comple" id="comple" placeholder="النصاب">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding:10px 20px;line-height: 1rem;">إغلاق</button>
                    <button type="submit" class="btn btn-primary" style="padding:10px 20px;line-height: 1rem;">تحديث معلومات الاحتياج</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Task Modal -->
<!-- <div class="modal fade" id="studentViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تفاصيل ومعلومات المعلم</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-stripped">
                    <tbody class="text-center">
                        <tr>
                            <td class="w-25 text-bold">اسم المعلم</td>
                            <td class="w-75" id="view_name"></td>
                        </tr>
                        <tr>
                            <td class="w-25 text-bold">الجنسية</td>
                            <td class="w-75" id="view_nationality"></td>
                        </tr>
                        <tr>
                            <td class="w-25 text-bold">التخصص</td>
                            <td class="w-75" id="view_speciality"></td>
                        </tr>
                        <tr>
                            <td class="w-25 text-bold">المرحلة التعليمية التي يدرسها</td>
                            <td class="w-75" id="view_level"></td>
                        </tr>
                        <tr>
                            <td class="w-75 text-bold">المادة</td>
                            <td class="w-25 text-bold">عدد الحصص</td>
                        </tr>
                        <tr>
                            <td class="w-75" id="view_subject1"></td>
                            <td class="w-25" id="view_clsNumber1"></td>
                        </tr>
                        <tr>
                            <td class="w-75" id="view_subject2"></td>
                            <td class="w-25" id="view_clsNumber2"></td>
                        </tr>
                        <tr>
                            <td class="w-75" id="view_subject3"></td>
                            <td class="w-25" id="view_clsNumber3"></td>
                        </tr>
                        <tr>
                            <td class="w-25 text-bold">النصاب</td>
                            <td class="w-75" id="view_comple"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding:10px 20px;line-height: 1rem;">إغلاق</button>
            </div>
        </div>
    </div>
</div> -->

<!-- Teachers Table -->
<section class="content  mt-2">
    <div class="row" style="margin-right: 0;margin-left: -5px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="float: right !important">أحدث <?php if (isset($_GET['type'])) {
                                                                                    echo $t_n;
                                                                                } else {
                                                                                    echo 'الاحتياجات';
                                                                                } ?> المضافة</h3>
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
                                <th style="width:30%">المجمع</th>
                                <th style="width:15%">المسار</th>
                                <th style="width:15%">المرحلة</th>
                                <th style="width:10%">النوع</th>
                                <th class="text-center" style="width:30%;">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tas_query = "SELECT * FROM needs order by id desc";
                            $tas_query_run = mysqli_query($conn, $tas_query);
                            if (mysqli_num_rows($tas_query_run) > 0) {
                                foreach ($tas_query_run as $task) {
                            ?>
                                    <tr>
                                        <td><?= $task['compound'] ?></td>
                                        <td><?= $task['path'] ?></td>
                                        <td><?= $task['level'] ?></td>
                                        <td><?= $task['gender'] ?></td>

                                        <td class="text-center" style="display: flex;justify-content:center;vertical-align:middle">
                                            <?php if ($fetch['rule'] != 'data_entry') { ?><a href="need_report.php?n=<?= $task['id']; ?>" class="btn-success btn-sm m-1">تقرير</a><?php } ?>
                                            <?php if ($fetch['rule'] != 'data_entry') { ?><a href="classes.php?n=<?= $task['id']; ?>" class="btn-primary btn-sm m-1">الصفوف</a><?php } ?>
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