<aside class="main-sidebar sidebar-dark-primary" style="position: absolute; width:200px">
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item text-center">
                    <a <?php if ($fetch['rule']!='admin'){ echo ' href="home.php" '; } else{echo ' href="admin.php" ';}?>class="nav-link">
                        <img src="dist/img/vision_logo.png" alt="" style="width: 80%; padding: 2px 2px">
                    </a>
                </li>
                <li class="nav-item bg-warning p-0 text-center">
                    <a <?php if ($fetch['rule']!='admin'){ echo ' href="home.php" '; } else{echo ' href="admin.php" ';}?> class="nav-link">
                        <p>القائمة الرئيسية</p>
                    </a>
                </li>
                
                <li class="bg-orange nav-item">
                   
                </li>
                <li class="nav-item">
                    <a <?php if ($fetch['rule']!='admin'){ echo ' href="home.php" '; } else{echo ' href="admin.php" ';}?> class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                        <p>قواعد البيانات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="teach.php" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>  المعلمون
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="needs.php" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>  مدخلات الاحتياجات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bullseye"></i>
                        <p>  التقارير
                        </p>
                    </a>
                </li>
               
                
            </ul>
        </nav>
    </div>
</aside>