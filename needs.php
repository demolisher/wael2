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
<!DOCTYPE HTML>
<html lang="ar" dir="rtl">
<?php require_once('includes/components/header.php'); ?>

<body class="hold-transition sidebar-mini layout-boxed">
  <div class="container" style="max-width: 86%;">
    <div class="wrapper">
      <?php require_once('includes/components/navbar.php'); ?>
      <?php require_once('includes/components/sidebar.php'); ?>
      <div class="content-wrapper">
        <?php require_once('includes/components/cont-header.php'); ?>
        <?php require_once('includes/components/needs_forms.php'); ?>
      </div>
      <?php require_once('includes/components/footer.php'); ?>
    </div>
  </div>
  <?php require_once('includes/components/need_scripts.php'); ?>
</body>

</html>