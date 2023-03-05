<div class="content-header pb-0">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="page-main-title m-0 text-dark"><strong>أهلا وسهلا </strong> بكن في تطبيق مهارات التعلم الرقمي
                </h1>
                <?php
                if ($fetch['user_type'] == 'teacher' || $fetch['user_type'] == 'manager') {

                    $user_query = "SELECT * FROM fav order by id desc limit 1";
                    $user_query_run = mysqli_query($conn, $user_query);
                    if (mysqli_num_rows($user_query_run) > 0) {
                        foreach ($user_query_run as $user) {
                ?>
                            <h1 class="page-main-title m-0 bg-danger p-2">المعلمة المتميزة لهذا الشهر:&emsp;  الأستاذة &emsp;
                                <strong><?php echo $user["name"] ?></strong>
                            </h1>
                <?php
                        }
                    }
                }
                ?>
                <?php
                if ($fetch['user_type'] == 'teacher' && $fetch['followed'] == '1') {
                    echo ' <h4 class="m-0 bg-warning mt-2 p-2 text-center">عزيزتي المعلمة تتم هذه الفترة متابعتك من قبل المديرة</h4>';
                }
                ?>
                <div class="profile-name">
                    <i class="fas fa-user-alt fa-circle text-white" style="margin-left:16px;background-color: #2a3f54; border-radius:50%;padding: 5px;"></i>
                    <?php
                    $type = $fetch['user_type'];
                    $classroom = $fetch['class_name'];
                    $user_role = '';
                    switch ($type) {
                        case 'teacher':
                            $user_role = ' المعلمة';
                            break;
                        case 'student':
                            $user_role = ' الطالبة';
                            break;
                        case 'manager':
                            $user_role = ' المديرة';
                            break;
                        default:
                            $user_role = ' المستخدم';
                    }
                    ?>
                    <p style="display:inline; "><strong> <?php echo ' حساب' .  $user_role . ' ' . $fetch['name']; ?></strong></p>
                </div>
                <div class="profile-menu">
                    <nav class="nav">
                        <?php
                        $query = "SELECT * FROM subjects limit 4";
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        $c = 1;
                        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                        ?>
                            <div class="dropdown">

                                <button class="dropbtn btn dropdown-toggle" style="background-color: #<?php echo $row['sub_bg']; ?>;border:none;outline:none;color:#<?php echo $row['font_color']; ?>"><?php echo $row['sub_name']; ?></button>
                                <div class="dropdown-content">
                                    <a href="exams.php?sub=<?php echo $row['id']; ?>&type=1" class="dropdown-item">واجبات</a>
                                    <a href="exams.php?sub=<?php echo $row['id']; ?>&type=2" class="dropdown-item">تدريبات</a>
                                    <a href="exams.php?sub=<?php echo $row['id']; ?>&type=3" class="dropdown-item">أنشطة</a>
                                    <a href="exams.php?sub=<?php echo $row['id']; ?>&type=4" class="dropdown-item">اختبارات</a>
                                    <a href="exams.php?sub=<?php echo $row['id']; ?>&type=5" class="dropdown-item">مهارات</a>
                                </div>
                            </div>
                        <?php
                            $c += 1;
                        }
                        ?>
                        <a class="nav-link nav-link-2 btn btn-warning" href="metrics.php?t=<?php echo $fetch['id']; ?>&met=5" style="background-color: #ef4b28;color:#fff;border:none">دولية معيارية</a>
                        <a class="nav-link nav-link-2 btn btn-danger" href="metrics.php?t=<?php echo $fetch['id']; ?>&met=6" style="background-color: #a4c92c;border:none;color:#2a3f54">دولية مهارية</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>