<?php

include 'config.php';

if (isset($_POST['submit'])) {
    $rule = mysqli_real_escape_string($conn, $_POST['rule']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $active=0;
  
    
    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('فشل الاتصال بقاعدة البيانات');

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'هذا البريد مسجل مسبقًا';
    } else {
        if ($password != $cpassword) {
            $message[] = 'كلمة السر غير متطابقة!';
        } elseif ($rule == '') {
            $message[] = 'من فضلك حدد نوع المستخدم';
        } else {
            $insert = mysqli_query($conn, "INSERT INTO `users`(rule, name, email, pass, address, phone, active) VALUES('$rule', '$name', '$email', '$password', '$address', '$phone', '$active')") or die('فشل الاتصال بقاعدة البيانات');
            if ($insert) {
                $message[] = 'تم التسجيل بنجاح';
                header('location:login.php');
            } else {
                $message[] = 'فشل تسجيل الحساب!';
            }
        }
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
        a,
        select,
        option,
        .log-in,
        .select-dropdown {
            font-family: gess !important;
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

        .input-group {
            position: relative;
            margin: auto;
            width: 100%;
            margin-bottom: 8px;
        }

        .card-body {
            background-color: #c788ae !important;
            padding-top: 20%;
        }

        .wrapper--w680 {
            width: 1000px;
            max-width: 1000px;
        }

        .card-4 {
            position: relative;
            border-radius: 0;
            border: none;
            margin-top: 20px;
        }

        .card-4 .card-body {
            padding: 20px !important;
        }

        .login-header {
            width: 30%;
            z-index: 3;
            position: absolute;
            right: 35%;
            top: -25%;
        }

        form {
            margin-top: 20px;
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

        .log_btn {
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

        .form-head {
            background-color: #fff;
            color: #783e79;
            border-radius: 16px;
            width: 350px;
            padding: 5px 10px;
            margin-top: -40px;
        }

        .form-head i {
            font-size: 36px;
            margin-left: 16px;
        }

        .form-head h2 {
            font-size: 24px;
            margin: 0;
            line-height: 2rem;
        }

        .reg_img {
            width: 20%;
            float: left;
            margin-top: -130px;
            padding: 0;
            max-height: 80px;

        }
    </style>
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="reg_img">
                <img src="dist/img/Saudi_Vision.png" alt="">
            </div>
            <div class="clear-fix"></div>
            <div class="card card-4">

                <div class="card-body">

                    <div class="form-head">
                        <i class="fas fa-user"></i>
                        <h2 class="title" style="display: inline;">تسجيل حساب جديد</h2>
                    </div>

                    <?php
                    if (isset($message)) {
                        foreach ($message as $message) {
                            echo '<div class="message">' . $message . '</div>';
                        }
                    }
                    ?>
                    <form action="" method="POST">
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
                        <div class="row">
                            <div class="col-6">
                                <div class="form-element">
                                    <div class="input-group">
                                        <i class="fas fa-envelope logg"></i>
                                        <input class="log-in" type="text" name="email" id="email" placeholder="البريد الإلكتروني">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-element">
                                    <div class="input-group">
                                        <i class="fas fa-user logg"></i>
                                        <input class="log-in" type="text" name="name" id="name" placeholder="الاسم كاملًا" required>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-element">
                                    <div class="input-group">
                                        <i class="fas fa-lock logg"></i>
                                        <input class="log-in" type="password" name="password" id="password" placeholder="كلمة المرور">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-element">
                                    <div class="input-group">
                                        <i class="fas fa-lock logg"></i>
                                        <input class="log-in" type="password" name="cpassword" id="cpassword" placeholder="تأكيد كلمة المرور">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-element">
                                    <div class="input-group">
                                        <i class="fas fa-map logg"></i>
                                        <input class="log-in" type="text" name="address" id="address" placeholder="العنوان">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-element">
                                    <div class="input-group">
                                        <i class="fas fa-phone logg"></i>
                                        <input class="log-in" type="text" name="phone" id="phone" placeholder="رقم الهاتف">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group">
                                    <i class="fas fa-user-circle log-icon"></i>
                                    <a class="btn reg_btn" href="login.php">تسجيل الدخول</a>
                                </div>
                            </div>
                            <div class="col-4">
                            </div>
                            <div class="col-4">
                                <div class="input-group">
                                    <i class="fas fa-user-circle log-icon"></i>
                                    <button class="btn log_btn" type="submit" name="submit" id="submit">اشتراك</button>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
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