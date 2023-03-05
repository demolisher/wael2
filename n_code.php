<?php
ob_start();
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}
?>
<?php
$select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('فشل الاستعلام من بيانات الخادم');
if (mysqli_num_rows($select) > 0) {
    $fetch = mysqli_fetch_assoc($select);
}

?>
<?php

if (isset($_POST['update_student'])) {
    $compound = mysqli_real_escape_string($conn, $_POST['compound']);
    $path = mysqli_real_escape_string($conn, $_POST["path"]);
    $level = mysqli_real_escape_string($conn, $_POST["level"]);
    $term = mysqli_real_escape_string($conn, $_POST["term"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $comple = mysqli_real_escape_string($conn, $_POST["comple"]);
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $select_compound = mysqli_query($conn, "SELECT * FROM `compounds` WHERE compound = '$compound'") or die('فشل الاستعلام من بيانات الخادم');
    if (mysqli_num_rows($select_compound) > 0) {
        $sl_compound = mysqli_fetch_assoc($select_compound);
    }

    $select_path = mysqli_query($conn, "SELECT * FROM `paths` WHERE path = '$path'") or die('فشل الاستعلام من بيانات الخادم');
    if (mysqli_num_rows($select_path) > 0) {
        $sl_path = mysqli_fetch_assoc($select_path);
    }

    $select_level = mysqli_query($conn, "SELECT * FROM `levels` WHERE level = '$level'") or die('فشل الاستعلام من بيانات الخادم');
    if (mysqli_num_rows($select_level) > 0) {
        $sl_level = mysqli_fetch_assoc($select_level);
    }

    $select_gender = mysqli_query($conn, "SELECT * FROM `genders` WHERE gender = '$gender'") or die('فشل الاستعلام من بيانات الخادم');
    if (mysqli_num_rows($select_gender) > 0) {
        $sl_gender = mysqli_fetch_assoc($select_gender);
    }
    $select_term = mysqli_query($conn, "SELECT * FROM `term` WHERE term = '$term'") or die('فشل الاستعلام من بيانات الخادم');
    if (mysqli_num_rows($select_term) > 0) {
        $sl_term = mysqli_fetch_assoc($select_term);
    }

    $needCode = $sl_compound['id'] . "-" . $sl_path['id'] . "-" . $sl_level['id'] . "-" . $sl_gender['id']. "-" . $sl_term['id'];

    $select_need = mysqli_query($conn, "SELECT * FROM `needs` WHERE need_code = '$needCode'") or die('فشل الاستعلام من بيانات الخادم');
    if (mysqli_num_rows($select_need) > 0) {
        $res = [
            'status' => 302,
            'message' => 'الاحتياج هذا مسجل مسبقًا ... يرجى مراجعة الجدول'
        ];
        echo json_encode($res);
        return;
    } else {

        if ($compound == NULL || $path == NULL || $level == NULL || $term == NULL || $gender == NULL || $comple == NULL || $needCode == NULL) {
            $res = [
                'status' => 422,
                'message' => ' الحقول مطلوبة!'
            ];
            echo json_encode($res);
            return;
        }
        $query = "UPDATE needs SET compound='$compound', path='$path', level='$level', term='$term', gender='$gender', need_code='$needCode', comple='$comple' 
                WHERE id='$student_id'";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $res = [
                'status' => 200,
                'message' => 'تم تحديث معلومات الاحتياج'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'لم يتم تحديث المعلومات لخطأ ما!'
            ];
            echo json_encode($res);
            return;
        }
    }
}

if (isset($_GET['student_id'])) {
    $student_id = mysqli_real_escape_string($conn, $_GET['student_id']);

    $query = "SELECT * FROM needs WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'تم جلب البيانات بنجاح',
            'data' => $student
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'مهمة غير معرفة'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

    $query = "DELETE FROM needs WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'تم حذف الاحتياج بنجاح'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'لم ينجح حذف الاحتياج!'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['save_student'])) {
    $compound = mysqli_real_escape_string($conn, $_POST['compound']);
    $path = mysqli_real_escape_string($conn, $_POST["path"]);
    $level = mysqli_real_escape_string($conn, $_POST["level"]);
    $term = mysqli_real_escape_string($conn, $_POST["term"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $comple = mysqli_real_escape_string($conn, $_POST["comple"]);

    $select_compound = mysqli_query($conn, "SELECT * FROM `compounds` WHERE compound = '$compound'") or die('فشل الاستعلام من بيانات الخادم');
    if (mysqli_num_rows($select_compound) > 0) {
        $sl_compound = mysqli_fetch_assoc($select_compound);
    }

    $select_path = mysqli_query($conn, "SELECT * FROM `paths` WHERE path = '$path'") or die('فشل الاستعلام من بيانات الخادم');
    if (mysqli_num_rows($select_path) > 0) {
        $sl_path = mysqli_fetch_assoc($select_path);
    }

    $select_level = mysqli_query($conn, "SELECT * FROM `levels` WHERE level = '$level'") or die('فشل الاستعلام من بيانات الخادم');
    if (mysqli_num_rows($select_level) > 0) {
        $sl_level = mysqli_fetch_assoc($select_level);
    }

    $select_gender = mysqli_query($conn, "SELECT * FROM `genders` WHERE gender = '$gender'") or die('فشل الاستعلام من بيانات الخادم');
    if (mysqli_num_rows($select_gender) > 0) {
        $sl_gender = mysqli_fetch_assoc($select_gender);
    }
    
    $select_term = mysqli_query($conn, "SELECT * FROM `term` WHERE term = '$term'") or die('فشل الاستعلام من بيانات الخادم');
    if (mysqli_num_rows($select_term) > 0) {
        $sl_term = mysqli_fetch_assoc($select_term);
    }

    $needCode = $sl_compound['id'] . "-" . $sl_path['id'] . "-" . $sl_level['id'] . "-" . $sl_gender['id']. "-" . $sl_term['id'];

    $select_need = mysqli_query($conn, "SELECT * FROM `needs` WHERE need_code = '$needCode'") or die('فشل الاستعلام من بيانات الخادم');
    if (mysqli_num_rows($select_need) > 0) {
        $res = [
            'status' => 302,
            'message' => 'الاحتياج هذا مسجل مسبقًا ... يرجى مراجعة الجدول'
        ];
        echo json_encode($res);
        return;
    } else {

        if ($compound == NULL || $path == NULL || $level == NULL || $term == NULL || $gender == NULL || $comple == NULL || $needCode == NULL) {
            $res = [
                'status' => 422,
                'message' => ' الحقول مطلوبة!'
            ];
            echo json_encode($res);
            return;
        }
        $query = "INSERT INTO needs (compound, path, level, term, gender, comple, need_code) VALUES ('$compound', '$path', '$level', '$term', '$gender','$comple','$needCode')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $res = [
                'status' => 200,
                'message' => 'تم إدخال الاحتياج بنجاح!'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'لم يتم إنشاء الاحتياج بشكل صحيح!'
            ];
            echo json_encode($res);
            return;
        }
    }
}

?>