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
if (isset($_POST['save_student'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $nationality = mysqli_real_escape_string($conn, $_POST["nationality"]);
    $speciality = mysqli_real_escape_string($conn, $_POST["speciality"]);
    $lvl = isset($_POST['level']) && is_array($_POST['level']) ? $_POST['level'] : [];
    $level = implode(',', $lvl);
    $subject1 = mysqli_real_escape_string($conn, $_POST["subject1"]);
    $subject2 = mysqli_real_escape_string($conn, $_POST["subject2"]);
    $subject3 = mysqli_real_escape_string($conn, $_POST["subject3"]);
    $clsNumber1 = (int)mysqli_real_escape_string($conn, $_POST["clsNumber1"]);
    $clsNumber2 = (int)mysqli_real_escape_string($conn, $_POST["clsNumber2"]);
    $clsNumber3 = (int)mysqli_real_escape_string($conn, $_POST["clsNumber3"]);
    $comple = $clsNumber1 + $clsNumber2 + $clsNumber3;

    if ($name == NULL || $nationality == NULL || $speciality == NULL || $subject1 == NULL || $clsNumber1 == NULL) {
        $res = [
            'status' => 422,
            'message' => ' الحقول مطلوبة!'
        ];
        echo json_encode($res);
        return;
    }
    $query = "INSERT INTO teachers (name, nationality, speciality, level, subject1, subject2, subject3, clsNumber1, clsNumber2, clsNumber3, comple) VALUES ('$name', '$nationality', '$speciality', '$level', '$subject1','$subject2','$subject3', '$clsNumber1','$clsNumber2','$clsNumber3', $comple)";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'تم إدخال المعلم بنجاح!'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'لم يتم إنشاء المعلم بشكل صحيح!'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['update_student'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $nationality = mysqli_real_escape_string($conn, $_POST["nationality"]);
    $speciality = mysqli_real_escape_string($conn, $_POST["speciality"]);
    $lvl = isset($_POST['level']) && is_array($_POST['level']) ? $_POST['level'] : [];
    $level = implode(',', $lvl);
    $subject1 = mysqli_real_escape_string($conn, $_POST["subject1"]);
    $subject2 = mysqli_real_escape_string($conn, $_POST["subject2"]);
    $subject3 = mysqli_real_escape_string($conn, $_POST["subject3"]);
    $clsNumber1 = (int)mysqli_real_escape_string($conn, $_POST["clsNumber1"]);
    $clsNumber2 = (int)mysqli_real_escape_string($conn, $_POST["clsNumber2"]);
    $clsNumber3 = (int)mysqli_real_escape_string($conn, $_POST["clsNumber3"]);
    $comple = $clsNumber1 + $clsNumber2 + $clsNumber3;

    if ($name == NULL || $nationality == NULL || $speciality == NULL || $subject1 == NULL || $clsNumber1 == NULL) {
        $res = [
            'status' => 422,
            'message' => ' الحقول مطلوبة!'
        ];
        echo json_encode($res);
        return;
    }
    $query = "UPDATE teachers SET name='$name', nationality='$nationality', speciality='$speciality', level='$level', subject1='$subject1', subject2='$subject2', subject3='$subject3', clsNumber1='$clsNumber1', clsNumber2='$clsNumber2', clsNumber3='$clsNumber3', comple='$comple' 
                WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'تم تحديث معلومات المعلم'
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

if (isset($_GET['student_id'])) {
    $student_id = mysqli_real_escape_string($conn, $_GET['student_id']);

    $query = "SELECT * FROM teachers WHERE id='$student_id'";
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

    $query = "DELETE FROM teachers WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'تم حذف المعلم بنجاح'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'لم ينجح حذف المعلم!'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['deactivate_t'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $query = "Update `user_form` set `active`='0' WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'تم تعطيل المستخدم بنجاح'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'لم ينجح تعطيل المستخدم!'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['activate_t'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $query = "Update `user_form` set `active`='1' WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'تم تعطيل المستخدم بنجاح'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'لم ينجح تعطيل المستخدم!'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['delete_t'])) {
    $t_id = mysqli_real_escape_string($conn, $_POST['t_id']);

    $query = "DELETE FROM user_form WHERE id='$t_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'تم حذف العضو بنجاح'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'لم ينجح حذف العضو!'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['save_need'])) {
    $compound = mysqli_real_escape_string($conn, $_POST['compound']);
    $path = mysqli_real_escape_string($conn, $_POST["path"]);
    $level = mysqli_real_escape_string($conn, $_POST["level"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $sub = isset($_POST['subject']) && is_array($_POST['subject']) ? $_POST['subject'] : [];
    $subjects = implode(',', $sub);
    $comple = mysqli_real_escape_string($conn, $_POST["comple"]);
    $needCode = mysqli_real_escape_string($conn, $_POST["needCode"]);


    if ($compound == NULL || $path == NULL || $level == NULL || $gender == NULL || $comple == NULL || $needCode == NULL) {
        $res = [
            'status' => 422,
            'message' => ' الحقول مطلوبة!'
        ];
        echo json_encode($res);
        return;
    }
    $query = "INSERT INTO needs (compound, path, level, gender, subjects, comple, need_code) VALUES ('$compound', '$path', '$level', '$gender','$subjects','$comple','$needCode')";
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

?>