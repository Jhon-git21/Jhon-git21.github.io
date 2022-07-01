<?php 

session_start();
unset($_SESSION['tb_admin']);
echo "<script>alert('Anda Berhasil Logout');</script>";
echo "<script>location = 'login.php';</script>";

?>