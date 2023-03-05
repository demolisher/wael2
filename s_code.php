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
    
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $l_number = mysqli_real_escape_string($conn, $_POST["l_number"]);
    $c_number = mysqli_real_escape_string($conn, $_POST["c_number"]);
    $c_code = mysqli_real_escape_string($conn, $_POST["c_code"]);
    $n_code = mysqli_real_escape_string($conn, $_POST["n_code"]);
    $select_need = mysqli_query($conn, "SELECT * FROM `needs` WHERE id = '$n_code'") or die('فشل الاستعلام من بيانات الخادم');
    if (mysqli_num_rows($select_need) > 0) {
        $sl_need = mysqli_fetch_assoc($select_need);
    }
    $total_no = $l_number * $c_number;
    $comple = $sl_need['comple'];
    $need_no = bcdiv($total_no, $comple, 2);


        if ($subject == NULL || $l_number == NULL || $c_number == NULL || $total_no == NULL || $need_no == NULL) {
            $res = [
                'status' => 422,
                'message' => ' الحقول مطلوبة!'
            ];
            echo json_encode($res);
            return;
        }
        $query = "UPDATE `subject_need` SET subject='$subject', l_number='$l_number', c_number='$c_number', total_no='$total_no', need_no='$need_no' 
                WHERE id='$student_id'";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $res = [
                'status' => 200,
                'message' => 'تم تحديث معلومات المادة'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'لم يتم تحديث المادة لخطأ ما!'
            ];
            echo json_encode($res);
            return;
        }
}

if (isset($_GET['student_id'])) {
    $student_id = mysqli_real_escape_string($conn, $_GET['student_id']);

    $query = "SELECT * FROM subject_need WHERE id='$student_id'";
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

    $query = "DELETE FROM subject_need WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'تم حذف المادة بنجاح'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'لم ينجح حذف المادة!'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['save_student'])) {
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $l_number = mysqli_real_escape_string($conn, $_POST["l_number"]);
    $c_number = mysqli_real_escape_string($conn, $_POST["c_number"]);
    $c_code = mysqli_real_escape_string($conn, $_POST["c_code"]);
    $n_code = mysqli_real_escape_string($conn, $_POST["n_code"]);
    $select_need = mysqli_query($conn, "SELECT * FROM `needs` WHERE id = '$n_code'") or die('فشل الاستعلام من بيانات الخادم');
    if (mysqli_num_rows($select_need) > 0) {
        $sl_need = mysqli_fetch_assoc($select_need);
    }
    $total_no = $l_number * $c_number;
    $comple = $sl_need['comple'];
    $need_no = bcdiv($total_no, $comple, 2);


    $select_subject = mysqli_query($conn, "SELECT * FROM `subject_need` WHERE subject = '$subject' AND c_code='$c_code' AND n_code='$n_code'") or die('فشل الاستعلام من بيانات الخادم');
    if (mysqli_num_rows($select_subject) > 0) {
        $res = [
            'status' => 302,
            'message' => 'المادة هذه مسجلة مسبقًا ... يرجى مراجعة الجدول'
        ];
        echo json_encode($res);
        return;
    } else {

        if ($subject == NULL || $l_number == NULL || $c_number == NULL || $total_no == NULL || $need_no == NULL) {
            $res = [
                'status' => 422,
                'message' => ' الحقول مطلوبة!'
            ];
            echo json_encode($res);
            return;
        }
        $query = "INSERT INTO subject_need (subject,n_code,c_code, l_number, c_number, total_no, need_no) VALUES ('$subject', '$n_code', '$c_code', '$l_number', '$c_number', '$total_no','$need_no')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $res = [
                'status' => 200,
                'message' => 'تم إدخال المادة بنجاح!'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'لم يتم إنشاء المادة بشكل صحيح!'
            ];
            echo json_encode($res);
            return;
        }
    }
}

?>