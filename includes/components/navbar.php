<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #2a3f54;">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user_icon1.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="" class="d-block"><?php echo $fetch['name']; ?></a>
      </div>
    </div>
  </ul>
  <ul class="navbar-nav mr-auto-navbav">
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href=""> تعديل الملف الشخصي
        <i class="fas fa-edit"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">خروج
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>
  </ul>
</nav>