<?php
$conn = mysqli_connect('localhost','root','','needsApp') or die('فشل الاتصال بالبيانات');
mysqli_query($conn, "SET NAMES 'utf8'") or die('Can\'t charset in DataBase');
mysqli_query($conn, "SET CHARACTER SET utf8") or die('Can\'t charset in DataBase');
