<div class="content-header pb-0">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="page-main-title m-0 text-dark"><strong>أهلا وسهلا </strong> بك في برنامج الاحتياج
                </h1>
                


                <div class="profile-name">
                    <i class="fas fa-user-alt fa-circle text-white" style="margin-left:16px;background-color: #2a3f54; border-radius:50%;padding: 5px;"></i>
                    <?php
                    $type = $fetch['rule'];
                    $user_role = '';
                    switch ($type) {
                        case 'manager':
                            $user_role = ' المشرف';
                            break;
                        case 'data_entry':
                            $user_role = ' مدخل البيانات';
                            break;
                        default:
                            $user_role = ' المستخدم';
                    }
                    ?>
                    <p style="display:inline; "><strong> <?php echo ' حساب' .  $user_role . ' ' . $fetch['name']; ?></strong></p>
                </div>
                <?php if ($fetch['rule'] != 'manager') { ?>
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
                            <?php }
                            $c += 1;
                        }
                        if ($fetch['rule'] != 'manager') { ?>
                            <a class="nav-link nav-link-2 btn btn-warning" href="metrics.php?t=<?php echo $fetch['id']; ?>&met=5" style="background-color: #ef4b28;color:#fff;border:none">دولية معيارية</a>
                            <a class="nav-link nav-link-2 btn btn-danger" href="metrics.php?t=<?php echo $fetch['id']; ?>&met=6" style="background-color: #a4c92c;border:none;color:#2a3f54">دولية مهارية</a>

                        </nav>
                    </div>
                <?php } ?>
                <?php if ($fetch['rule'] != 'manager') { ?>
                    <div class="profile-name deps-title text-center">
                        أقســام المهام الخاصة بالمواد الدراسيــة
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>