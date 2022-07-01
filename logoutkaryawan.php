<?php 

session_start();
unset($_SESSION['karyawan']);
echo "<script>alert('Anda Berhasil Logout');</script>";
echo "<script>location = 'loginkaryawan.php';</script>";

?>