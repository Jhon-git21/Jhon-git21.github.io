<?php 

session_start();
unset($_SESSION['tb_pemilik']);
echo "<script>alert('Anda Berhasil Logout');</script>";
echo "<script>location = 'loginpemilik.php';</script>";

?>