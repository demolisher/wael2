<?php
$needCode = $_GET['c'];
$select = mysqli_query($conn, "SELECT * FROM `needs` WHERE need_code = '$needCode'") or die('فشل الاستعلام من بيانات الخادم');
if (mysqli_num_rows($select) > 0) {
    $fetch = mysqli_fetch_assoc($select);
    $string = $fetch['subjects'];
    $str_arr = explode(",", $string);
}
?>
<form class="m-4">
    <div class="row">
        <div class="col-4 text-center">
            <div class="form-group">

                <label for="compound">المجمع التعليمي</label>
                <select style="font-size:0.75rem !important" readonly class="form-control" id="compound" name="compound" value="<?php echo $fetch['compound']; ?>">
                    <option value="<?php echo $fetch['compound']; ?>"><?php echo $fetch['compound']; ?></option>
                </select>
            </div>
        </div>
        <div class="col-4 text-center">
            <div class="form-group">
                <label for="path">المسار التعليمي</label>
                <select style="font-size:0.75rem !important" readonly class="form-control" name="path" id="path">
                    <option value="<?php echo $fetch['path']; ?>"><?php echo $fetch['path']; ?></option>
                </select>
            </div>
        </div>
        <div class="col-4 text-center">
            <div class="form-group">
                <label for="level">المرحلة التعليمية</label>
                <select style="font-size:0.75rem !important" readonly class="form-control" name="level" id="level">
                    <option value="<?php echo $fetch['level']; ?>"><?php echo $fetch['level']; ?></option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- <div class="col-4 text-center">
            <div class="form-group">
                <label for="class">الصف الدراسي</label>
                <select style="font-size:0.75rem !important" readonly class="form-control" name="class" id="class">
                    <option value="<?php echo $fetch['class']; ?>"><?php echo $fetch['class']; ?></option>
                </select>
            </div>
        </div> -->
        <div class="col-4 text-center">
            <div class="form-group">
                <label for="gender">النوع</label>
                <select style="font-size:0.75rem !important" readonly class="form-control" name="gender" id="gender">
                    <option value="<?php echo $fetch['gender']; ?>"><?php echo $fetch['gender']; ?></option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group d-flex">
        <div class="col-6 text-center">
            <label for="comple">النصاب</label>
            <input readonly type="text" class="form-control text-center" name="comple" value="<?php echo $fetch['comple']; ?>" id="comple" placeholder="النصاب">
        </div>
        <div class="col-6 text-center">
            <label for="needCode">كود الاحتياج</label>
            <input readonly type="text" class="form-control text-center" name="needCode" value="<?php echo $fetch['need_code']; ?>" id="needCode" placeholder="كود معرف الاحتياج">
        </div>
    </div>
    <?php if ($fetch['level'] == 'المرحلة الابتدائية') { ?>
        <h1>الفصل الأول الابتدائي</h1><br>
        <div class="row m-3 text-center d-flex justify-content-between">

            <div class="text-center" style="width: 33%">المواد الدراسية</div>
            <div class="text-center" style="width: 16%">عدد الحصص للصف</div>
            <div class="text-center" style="width: 16%">عدد الفصول</div>
            <div class="text-center" style="width: 16%">المجموع</div>
            <div class="text-center" style="width: 16%">اللازم</div>
        </div>

        <div id="container1">
            <?php foreach ($str_arr as $sub) {
                $c = 1 ?>
                <div class="row m-3 text-center d-flex justify-content-between">
                    <input readonly type="text" class="child form-control text-center" placeholder="" value="<?php echo $sub; ?>" style="width: 33%;">
                    <input type="text" class="child form-control text-center lecNum1" placeholder="" style="width: 16%;">
                    <input type="text" class="child form-control text-center clsNum1" placeholder="" style="width: 16%;">
                    <input readonly type="text" class="result form-control text-center tot1" placeholder="" style="width: 16%;">
                    <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center need1" placeholder="" style="width: 16%;">
                </div>
            <?php $c = $c + 1;
            }
            ?>
        </div>
        <div class="row m-3 text-center d-flex justify-content-between">
            <input readonly type="text" class="child form-control text-center" placeholder="" value="المجموع" style="width: 33%;">
            <input readonly type="text" class="child form-control text-center" id="total_lecNum1" placeholder="" style="width: 16%;">
            <input readonly type="text" class="child form-control text-center" id="total_clsNum1" placeholder="" style="width: 16%;">
            <input readonly type="text" class="result form-control text-center" id="total_tot1" placeholder="" style="width: 16%;">
            <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center" id="total_need1" placeholder="" style="width: 16%;">
        </div>

        <h1>الفصل الثاني الابتدائي</h1><br>
        <div class="row m-3 text-center d-flex justify-content-between">

            <div class="text-center" style="width: 33%">المواد الدراسية</div>
            <div class="text-center" style="width: 16%">عدد الحصص للصف</div>
            <div class="text-center" style="width: 16%">عدد الفصول</div>
            <div class="text-center" style="width: 16%">المجموع</div>
            <div class="text-center" style="width: 16%">اللازم</div>
        </div>

        <div id="container2">
            <?php foreach ($str_arr as $sub) {
                $c = 1 ?>
                <div class="row m-3 text-center d-flex justify-content-between">
                    <input readonly type="text" class="child form-control text-center" placeholder="" value="<?php echo $sub; ?>" style="width: 33%;">
                    <input type="text" class="child form-control text-center lecNum2" placeholder="" style="width: 16%;">
                    <input type="text" class="child form-control text-center clsNum2" placeholder="" style="width: 16%;">
                    <input readonly type="text" class="result form-control text-center tot2" placeholder="" style="width: 16%;">
                    <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center need2" placeholder="" style="width: 16%;">
                </div>
            <?php $c = $c + 1;
            }
            ?>
        </div>
        <div class="row m-3 text-center d-flex justify-content-between">
            <input readonly type="text" class="child form-control text-center" placeholder="" value="المجموع" style="width: 33%;">
            <input readonly type="text" class="child form-control text-center" id="total_lecNum2" placeholder="" style="width: 16%;">
            <input readonly type="text" class="child form-control text-center" id="total_clsNum2" placeholder="" style="width: 16%;">
            <input readonly type="text" class="result form-control text-center" id="total_tot2" placeholder="" style="width: 16%;">
            <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center" id="total_need2" placeholder="" style="width: 16%;">
        </div>

        <h1>الفصل الثالث الابتدائي</h1><br>
        <div class="row m-3 text-center d-flex justify-content-between">

            <div class="text-center" style="width: 33%">المواد الدراسية</div>
            <div class="text-center" style="width: 16%">عدد الحصص للصف</div>
            <div class="text-center" style="width: 16%">عدد الفصول</div>
            <div class="text-center" style="width: 16%">المجموع</div>
            <div class="text-center" style="width: 16%">اللازم</div>
        </div>

        <div id="container3">
            <?php foreach ($str_arr as $sub) {
                $c = 1 ?>
                <div class="row m-3 text-center d-flex justify-content-between">
                    <input readonly type="text" class="child form-control text-center" placeholder="" value="<?php echo $sub; ?>" style="width: 33%;">
                    <input type="text" class="child form-control text-center lecNum3" placeholder="" style="width: 16%;">
                    <input type="text" class="child form-control text-center clsNum3" placeholder="" style="width: 16%;">
                    <input readonly type="text" class="result form-control text-center tot3" placeholder="" style="width: 16%;">
                    <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center need3" placeholder="" style="width: 16%;">
                </div>
            <?php $c = $c + 1;
            }
            ?>
        </div>
        <div class="row m-3 text-center d-flex justify-content-between">
            <input readonly type="text" class="child form-control text-center" placeholder="" value="المجموع" style="width: 33%;">
            <input readonly type="text" class="child form-control text-center" id="total_lecNum3" placeholder="" style="width: 16%;">
            <input readonly type="text" class="child form-control text-center" id="total_clsNum3" placeholder="" style="width: 16%;">
            <input readonly type="text" class="result form-control text-center" id="total_tot3" placeholder="" style="width: 16%;">
            <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center" id="total_need3" placeholder="" style="width: 16%;">
        </div>

        <h1>الفصل الرابع الابتدائي</h1><br>
        <div class="row m-3 text-center d-flex justify-content-between">

            <div class="text-center" style="width: 33%">المواد الدراسية</div>
            <div class="text-center" style="width: 16%">عدد الحصص للصف</div>
            <div class="text-center" style="width: 16%">عدد الفصول</div>
            <div class="text-center" style="width: 16%">المجموع</div>
            <div class="text-center" style="width: 16%">اللازم</div>
        </div>

        <div id="container4">
            <?php foreach ($str_arr as $sub) {
                $c = 1 ?>
                <div class="row m-3 text-center d-flex justify-content-between">
                    <input readonly type="text" class="child form-control text-center" placeholder="" value="<?php echo $sub; ?>" style="width: 33%;">
                    <input type="text" class="child form-control text-center lecNum4" placeholder="" style="width: 16%;">
                    <input type="text" class="child form-control text-center clsNum4" placeholder="" style="width: 16%;">
                    <input readonly type="text" class="result form-control text-center tot4" placeholder="" style="width: 16%;">
                    <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center need4" placeholder="" style="width: 16%;">
                </div>
            <?php $c = $c + 1;
            }
            ?>
        </div>
        <div class="row m-3 text-center d-flex justify-content-between">
            <input readonly type="text" class="child form-control text-center" placeholder="" value="المجموع" style="width: 33%;">
            <input readonly type="text" class="child form-control text-center" id="total_lecNum4" placeholder="" style="width: 16%;">
            <input readonly type="text" class="child form-control text-center" id="total_clsNum4" placeholder="" style="width: 16%;">
            <input readonly type="text" class="result form-control text-center" id="total_tot4" placeholder="" style="width: 16%;">
            <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center" id="total_need4" placeholder="" style="width: 16%;">
        </div>

        <h1>الفصل الخامس الابتدائي</h1><br>
        <div class="row m-3 text-center d-flex justify-content-between">

            <div class="text-center" style="width: 33%">المواد الدراسية</div>
            <div class="text-center" style="width: 16%">عدد الحصص للصف</div>
            <div class="text-center" style="width: 16%">عدد الفصول</div>
            <div class="text-center" style="width: 16%">المجموع</div>
            <div class="text-center" style="width: 16%">اللازم</div>
        </div>

        <div id="container5">
            <?php foreach ($str_arr as $sub) {
                $c = 1 ?>
                <div class="row m-3 text-center d-flex justify-content-between">
                    <input readonly type="text" class="child form-control text-center" placeholder="" value="<?php echo $sub; ?>" style="width: 33%;">
                    <input type="text" class="child form-control text-center lecNum5" placeholder="" style="width: 16%;">
                    <input type="text" class="child form-control text-center clsNum5" placeholder="" style="width: 16%;">
                    <input readonly type="text" class="result form-control text-center tot5" placeholder="" style="width: 16%;">
                    <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center need5" placeholder="" style="width: 16%;">
                </div>
            <?php $c = $c + 1;
            }
            ?>
        </div>
        <div class="row m-3 text-center d-flex justify-content-between">
            <input readonly type="text" class="child form-control text-center" placeholder="" value="المجموع" style="width: 33%;">
            <input readonly type="text" class="child form-control text-center" id="total_lecNum5" placeholder="" style="width: 16%;">
            <input readonly type="text" class="child form-control text-center" id="total_clsNum5" placeholder="" style="width: 16%;">
            <input readonly type="text" class="result form-control text-center" id="total_tot5" placeholder="" style="width: 16%;">
            <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center" id="total_need5" placeholder="" style="width: 16%;">
        </div>

        <h1>الفصل السادس الابتدائي</h1><br>
        <div class="row m-3 text-center d-flex justify-content-between">

            <div class="text-center" style="width: 33%">المواد الدراسية</div>
            <div class="text-center" style="width: 16%">عدد الحصص للصف</div>
            <div class="text-center" style="width: 16%">عدد الفصول</div>
            <div class="text-center" style="width: 16%">المجموع</div>
            <div class="text-center" style="width: 16%">اللازم</div>
        </div>

        <div id="container6">
            <?php foreach ($str_arr as $sub) {
                $c = 1 ?>
                <div class="row m-3 text-center d-flex justify-content-between">
                    <input readonly type="text" class="child form-control text-center" placeholder="" value="<?php echo $sub; ?>" style="width: 33%;">
                    <input type="text" class="child form-control text-center lecNum6" placeholder="" style="width: 16%;">
                    <input type="text" class="child form-control text-center clsNum6" placeholder="" style="width: 16%;">
                    <input readonly type="text" class="result form-control text-center tot6" placeholder="" style="width: 16%;">
                    <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center need6" placeholder="" style="width: 16%;">
                </div>
            <?php $c = $c + 1;
            }
            ?>
        </div>
        <div class="row m-3 text-center d-flex justify-content-between">
            <input readonly type="text" class="child form-control text-center" placeholder="" value="المجموع" style="width: 33%;">
            <input readonly type="text" class="child form-control text-center" id="total_lecNum6" placeholder="" style="width: 16%;">
            <input readonly type="text" class="child form-control text-center" id="total_clsNum6" placeholder="" style="width: 16%;">
            <input readonly type="text" class="result form-control text-center" id="total_tot6" placeholder="" style="width: 16%;">
            <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center" id="total_need6" placeholder="" style="width: 16%;">
        </div>

    <?php } ?>

    <?php if ($fetch['level'] == 'المرحلة المتوسطة') { ?>
        <h1>الفصل الأول المتوسط</h1><br>
        <div class="row m-3 text-center d-flex justify-content-between">

            <div class="text-center" style="width: 33%">المواد الدراسية</div>
            <div class="text-center" style="width: 16%">عدد الحصص للصف</div>
            <div class="text-center" style="width: 16%">عدد الفصول</div>
            <div class="text-center" style="width: 16%">المجموع</div>
            <div class="text-center" style="width: 16%">اللازم</div>
        </div>

        <div id="container1">
            <?php foreach ($str_arr as $sub) {
                $c = 1 ?>
                <div class="row m-3 text-center d-flex justify-content-between">
                    <input readonly type="text" class="child form-control text-center" placeholder="" value="<?php echo $sub; ?>" style="width: 33%;">
                    <input type="text" class="child form-control text-center lecNum1" placeholder="" style="width: 16%;">
                    <input type="text" class="child form-control text-center clsNum1" placeholder="" style="width: 16%;">
                    <input readonly type="text" class="result form-control text-center tot1" placeholder="" style="width: 16%;">
                    <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center need1" placeholder="" style="width: 16%;">
                </div>
            <?php $c = $c + 1;
            }
            ?>
        </div>
        <div class="row m-3 text-center d-flex justify-content-between">
            <input readonly type="text" class="child form-control text-center" placeholder="" value="المجموع" style="width: 33%;">
            <input readonly type="text" class="child form-control text-center" id="total_lecNum1" placeholder="" style="width: 16%;">
            <input readonly type="text" class="child form-control text-center" id="total_clsNum1" placeholder="" style="width: 16%;">
            <input readonly type="text" class="result form-control text-center" id="total_tot1" placeholder="" style="width: 16%;">
            <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center" id="total_need1" placeholder="" style="width: 16%;">
        </div>

        <h1>الفصل الثاني المتوسط</h1><br>
        <div class="row m-3 text-center d-flex justify-content-between">

            <div class="text-center" style="width: 33%">المواد الدراسية</div>
            <div class="text-center" style="width: 16%">عدد الحصص للصف</div>
            <div class="text-center" style="width: 16%">عدد الفصول</div>
            <div class="text-center" style="width: 16%">المجموع</div>
            <div class="text-center" style="width: 16%">اللازم</div>
        </div>

        <div id="container2">
            <?php foreach ($str_arr as $sub) {
                $c = 1 ?>
                <div class="row m-3 text-center d-flex justify-content-between">
                    <input readonly type="text" class="child form-control text-center" placeholder="" value="<?php echo $sub; ?>" style="width: 33%;">
                    <input type="text" class="child form-control text-center lecNum2" placeholder="" style="width: 16%;">
                    <input type="text" class="child form-control text-center clsNum2" placeholder="" style="width: 16%;">
                    <input readonly type="text" class="result form-control text-center tot2" placeholder="" style="width: 16%;">
                    <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center need2" placeholder="" style="width: 16%;">
                </div>
            <?php $c = $c + 1;
            }
            ?>
        </div>
        <div class="row m-3 text-center d-flex justify-content-between">
            <input readonly type="text" class="child form-control text-center" placeholder="" value="المجموع" style="width: 33%;">
            <input readonly type="text" class="child form-control text-center" id="total_lecNum2" placeholder="" style="width: 16%;">
            <input readonly type="text" class="child form-control text-center" id="total_clsNum2" placeholder="" style="width: 16%;">
            <input readonly type="text" class="result form-control text-center" id="total_tot2" placeholder="" style="width: 16%;">
            <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center" id="total_need2" placeholder="" style="width: 16%;">
        </div>

        <h1>الفصل الثالث المتوسط</h1><br>
        <div class="row m-3 text-center d-flex justify-content-between">

            <div class="text-center" style="width: 33%">المواد الدراسية</div>
            <div class="text-center" style="width: 16%">عدد الحصص للصف</div>
            <div class="text-center" style="width: 16%">عدد الفصول</div>
            <div class="text-center" style="width: 16%">المجموع</div>
            <div class="text-center" style="width: 16%">اللازم</div>
        </div>

        <div id="container3">
            <?php foreach ($str_arr as $sub) {
                $c = 1 ?>
                <div class="row m-3 text-center d-flex justify-content-between">
                    <input readonly type="text" class="child form-control text-center" placeholder="" value="<?php echo $sub; ?>" style="width: 33%;">
                    <input type="text" class="child form-control text-center lecNum3" placeholder="" style="width: 16%;">
                    <input type="text" class="child form-control text-center clsNum3" placeholder="" style="width: 16%;">
                    <input readonly type="text" class="result form-control text-center tot3" placeholder="" style="width: 16%;">
                    <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center need3" placeholder="" style="width: 16%;">
                </div>
            <?php $c = $c + 1;
            }
            ?>
        </div>
        <div class="row m-3 text-center d-flex justify-content-between">
            <input readonly type="text" class="child form-control text-center" placeholder="" value="المجموع" style="width: 33%;">
            <input readonly type="text" class="child form-control text-center" id="total_lecNum3" placeholder="" style="width: 16%;">
            <input readonly type="text" class="child form-control text-center" id="total_clsNum3" placeholder="" style="width: 16%;">
            <input readonly type="text" class="result form-control text-center" id="total_tot3" placeholder="" style="width: 16%;">
            <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center" id="total_need3" placeholder="" style="width: 16%;">
        </div>


    <?php } ?>

    <?php if ($fetch['level'] == 'المرحلة الثانوية') { ?>
        <h1>الفصل الأول الثانوي</h1><br>
        <div class="row m-3 text-center d-flex justify-content-between">

            <div class="text-center" style="width: 33%">المواد الدراسية</div>
            <div class="text-center" style="width: 16%">عدد الحصص للصف</div>
            <div class="text-center" style="width: 16%">عدد الفصول</div>
            <div class="text-center" style="width: 16%">المجموع</div>
            <div class="text-center" style="width: 16%">اللازم</div>
        </div>

        <div id="container1">
            <?php foreach ($str_arr as $sub) {
                $c = 1 ?>
                <div class="row m-3 text-center d-flex justify-content-between">
                    <input readonly type="text" class="child form-control text-center" placeholder="" value="<?php echo $sub; ?>" style="width: 33%;">
                    <input type="text" class="child form-control text-center lecNum1" placeholder="" style="width: 16%;">
                    <input type="text" class="child form-control text-center clsNum1" placeholder="" style="width: 16%;">
                    <input readonly type="text" class="result form-control text-center tot1" placeholder="" style="width: 16%;">
                    <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center need1" placeholder="" style="width: 16%;">
                </div>
            <?php $c = $c + 1;
            }
            ?>
        </div>
        <div class="row m-3 text-center d-flex justify-content-between">
            <input readonly type="text" class="child form-control text-center" placeholder="" value="المجموع" style="width: 33%;">
            <input readonly type="text" class="child form-control text-center" id="total_lecNum1" placeholder="" style="width: 16%;">
            <input readonly type="text" class="child form-control text-center" id="total_clsNum1" placeholder="" style="width: 16%;">
            <input readonly type="text" class="result form-control text-center" id="total_tot1" placeholder="" style="width: 16%;">
            <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center" id="total_need1" placeholder="" style="width: 16%;">
        </div>

        <h1>الفصل الثاني الثانوي</h1><br>
        <div class="row m-3 text-center d-flex justify-content-between">

            <div class="text-center" style="width: 33%">المواد الدراسية</div>
            <div class="text-center" style="width: 16%">عدد الحصص للصف</div>
            <div class="text-center" style="width: 16%">عدد الفصول</div>
            <div class="text-center" style="width: 16%">المجموع</div>
            <div class="text-center" style="width: 16%">اللازم</div>
        </div>

        <div id="container2">
            <?php foreach ($str_arr as $sub) {
                $c = 1 ?>
                <div class="row m-3 text-center d-flex justify-content-between">
                    <input readonly type="text" class="child form-control text-center" placeholder="" value="<?php echo $sub; ?>" style="width: 33%;">
                    <input type="text" class="child form-control text-center lecNum2" placeholder="" style="width: 16%;">
                    <input type="text" class="child form-control text-center clsNum2" placeholder="" style="width: 16%;">
                    <input readonly type="text" class="result form-control text-center tot2" placeholder="" style="width: 16%;">
                    <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center need2" placeholder="" style="width: 16%;">
                </div>
            <?php $c = $c + 1;
            }
            ?>
        </div>
        <div class="row m-3 text-center d-flex justify-content-between">
            <input readonly type="text" class="child form-control text-center" placeholder="" value="المجموع" style="width: 33%;">
            <input readonly type="text" class="child form-control text-center" id="total_lecNum2" placeholder="" style="width: 16%;">
            <input readonly type="text" class="child form-control text-center" id="total_clsNum2" placeholder="" style="width: 16%;">
            <input readonly type="text" class="result form-control text-center" id="total_tot2" placeholder="" style="width: 16%;">
            <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center" id="total_need2" placeholder="" style="width: 16%;">
        </div>

        <h1>الفصل الثالث الثانوي</h1><br>
        <div class="row m-3 text-center d-flex justify-content-between">

            <div class="text-center" style="width: 33%">المواد الدراسية</div>
            <div class="text-center" style="width: 16%">عدد الحصص للصف</div>
            <div class="text-center" style="width: 16%">عدد الفصول</div>
            <div class="text-center" style="width: 16%">المجموع</div>
            <div class="text-center" style="width: 16%">اللازم</div>
        </div>

        <div id="container3">
            <?php foreach ($str_arr as $sub) {
                $c = 1 ?>
                <div class="row m-3 text-center d-flex justify-content-between">
                    <input readonly type="text" class="child form-control text-center" placeholder="" value="<?php echo $sub; ?>" style="width: 33%;">
                    <input type="text" class="child form-control text-center lecNum3" placeholder="" style="width: 16%;">
                    <input type="text" class="child form-control text-center clsNum3" placeholder="" style="width: 16%;">
                    <input readonly type="text" class="result form-control text-center tot3" placeholder="" style="width: 16%;">
                    <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center need3" placeholder="" style="width: 16%;">
                </div>
            <?php $c = $c + 1;
            }
            ?>
        </div>
        <div class="row m-3 text-center d-flex justify-content-between">
            <input readonly type="text" class="child form-control text-center" placeholder="" value="المجموع" style="width: 33%;">
            <input readonly type="text" class="child form-control text-center" id="total_lecNum3" placeholder="" style="width: 16%;">
            <input readonly type="text" class="child form-control text-center" id="total_clsNum3" placeholder="" style="width: 16%;">
            <input readonly type="text" class="result form-control text-center" id="total_tot3" placeholder="" style="width: 16%;">
            <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center" id="total_need3" placeholder="" style="width: 16%;">
        </div>


    <?php } ?>

    <?php if ($fetch['level'] == 'رياض الأطفال') { ?>
        <h1>KG - 1</h1><br>
        <div class="row m-3 text-center d-flex justify-content-between">

            <div class="text-center" style="width: 33%">المواد الدراسية</div>
            <div class="text-center" style="width: 16%">عدد الحصص للصف</div>
            <div class="text-center" style="width: 16%">عدد الفصول</div>
            <div class="text-center" style="width: 16%">المجموع</div>
            <div class="text-center" style="width: 16%">اللازم</div>
        </div>

        <div id="container1">
            <?php foreach ($str_arr as $sub) {
                $c = 1 ?>
                <div class="row m-3 text-center d-flex justify-content-between">
                    <input readonly type="text" class="child form-control text-center" placeholder="" value="<?php echo $sub; ?>" style="width: 33%;">
                    <input type="text" class="child form-control text-center lecNum1" placeholder="" style="width: 16%;">
                    <input type="text" class="child form-control text-center clsNum1" placeholder="" style="width: 16%;">
                    <input readonly type="text" class="result form-control text-center tot1" placeholder="" style="width: 16%;">
                    <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center need1" placeholder="" style="width: 16%;">
                </div>
            <?php $c = $c + 1;
            }
            ?>
        </div>
        <div class="row m-3 text-center d-flex justify-content-between">
            <input readonly type="text" class="child form-control text-center" placeholder="" value="المجموع" style="width: 33%;">
            <input readonly type="text" class="child form-control text-center" id="total_lecNum1" placeholder="" style="width: 16%;">
            <input readonly type="text" class="child form-control text-center" id="total_clsNum1" placeholder="" style="width: 16%;">
            <input readonly type="text" class="result form-control text-center" id="total_tot1" placeholder="" style="width: 16%;">
            <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center" id="total_need1" placeholder="" style="width: 16%;">
        </div>

        <h1>KG - 2</h1><br>
        <div class="row m-3 text-center d-flex justify-content-between">

            <div class="text-center" style="width: 33%">المواد الدراسية</div>
            <div class="text-center" style="width: 16%">عدد الحصص للصف</div>
            <div class="text-center" style="width: 16%">عدد الفصول</div>
            <div class="text-center" style="width: 16%">المجموع</div>
            <div class="text-center" style="width: 16%">اللازم</div>
        </div>

        <div id="container2">
            <?php foreach ($str_arr as $sub) {
                $c = 1 ?>
                <div class="row m-3 text-center d-flex justify-content-between">
                    <input readonly type="text" class="child form-control text-center" placeholder="" value="<?php echo $sub; ?>" style="width: 33%;">
                    <input type="text" class="child form-control text-center lecNum2" placeholder="" style="width: 16%;">
                    <input type="text" class="child form-control text-center clsNum2" placeholder="" style="width: 16%;">
                    <input readonly type="text" class="result form-control text-center tot2" placeholder="" style="width: 16%;">
                    <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center need2" placeholder="" style="width: 16%;">
                </div>
            <?php $c = $c + 1;
            }
            ?>
        </div>
        <div class="row m-3 text-center d-flex justify-content-between">
            <input readonly type="text" class="child form-control text-center" placeholder="" value="المجموع" style="width: 33%;">
            <input readonly type="text" class="child form-control text-center" id="total_lecNum2" placeholder="" style="width: 16%;">
            <input readonly type="text" class="child form-control text-center" id="total_clsNum2" placeholder="" style="width: 16%;">
            <input readonly type="text" class="result form-control text-center" id="total_tot2" placeholder="" style="width: 16%;">
            <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center" id="total_need2" placeholder="" style="width: 16%;">
        </div>

        <h1>KG - 3</h1><br>
        <div class="row m-3 text-center d-flex justify-content-between">

            <div class="text-center" style="width: 33%">المواد الدراسية</div>
            <div class="text-center" style="width: 16%">عدد الحصص للصف</div>
            <div class="text-center" style="width: 16%">عدد الفصول</div>
            <div class="text-center" style="width: 16%">المجموع</div>
            <div class="text-center" style="width: 16%">اللازم</div>
        </div>

        <div id="container3">
            <?php foreach ($str_arr as $sub) {
                $c = 1 ?>
                <div class="row m-3 text-center d-flex justify-content-between">
                    <input readonly type="text" class="child form-control text-center" placeholder="" value="<?php echo $sub; ?>" style="width: 33%;">
                    <input type="text" class="child form-control text-center lecNum3" placeholder="" style="width: 16%;">
                    <input type="text" class="child form-control text-center clsNum3" placeholder="" style="width: 16%;">
                    <input readonly type="text" class="result form-control text-center tot3" placeholder="" style="width: 16%;">
                    <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center need3" placeholder="" style="width: 16%;">
                </div>
            <?php $c = $c + 1;
            }
            ?>
        </div>
        <div class="row m-3 text-center d-flex justify-content-between">
            <input readonly type="text" class="child form-control text-center" placeholder="" value="المجموع" style="width: 33%;">
            <input readonly type="text" class="child form-control text-center" id="total_lecNum3" placeholder="" style="width: 16%;">
            <input readonly type="text" class="child form-control text-center" id="total_clsNum3" placeholder="" style="width: 16%;">
            <input readonly type="text" class="result form-control text-center" id="total_tot3" placeholder="" style="width: 16%;">
            <input pattern="^\d*(\.\d{0,2})?$" readonly type="text" class="result form-control text-center" id="total_need3" placeholder="" style="width: 16%;">
        </div>


    <?php } ?>

    <div class="form-group d-flex justify-content-around">
        <button type="button" name="" class="btn btn-primary" style="padding:10px 20px;line-height: 1rem;">اعتماد الاحتياج</button>
    </div>
</form>