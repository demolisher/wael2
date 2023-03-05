<?php
require 'config.php';
?>

<!-- Tasks Table -->
<section class="content  mt-2">
    <div class="row" style="margin-right: 0;margin-left: -5px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="float: right !important">لوحة التحكم </h3>
                </div>
                <div class="tabs text-center">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php if ($fetch['name']!= 'الموجهة الطلابية') {?>
                           
                        
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="t-tab" data-bs-toggle="tab" data-bs-target="#t" type="button" role="tab" aria-controls="t" aria-selected="true">جدول المعلمات</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="s-tab" data-bs-toggle="tab" data-bs-target="#s" type="button" role="tab" aria-controls="s" aria-selected="false">جدول الطالبات</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="r-tab" data-bs-toggle="tab" data-bs-target="#r" type="button" role="tab" aria-controls="r" aria-selected="false">إشعارات المتابعة</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="rs-tab" data-bs-toggle="tab" data-bs-target="#rs" type="button" role="tab" aria-controls="rs" aria-selected="false">استمارات المتابعة</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="rp-tab" data-bs-toggle="tab" data-bs-target="#rp" type="button" role="tab" aria-controls="rp" aria-selected="false">التقارير</button>
                        </li>
                        <?php }?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="sr-tab" data-bs-toggle="tab" data-bs-target="#sr" type="button" role="tab" aria-controls="sr" aria-selected="false">إحصائيات</button>
                        </li>
                        <?php if ($fetch['name']!= 'الموجهة الطلابية') {?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="mt-tab" data-bs-toggle="tab" data-bs-target="#mt" type="button" role="tab" aria-controls="mt" aria-selected="false">المعلمة المتميزة</button>
                        </li>
                        <?php }?>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                    <?php if ($fetch['name']!= 'الموجهة الطلابية') {?>

                        <div class="tab-pane fade show active" id="t" role="tabpanel" aria-labelledby="t-tab">
                            <div class="card-body" id="">
                                <table id="teachers_Table" class="activation table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width:40%">الاسم</th>
                                            <th style="width:20%">الصف</th>
                                            <th style="width:20%">المادة</th>
                                            <th class="text-center" style="width:20%;">إجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $user_query = "SELECT * FROM user_form where user_type='teacher' order by id desc";
                                        $user_query_run = mysqli_query($conn, $user_query);
                                        if (mysqli_num_rows($user_query_run) > 0) {
                                            foreach ($user_query_run as $user) {
                                        ?>
                                                <tr>
                                                    <td><?= $user['name'] ?></td>
                                                    <td><?= $user['class_name'] ?></td>
                                                    <td><?= $user['subject_name'] ?></td>
                                                    <td class="text-center" style="display: flex;justify-content:center;vertical-align:middle">
                                                        <?php if ($user['active'] == 0) { ?><button type="button" class="activate_t btn-success btn-sm m-1" value="<?= $user['id']; ?>">تفعيل</button><?php } ?>
                                                        <?php if ($user['active'] == 1) { ?><button type="button" class="deactive_t btn-secondary btn-sm m-1" value="<?= $user['id']; ?>">تعطيل</button><?php } ?>
                                                        <button type="button" class="delete_t btn-danger btn-sm m-1" value="<?= $user['id']; ?>">حذف</button>
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

                        <div class="tab-pane fade" id="s" role="tabpanel" aria-labelledby="s-tab">
                            <div class="card-body" id="">
                                <table id="students_Table" class="activation table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width:50%">الاسم</th>
                                            <th style="width:20%">الصف</th>
                                            <th class="text-center" style="width:30%;">إجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $user_query = "SELECT * FROM user_form where user_type='student' order by id desc";
                                        $user_query_run = mysqli_query($conn, $user_query);
                                        if (mysqli_num_rows($user_query_run) > 0) {
                                            foreach ($user_query_run as $user) {
                                        ?>
                                                <tr>
                                                    <td><?= $user['name'] ?></td>
                                                    <td><?= $user['class_name'] ?></td>
                                                    <td class="text-center" style="display: flex;justify-content:center;vertical-align:middle">
                                                        <?php if ($user['active'] == 0) { ?><button type="button" class="activate_s btn-success btn-sm m-1" value="<?= $user['id']; ?>">تفعيل</button><?php } ?>
                                                        <?php if ($user['active'] == 1) { ?><button type="button" class="deactive_s btn-secondary btn-sm m-1" value="<?= $user['id']; ?>">تعطيل</button><?php } ?>
                                                        <button type="button" class="delete_s btn-danger btn-sm m-1" value="<?= $user['id']; ?>">حذف</button>
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

                        <div class="tab-pane fade" id="r" role="tabpanel" aria-labelledby="r-tab">
                            <div class="card-body" id="">
                                <table id="follow_Table" class="activation table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width:50%">الاسم</th>
                                            <th style="width:20%">الصف</th>
                                            <th class="text-center" style="width:30%;">إجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $user_query = "SELECT * FROM user_form where user_type='teacher' order by id desc";
                                        $user_query_run = mysqli_query($conn, $user_query);
                                        if (mysqli_num_rows($user_query_run) > 0) {
                                            foreach ($user_query_run as $user) {
                                        ?>
                                                <tr>
                                                    <td><?= $user['name'] ?></td>
                                                    <td><?= $user['class_name'] ?></td>
                                                    <td class="text-center" style="display: flex;justify-content:center;vertical-align:middle">
                                                        <?php if ($user['followed'] == 0) { ?><button type="button" class="follow_t btn-success btn-sm m-1" value="<?= $user['id']; ?>">متابعة</button><?php } ?>
                                                        <?php if ($user['followed'] == 1) { ?><button type="button" class="un_follow_t btn-secondary btn-sm m-1" value="<?= $user['id']; ?>">تعطيل متابعة</button><?php } ?>

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

                        <div class="tab-pane fade" id="rs" role="tabpanel" aria-labelledby="rs-tab">
                            <!-- Add Follow -->
                            <div class="modal fade" id="followAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">إضافة استمارة</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="saveFollow">
                                            <div class="modal-body p-4">

                                                <div id="errorMessage" class="alert alert-warning d-none"></div>
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <p>اسم المعلمة</p>
                                                        <input type="text" name="name" class="form-control" />
                                                    </div>
                                                    <div class="col-6">
                                                        <p>التاريخ</p>
                                                        <input type="date" name="rs_date" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <p>ملخص سير العمل</p>
                                                    <textarea class="form-control" name="work" id="" cols="50" rows="3"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <p>إحصائيات أسبوعية</p>
                                                    <textarea class="form-control" name="stat" id="" cols="50" rows="2"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <p>ملاحظات</p>
                                                    <textarea class="form-control" name="notes" id="" cols="50" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding:10px 20px;line-height: 1rem;">إغلاق</button>
                                                <button type="submit" class="btn btn-primary" style="padding:10px 20px;line-height: 1rem;">حفظ الاستمارة</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Follow Modal -->
                            <div class="modal fade" id="followEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">تحرير الاستمارة</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="updateFollow">
                                            <div class="modal-body">

                                                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                                                <input type="hidden" name="rs_id" id="rs_id">

                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <p>اسم المعلمة</p>
                                                        <input type="text" name="teacher" id="teacher" class="form-control" />
                                                    </div>
                                                    <div class="col-6">
                                                        <p>التاريخ</p>
                                                        <input type="date" name="rs_date" id="rs_date" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <p>ملخص سير العمل</p>
                                                    <textarea class="form-control" name="work" id="work" cols="50" rows="3"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <p>إحصائيات أسبوعية</p>
                                                    <textarea class="form-control" name="stat" id="stat" cols="50" rows="2"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <p>ملاحظات</p>
                                                    <textarea class="form-control" name="notes" id="notes" cols="50" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding:10px 20px;line-height: 1rem;">إغلاق</button>
                                                <button type="submit" class="btn btn-primary" style="padding:10px 20px;line-height: 1rem;">تحديث الاستمارة</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- View Follow Modal -->
                            <div class="modal fade" id="followViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">تفاصيل الاستمارة</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered table-stripped">
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td class="w-25 text-bold">اسم المعلمة</td>
                                                        <td class="w-75" id="view_teacher"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25 text-bold">التاريخ</td>
                                                        <td class="w-75" id="view_rs_date"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25 text-bold">سير العمل</td>
                                                        <td class="w-75" id="view_work"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25 text-bold">إحصائيات</td>
                                                        <td class="w-75" id="view_stat"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25 text-bold">ملاحظات</td>
                                                        <td class="w-75" id="view_notes"></td>
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

                            <!-- Follow Table -->
                            <section class="content  mt-2">
                                <div class="row" style="margin-right: 10px;margin-left: 10px;">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title" style="float: right !important">أحدث الاستمارات المضافة</h3>
                                                <?php if ($type == 'manager') { ?>

                                                    <button type="button" class="float-right" data-bs-toggle="modal" data-bs-target="#followAddModal">
                                                        <span class="pl-2">إضافة</span><i class="fas fa-plus-circle float-right p-1 bg-primary" style="border-radius: 50%;"></i>
                                                    </button>
                                                <?php } ?>

                                            </div>

                                            <div class="card-body">
                                                <table id="followTable" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th style="width:50%">اسم المعلمة</th>
                                                            <!-- <th style="width:10%">الصف</th>
                                                            <th style="width:10%">المادة</th> -->
                                                            <th style="width:20%">التاريخ</th>
                                                            <th class="text-center" style="width:30%;">إجراءات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $rs_query = "SELECT * FROM rs order by id desc";
                                                        $rs_query_run = mysqli_query($conn, $rs_query);
                                                        if (mysqli_num_rows($rs_query_run) > 0) {
                                                            foreach ($rs_query_run as $rs) {
                                                        ?>
                                                                <tr>
                                                                    <td><?= $rs['teacher'] ?></td>
                                                                    <!-- <td><?= $rs['class'] ?></td>
                                                                    <td><?= $rs['subject'] ?></td> -->
                                                                    <td><?= $rs['rs_date'] ?></td>
                                                                    <td class="text-center" style="display: flex;justify-content:center;vertical-align:middle">
                                                                        <?php if ($type == 'manager') { ?>
                                                                            <button type="button" class="viewFollowBtn btn-primary btn-sm m-1" value="<?= $rs['id']; ?>">عرض</button>
                                                                            <button type="button" class="editFollowBtn btn-warning btn-sm m-1" value="<?= $rs['id']; ?>">عدّل</button>
                                                                            <button type="button" class="deleteFollowBtn btn-danger btn-sm m-1" value="<?= $rs['id']; ?>">حذف</button>
                                                                        <?php } ?>
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
                        </div>

                        <div class="tab-pane fade" id="rp" role="tabpanel" aria-labelledby="rp-tab">
                            <!-- Add Report -->
                            <div class="modal fade" id="reportAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">إضافة استمارة</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="saveReport">
                                            <div class="modal-body p-4">

                                                <div id="errorMessage" class="alert alert-warning d-none"></div>
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <p>اسم البرنامج</p>
                                                        <input type="text" name="program" class="form-control" />
                                                    </div>
                                                    <div class="col-6">
                                                        <p>تاريخ التنفيذ</p>
                                                        <input type="date" name="rp_date" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <p>اسم المنفذة (المعلمة)</p>
                                                        <input type="text" name="teacher" class="form-control" />
                                                    </div>
                                                    <div class="col-6">
                                                        <p>الجهة المساعدة</p>
                                                        <input type="text" name="support" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <p>عدد الساعات</p>
                                                        <input type="text" name="hours" class="form-control" />
                                                    </div>
                                                    <div class="col-6">
                                                        <p>الفئة المستهدفة</p>
                                                        <input type="text" name="target" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <p>وصف البرنامج</p>
                                                    <textarea class="form-control" name="descr" id="" cols="50" rows="2"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <p>إجراءات التنفيذ</p>
                                                    <textarea class="form-control" name="proc" id="" cols="50" rows="2"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <p>التوصيات</p>
                                                    <textarea class="form-control" name="recom" id="" cols="50" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding:10px 20px;line-height: 1rem;">إغلاق</button>
                                                <button type="submit" class="btn btn-primary" style="padding:10px 20px;line-height: 1rem;">حفظ التقرير</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Report Modal -->
                            <div class="modal fade" id="reportEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">تحرير التقرير</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="updateReport">
                                            <div class="modal-body">

                                                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                                                <input type="hidden" name="rp_id" id="rp_id">

                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <p>اسم البرنامج</p>
                                                        <input type="text" name="program" id="program" class="form-control" />
                                                    </div>
                                                    <div class="col-6">
                                                        <p>تاريخ التنفيذ</p>
                                                        <input type="date" name="rp_date" id="rp_date" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <p>اسم المنفذة (المعلمة)</p>
                                                        <input type="text" name="teacher" id="rp_teacher" class="form-control" />
                                                    </div>
                                                    <div class="col-6">
                                                        <p>الجهة المساعدة</p>
                                                        <input type="text" name="support" id="support" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <p>عدد الساعات</p>
                                                        <input type="text" name="hours" id="hours" class="form-control" />
                                                    </div>
                                                    <div class="col-6">
                                                        <p>الفئة المستهدفة</p>
                                                        <input type="text" name="target" id="target" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <p>وصف البرنامج</p>
                                                    <textarea class="form-control" name="descr" id="descr" cols="50" rows="2"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <p>إجراءات التنفيذ</p>
                                                    <textarea class="form-control" name="proc" id="proc" cols="50" rows="2"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <p>التوصيات</p>
                                                    <textarea class="form-control" name="recom" id="recom" cols="50" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding:10px 20px;line-height: 1rem;">إغلاق</button>
                                                <button type="submit" class="btn btn-primary" style="padding:10px 20px;line-height: 1rem;">تحديث التقرير</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- View Report Modal -->
                            <div class="modal fade" id="reportViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">تفاصيل التقرير</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered table-stripped">
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td class="w-25 text-bold">اسم البرنامج</td>
                                                        <td class="w-75" id="view_program"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25 text-bold">تاريخ التنفيذ</td>
                                                        <td class="w-75" id="view_rp_date"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25 text-bold">اسم المنفذة (المعلمة)</td>
                                                        <td class="w-75" id="view_rp_teacher"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25 text-bold">الجهة المساعدة</td>
                                                        <td class="w-75" id="view_support"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25 text-bold">عدد الساعات</td>
                                                        <td class="w-75" id="view_hours"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25 text-bold">الفئة المستهدفة</td>
                                                        <td class="w-75" id="view_target"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25 text-bold">وصف البرنامج</td>
                                                        <td class="w-75" id="view_descr"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25 text-bold">إجراءات التنفيذ</td>
                                                        <td class="w-75" id="view_proc"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25 text-bold">التوصيات</td>
                                                        <td class="w-75" id="view_recom"></td>
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

                            <!-- Report Table -->
                            <section class="content  mt-2">
                                <div class="row" style="margin-right: 10px;margin-left: 10px;">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title" style="float: right !important">أحدث الاستمارات المضافة</h3>
                                                <?php if ($type == 'manager') { ?>

                                                    <button type="button" class="float-right" data-bs-toggle="modal" data-bs-target="#reportAddModal">
                                                        <span class="pl-2">إضافة</span><i class="fas fa-plus-circle float-right p-1 bg-primary" style="border-radius: 50%;"></i>
                                                    </button>
                                                <?php } ?>

                                            </div>

                                            <div class="card-body">
                                                <table id="reportTable" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th style="width:40%">اسم البرنامج</th>
                                                            <th style="width:20%">المنفذة</th>
                                                            <th style="width:10%">التاريخ</th>
                                                            <th style="width:20%">الجهة المساعدة</th>
                                                            <th class="text-center" style="width:30%;">إجراءات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $rp_query = "SELECT * FROM rp order by id desc";
                                                        $rp_query_run = mysqli_query($conn, $rp_query);
                                                        if (mysqli_num_rows($rp_query_run) > 0) {
                                                            foreach ($rp_query_run as $rp) {
                                                        ?>
                                                                <tr>
                                                                    <td><?= $rp['program'] ?></td>
                                                                    <td><?= $rp['teacher'] ?></td>
                                                                    <td><?= $rp['rp_date'] ?></td>
                                                                    <td><?= $rp['support'] ?></td>
                                                                    <td class="text-center" style="display: flex;justify-content:center;vertical-align:middle">
                                                                        <?php if ($type == 'manager') { ?>
                                                                            <button type="button" class="viewReportBtn btn-primary btn-sm m-1" value="<?= $rp['id']; ?>">عرض</button>
                                                                            <button type="button" class="editReportBtn btn-warning btn-sm m-1" value="<?= $rp['id']; ?>">عدّل</button>
                                                                            <button type="button" class="deleteReportBtn btn-danger btn-sm m-1" value="<?= $rp['id']; ?>">حذف</button>
                                                                        <?php } ?>
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
                        </div>
                        
                        <div class="tab-pane fade" id="sr" role="tabpanel" aria-labelledby="sr-tab">
                        <?php }?>
                            <div class="card-body" id="">
                                <h4 class="p-3 m-2 bg-warning">تعداد مهام المواد</h4>
                                <div class="row" style="margin:0;">
                                    <?php
                                    $query = "SELECT * FROM subjects";
                                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                    $c = 1;
                                    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                        if ($row['id'] == 5 || $row['id'] == 6) { ?>
                                            <div class="col-lg-4 col-sm-6 col-6">
                                                <div class="small-box" style="background-color: #<?php echo $row['sub_bg']; ?>;color:#<?php echo $row['font_color']; ?>">
                                                    <div class="inner text-center w-75">
                                                        <h3><?php
                                                            $sb_id = $row['id'];
                                                            $sql1 = "SELECT * FROM m_tasks where met_id ='$sb_id'";
                                                            if ($result1 = mysqli_query($conn, $sql1)) {
                                                                // Return the number of rows in result set
                                                                $rowcount1 = mysqli_num_rows($result1);
                                                                echo $rowcount1;
                                                            }
                                                            ?><sup style="font-size: 20px"></sup></h3>
                                                        <p><?php echo $row['sub_name']; ?></p>
                                                    </div>
                                                    <div class="icon w-25">
                                                        <i class="<?php echo $row['sub_icon']; ?>"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-lg-4 col-sm-6 col-6">
                                                <div class="small-box" style="background-color: #<?php echo $row['sub_bg']; ?>;color:#<?php echo $row['font_color']; ?>">
                                                    <div class="inner text-center w-75">
                                                        <h3><?php
                                                            $sb_id = $row['id'];
                                                            $sql2 = "SELECT * FROM tasks where sub_id ='$sb_id'";
                                                            if ($result2 = mysqli_query($conn, $sql2)) {
                                                                // Return the number of rows in result set
                                                                $rowcount2 = mysqli_num_rows($result2);
                                                                echo $rowcount2;
                                                            }
                                                            ?><sup style="font-size: 20px"></sup></h3>
                                                        <p><?php echo $row['sub_name']; ?></p>
                                                    </div>
                                                    <div class="icon w-25">
                                                        <i class="<?php echo $row['sub_icon']; ?>"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        ?>

                                    <?php
                                        $c += 1;
                                    }
                                    ?>
                                </div>
                                <h4 class="p-3 m-2 bg-warning">تعداد مهام المعلمات</h4>
                                <table id="countTask_Table" class="activation table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width:40%">اسم المعلمة</th>
                                            <th style="width:20%">الصف</th>
                                            <th style="width:20%">المادة</th>
                                            <th class="text-center" style="width:20%;">عدد المهمات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $user_query = "SELECT * FROM user_form where user_type='teacher' order by id desc";
                                        $user_query_run = mysqli_query($conn, $user_query);
                                        if (mysqli_num_rows($user_query_run) > 0) {
                                            foreach ($user_query_run as $user) {
                                        ?>
                                                <tr>
                                                    <td><?= $user['name'] ?></td>
                                                    <td><?= $user['class_name'] ?></td>
                                                    <td><?= $user['subject_name'] ?></td>
                                                    <td class="text-center" style="display: flex;justify-content:center;vertical-align:middle">
                                                        <?php
                                                        $ts_id = $user['id'];
                                                        $sql1 = "SELECT * FROM tasks where teacher_id ='$ts_id'";
                                                        if ($result = mysqli_query($conn, $sql1)) {
                                                            // Return the number of rows in result set
                                                            $rowcount1 = mysqli_num_rows($result);
                                                        }
                                                        $sql2 = "SELECT * FROM m_tasks where teacher_id ='$ts_id'";
                                                        if ($result = mysqli_query($conn, $sql2)) {
                                                            // Return the number of rows in result set
                                                            $rowcount2 = mysqli_num_rows($result);
                                                        }
                                                        echo $rowcount1 + $rowcount2;
                                                        ?>

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
                        <?php if ($fetch['name']!= 'الموجهة الطلابية') {?>
                        <div class="tab-pane fade" id="mt" role="tabpanel" aria-labelledby="mt-tab">
                            <div class="card-body" id="">
                                <h4 class="p-3 m-2 bg-warning">المعلمة المتميزة لهذا الشهر</h4>
                                <form id="fav_teacher">
                                    <div class="row" style="display: flex;">
                                        <div class="modal-body p-4 col-6">
                                            <div id="errorMessage" class="alert alert-warning d-none"></div>
                                            <div class="mb-3">
                                                <p>اسم المعلمة</p>
                                                <input type="text" name="name" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="modal-footer col-3">
                                            <button type="submit" class="btn btn-primary " style="padding:10px 20px;line-height: 1rem;">حفظ</button>
                                        </div>
                                    </div>
                                </form>
                                <table id="favTeacher_Table" class="activation table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width:50%">اسم المعلمة</th>
                                            <th style="width:20%">العام</th>
                                            <th style="width:30%">الشهر</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $user_query = "SELECT * FROM fav order by id desc";
                                        $user_query_run = mysqli_query($conn, $user_query);
                                        if (mysqli_num_rows($user_query_run) > 0) {
                                            foreach ($user_query_run as $user) {
                                        ?>
                                                <tr>
                                                    <td><?= $user['name'] ?></td>
                                                    <td><?= $user['year'] ?></td>
                                                    <td><?= $user['month'] ?></td>
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
                        <?php }?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>