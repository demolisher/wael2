<?php
require 'config.php';
?>


<!-- Add Task -->
<div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة معلم</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="saveStudent">
                <div class="modal-body p-4">

                    <div id="errorMessage" class="alert alert-warning d-none"></div>



                    <div class="mb-3">
                        <p>اسم المعلم</p>
                        <input type="text" name="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="nationality">الجنسية</label>
                        <select name="nationality" class="form-select form-control" aria-label="Default select example">
                            <option selected>قم باختيار الجنسية</option>
                            <option value="سعودي">سعودي</option>
                            <option value="مصري">مصري</option>
                            <option value="يمني">يمني</option>
                            <option value="سوري">سوري</option>
                            <option value="أردني">أردني</option>
                            <option value="فلسطيني">فلسطيني</option>
                            <option value="لبناني">لبناني</option>
                            <option value="سوداني">سوداني</option>
                            <option value="ليبي">ليبي</option>
                            <option value="تونسي">تونسي</option>
                            <option value="جزائري">جزائري</option>
                            <option value="مغربي">مغربي</option>
                            <option value="أردني">أردني</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="speciality">التخصص</label>
                        <select name="speciality" class="form-select form-control" aria-label="Default select example">
                            <option selected>قم باختيار التخصص الأكاديمي</option>
                            <?php
                            $spec_query = "SELECT * FROM specs ORDER BY spec";
                            $spec_query_run = mysqli_query($conn, $spec_query);
                            if (mysqli_num_rows($spec_query_run) > 0) {
                                foreach ($spec_query_run as $spec) {
                            ?>
                                    <option value="<?php echo $spec['spec']; ?>"><?php echo $spec['spec']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="level">المرحلة</label>
                        <select multiple name="level[]" class="form-select form-control" aria-label="Default select example">
                            <option value="ابتدائية">الابتدائية</option>
                            <option value="متوسطة">المتوسطة</option>
                            <option value="ثانوية">الثانوية</option>
                            <option value="المسار المصري">المسار المصري</option>
                            <option value="رياض الأطفال">رياض الأطفال</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-8">
                                <label>المواد</label>
                                <select name="subject1" class="mb-2 form-select form-control" aria-label="Default select example">
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
                                <select name="subject2" class="mb-2 form-select form-control" aria-label="Default select example">
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
                                <select name="subject3" class="mb-2 form-select form-control" aria-label="Default select example">
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
                            <div class="col-4">
                                <label>عدد الحصص</label>
                                <input type="number" min="0" max="27" class="mb-2 form-control"  name="clsNumber1">
                                <input type="number" min="0" max="27" class="mb-2 form-control"  name="clsNumber2">
                                <input type="number" min="0" max="27" class="mb-2 form-control" name="clsNumber3">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding:10px 20px;line-height: 1rem;">إغلاق</button>
                    <button type="submit" class="btn btn-primary" style="padding:10px 20px;line-height: 1rem;">حفظ المعلم</button>
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
                        <p>اسم المعلم</p>
                        <input type="text" id="name" name="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="nationality">الجنسية</label>
                        <select name="nationality" id="nationality" class="form-select form-control" aria-label="Default select example">
                            <option selected>قم باختيار الجنسية</option>
                            <option value="سعودي">سعودي</option>
                            <option value="مصري">مصري</option>
                            <option value="يمني">يمني</option>
                            <option value="سوري">سوري</option>
                            <option value="أردني">أردني</option>
                            <option value="فلسطيني">فلسطيني</option>
                            <option value="لبناني">لبناني</option>
                            <option value="كويتي">كويتي</option>
                            <option value="عراقي">عراقي</option>
                            <option value="سوداني">سوداني</option>
                            <option value="ليبي">ليبي</option>
                            <option value="تونسي">تونسي</option>
                            <option value="جزائري">جزائري</option>
                            <option value="مغربي">مغربي</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="speciality">التخصص</label>
                        <select name="speciality" id="speciality" class="form-select form-control" aria-label="Default select example">
                            <option selected>قم باختيار التخصص الأكاديمي</option>
                            <?php
                            $spec_query = "SELECT * FROM specs ORDER BY spec";
                            $spec_query_run = mysqli_query($conn, $spec_query);
                            if (mysqli_num_rows($spec_query_run) > 0) {
                                foreach ($spec_query_run as $spec) {
                            ?>
                                    <option value="<?php echo $spec['spec']; ?>"><?php echo $spec['spec']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="level">المرحلة</label>
                        <select multiple name="level[]" id="level" class="form-select form-control" aria-label="Default select example">
                            <option value="ابتدائية">الابتدائية</option>
                            <option value="متوسطة">المتوسطة</option>
                            <option value="ثانوية">الثانوية</option>
                            <option value="المسار المصري">المسار المصري</option>
                            <option value="رياض الأطفال">رياض الأطفال</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-8">
                                <label>المواد</label>
                                <select name="subject1" id="subject1" class="mb-2 form-select form-control" aria-label="Default select example">
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
                                <select name="subject2" id="subject2" class="mb-2 form-select form-control" aria-label="Default select example">
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
                                <select name="subject3" id="subject3" class="mb-2 form-select form-control" aria-label="Default select example">
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
                            <div class="col-4">
                                <label>عدد الحصص</label>
                                <input type="number" min="0"  class="mb-2 form-control" id="clsNumber1" name="clsNumber1">
                                <input type="number" min="0"  class="mb-2 form-control" id="clsNumber2" name="clsNumber2">
                                <input type="number" min="0"  class="mb-2 form-control" id="clsNumber3" name="clsNumber3">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding:10px 20px;line-height: 1rem;">إغلاق</button>
                    <button type="submit" class="btn btn-primary" style="padding:10px 20px;line-height: 1rem;">تحديث معلومات المعلم</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Task Modal -->
<div class="modal fade" id="studentViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>

<!-- Teachers Table -->
<section class="content  mt-2">
    <div class="row" style="margin-right: 0;margin-left: -5px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="float: right !important">أحدث <?php if (isset($_GET['type'])) {
                                                                                    echo $t_n;
                                                                                } else {
                                                                                    echo 'المعلمين';
                                                                                } ?> المضافين</h3>
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
                                <th style="width:25%">الاسم</th>
                                <!--                                 <th style="width:10%">الجنسية</th>
                                
                                <th style="width:10%">المرحلة</th> -->
                                <th style="width:15%">التخصص</th>
                                <th style="width:10%">المرحلة</th>
                                <th style="width:20%">المادة</th>
                                <th style="width:10%">عدد الحصص</th>
                                <th style="width:10%">النصاب</th>
                                <th class="text-center" style="width:20%;">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tas_query = "SELECT * FROM teachers order by id desc";
                            $tas_query_run = mysqli_query($conn, $tas_query);
                            if (mysqli_num_rows($tas_query_run) > 0) {
                                foreach ($tas_query_run as $task) {
                            ?>
                                    <tr>
                                        <td><?= $task['name'] ?></td>
                                        <!--                                         <td><?= $task['nationality'] ?></td>
                                        
                                        <td><?= $task['level'] ?></td> -->
                                        <td><?= $task['speciality'] ?></td>

                                        <td>
                                        <?= $task['level'] ?>
                                        </td>

                                        <td>
                                            <?= $task['subject1'] ?>
                                            <?php if ($task['subject2'] != '') {
                                                echo '<hr>' . $task['subject2'];
                                            } ?>
                                           
                                            <?php if ($task['subject3'] != '') {
                                                echo '<hr>' . $task['subject3'];
                                            } ?>
                                        </td>
                                        <td>
                                            <?= $task['clsNumber1'] ?>
                                            <?php if ($task['clsNumber2'] != '0') {
                                                echo '<hr>' . $task['clsNumber2'];
                                            } ?>
                                            <?php if ($task['clsNumber3'] != '0') {
                                                echo '<hr>' . $task['clsNumber3'];
                                            } ?>
                                        </td>
                                        <td><?= $task['comple'] ?></td>
                                        <td class="text-center" style="display: flex;justify-content:center;vertical-align:middle">
                                            <?php if ($fetch['rule'] != 'data_entry') { ?><button type="button" class="viewStudentBtn btn-primary btn-sm m-1" value="<?= $task['id']; ?>">عرض</button><?php } ?>
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