<form class="m-4" id="saveNeed">
    <div class="row">
        <div class="col-4 text-center">
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
        <div class="col-4 text-center">
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
        </div>
<!--         <script>
            var subjectObject = {
                "رياض الأطفال": {
                    "KG 1": [],
                    "KG 2": [],
                    "KG 3": []
                },
                "المرحلة الابتدائية": {
                    "الصف الأول": [],
                    "الصف الثاني": [],
                    "الصف الثالث": [],
                    "الصف الرابع": [],
                    "الصف الخامس": [],
                    "الصف السادس": []
                },
                "المرحلة المتوسطة": {
                    "الأول المتوسط": [],
                    "الثاني المتوسط": [],
                    "الثالث المتوسط": []
                },
                "المرحلة الثانوية": {
                    "الأول الثانوي": [],
                    "الثاني الثانوي": [],
                    "الثالث الثانوي": []
                }
            }
            window.onload = function() {
                var subjectSel = document.getElementById("level");
                var topicSel = document.getElementById("class");
                //   var chapterSel = document.getElementById("chapter");
                for (var x in subjectObject) {
                    subjectSel.options[subjectSel.options.length] = new Option(x, x);
                }
                subjectSel.onchange = function() {
                    //empty Chapters- and Topics- dropdowns
                    //     chapterSel.length = 1;
                    topicSel.length = 1;
                    //display correct values
                    for (var y in subjectObject[this.value]) {
                        topicSel.options[topicSel.options.length] = new Option(y, y);
                    }
                }
                /*   topicSel.onchange = function() {
                    //empty Chapters dropdown
                    chapterSel.length = 1;
                    //display correct values
                    var z = subjectObject[subjectSel.value][this.value];
                    for (var i = 0; i < z.length; i++) {
                      chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
                    }
                  } */
            }
        </script> -->
        <div class="col-4 text-center">
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
        </div>
    </div>
    <div class="row">
        <div class="col-4 text-center">
            <div class="form-group">
                <label for="term">الفصل الدراسي</label>
                <select class="form-control" name="term" id="term">
                    <option value="" selected>قم بالاختيار</option>
                    <option value="الفصل الأول">الفصل الأول</option>
                    <option value="الفصل الثاني">الفصل الثاني</option>
                    <option value="الفصل الثالث">الفصل الثالث</option>
                </select>
            </div>
        </div>
        <div class="col-4 text-center">
            <div class="form-group">
                <label for="gender">النوع</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="" selected>قم بالاختيار</option>
                    <option value="بنين">بنين</option>
                    <option value="بنات">بنات</option>
                </select>
            </div>
        </div>
        <div class="col-8 text-center">
            <div class="form-group">
                <label for="subject">المادة الدراسية</label>
                <select multiple class="form-control" name="subject[]" id="subject">
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
    </div>
    <div class="form-group d-flex">
        <input type="text" class="form-control text-center" name="comple" id="comple" placeholder="النصاب">
        <input type="text" class="form-control text-center" name="needCode" id="needCode" placeholder="كود معرف الاحتياج">
    </div>
    <div class="form-group d-flex justify-content-around">
        <button type="submit" name="addNeed" class="btn btn-primary" style="padding:10px 20px;line-height: 1rem;">تسجيل احتياج</button>
        <button type="button" id="genSub" class="btn btn-warning" style="display:none;padding:10px 20px;line-height: 1rem;">توليد الجدول</button>
        <script>
            /* function goSub() {
                var need_c = document.getElementById("needCode").value;
                Location.href ="http://localhost/sort/need_subjects.php?c=" + need_c;
            } */
            
        </script>
    </div>
</form>
<div class="row text-center">
    <div class="col-4">المواد الدراسية</div>
    <div class="col-2">عدد الحصص للصف</div>
    <div class="col-2">عدد الفصول</div>
    <div class="col-2">المجموع</div>
    <div class="col-2">اللازم</div>
</div>

<div class="m-3 text-center" id="generatedSubs" style="display:none">

</div>

