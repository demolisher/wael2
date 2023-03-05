<?php

include 'config.php';
session_start();

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $rule = mysqli_real_escape_string($conn, ($_POST['rule']));

    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND pass = '$password' AND active=1") or die('خطأ اتصال بيانات');

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        if ($row['rule'] == $rule) {
            $_SESSION['user_id'] = $row['id'];
            header('location:home.php');
        } else {
            echo '<script>alert("نوع المستخدم غير متوافق للأسف");</script>';
        }
    } else {
        echo '<script>alert("كلمة مرور خاطئة أو بريد غير صالح أو أن حسابك يحتاج للتفعيل من قبل مدير النظام");</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>برنامج الاحتياج</title><link rel="icon" type="image/x-icon" href="dist/img/skills.png">

    <!-- Icons font CSS-->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <style>
        .card-body,
        input,
        button,
        a {
            font-family: gess, sans-serif !important;
            font-size: 1rem !important;
        }

        input,
        .rs-select2 {
            border: 0.5px orangered solid !important;
        }

        body {
            max-height: 100vh !important;
        }

        .p-b-100 {
            padding-bottom: 20px;
        }

        .logg {
            width: 48px;
            height: 48px;
            background: #e6e6e6;
            font-size: 24px;
            padding: 12px;
            color: #545454;
            display: inline;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 2;
        }

        .log-in {
            display: inline;
            width: 100%;
            height: 48px;
            padding-right: 60px;
            top: 0;
            right: 0;
            z-index: 1;
            border: none !important;
            outline: none;
            font-size: 18px;
        }

        select.log-in option{
            outline: none !important;
            border: none !important;
        }

        .input-group {
            position: relative;
            margin: auto;
            width: 100%;
            margin-bottom: 8px;
        }

        .card-body {
            background-color: #c788ae !important;
            padding-top: 20%;
            padding-bottom: 20px;
        }

        .wrapper--w680 {
            width: 500px;
        }

        .card-4 {
            position: relative;
            border-radius: 0;
            border: none;
        }

        .login-header {
            width: 20%;
            z-index: 3;
            position: absolute;
            right: 40%;
            top: -20%;
        }

        form {
            margin-top: 50px;
        }

        .log_btn,
        .reg_btn {
            background-color: #843d79;
            text-align: center !important;
            width: calc(100% - 48px) !important;
            color: #fff;
            border-radius: 0;
            width: 100%;
            height: 48px;
            font-size: 18px;
            float: left !important;
            margin-right: 48px;
            padding: 0;
        }

        .reg_btn {
            background-color: #279995;
        }

        .log-icon {
            width: 48px;
            height: 48px;
            background: #e6e6e6;
            font-size: 24px;
            padding: 12px;
            color: #545454;
            display: inline;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 2;
        }

        .card-body input {
            font-size: 1rem;
        }
/*         .logos{
            max-width: 600px;
            justify-content: space-between;
            padding: 0;
            margin: 0;
            display: flex;
            margin-top: 10px;
        }
        .logos div {

            padding: 0px;
            box-sizing: border-box !important;
        }
        .logos div a img{
            width: 100%;
            min-height: 60px;
            max-height: 65px;
        } */
        .admin_btn{
        width:100%;
        margin:5px auto;
        background: magenta;
        }
        
    </style>
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins" style="padding-top: 95px">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <img class="login-header" src="dist/img/user_icon.png" alt="">
                <div class="card-body" style="padding:20px 40px">
                    <form method="post">
                        <div class="form-element">
                            <div class="input-group">
                                <i class="fas fa-users logg"></i>
                                <select class="log-in" name="rule" id="rule">
                                    <option disabled="disabled" selected="selected">اختر الصلاحية</option>
                                    <option value="manager">مشرف</option>
                                    <option value="data_entry">مدخل بيانات</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="form-element">
                            <div class="input-group">
                                <i class="fas fa-envelope logg"></i>
                                <input class="log-in" type="text" name="email" id="email" placeholder="البريد الإلكتروني">
                            </div>
                        </div>

                        <div class="form-element">
                            <div class="input-group">
                                <i class="fas fa-lock logg"></i>
                                <input class="log-in" type="password" name="password" id="password" placeholder="كلمة المرور">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <img src="dist/img/Saudi_Vision.png" alt="" style="width: 100%;">
                            </div>
                            <div class="col-7">
                                <div class="input-group">
                                    <i class="fas fa-key log-icon"></i>
                                    <button class="btn log_btn" type="submit" name="login" id="login">تسجيل الدخول</button>
                                </div>
                                <div class="input-group">
                                    <i class="fas fa-user-circle log-icon"></i>
                                    <a class="btn reg_btn" href="register.php">تسجيل حساب جديد</a>
                                </div>

                            </div>
                        </div>


                        <!-- <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="login" id="login">دخول</button>
                        </div>
                        <p style="float: left; font-weight: bold;">ليس لديك حساب؟ <a href="register.php">قم بإنشاء حساب جديد من هنا</a></p> -->
                    </form>
                    <p class="text-center text-white mt-3" style="font-size:18px">فكــرة وتنفيــذ : الأستــاذ محسن عبد الجواد- وائل العمري  </p>
                    <a class="btn admin_btn" href="admin.php">الدخول كمدير للنظام اضغط هنا</a>
                </div>
            </div>
<!--             <div class="logos">
                <div style="width:28%;padding-left:5px"><a href="https://schools.madrasati.sa/" target="_blank"><img src="dist/img/madrasati.png" alt=""></a></div>
                <div style="width:20%;padding-left:5px"><a href="https://noor.moe.gov.sa/" target="_blank"><img src="dist/img/nor.png" alt=""></a></div>
                <div style="width:20%;padding-left:5px"><a href="https://frsprod.moe.gov.sa/" target="_blank"><img src="dist/img/faris.png" alt=""></a></div>
                <div style="width:28%"><a href="https://moe.gov.sa/ar" target="_blank"><img src="dist/img/education.png" alt=""></a></div>
            </div> -->
        </div>
    </div>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->