<?php  
$id_admin = $_SESSION['tb_admin']['id'];
$data_admin = $admin->ambil_admin($id_admin);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SUPPER DAZZLE YOGYAKARTA</title>

  
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
 <link rel="stylesheet" href="<?php echo base_url('admin/assets/fontawesome/css/all.css') ?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  
  <script src="assets/js/bootstrap.min.js"></script>

  <style>
    .image{
      border-radius: 0%;
      width: 150px;
      height: 200px;
      vertical-align: middle;
      border: 3px solid white;
      object-fit: all;
    }
  </style>

</head>
<body>

  <div id="wrapper">
    <nav class="navbar navbar-tol navbar-default">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed"
        data-toggle="colapse"
        data-target=".sidebar-collapse"
        aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="font-weight: bold; color: white; font-family: 'cambria'" href="../"><i class="fab fa-java">
      SUPER DAZZLE YOGYAKARTA</i></a>
    </div>
  </nav>
  <nav class="navbar-default navbar-side">
    <div class="sidebar-collapse">
      <ul class="nav" id="main-menu">
        <li class="text-center">
          <br>
          <img class="image" src="gambar/<?php echo $data_admin['foto_karyawan'] ?>" alt="">
          <br>
          <br>
        </li>
        <li><a href="?beranda"><i class="fas fa-fw fa-home"></i> Home</a></li>
        <li><a href="?karyawan"><i class="fas fa-fw fa-users"></i> Karyawan</a></li>
        <li><a href="?kriteria"><i class="fas fa-fw fa-user-check"></i> Kriteria</a></li>
        <li><a href="?aturan"><i class="fas fa-fw fa-sliders-h"></i> Aturan Fuzzy</a></li>
        <li><a href="?laporan=tampil"><i class="fas fa-fw fa-file-alt"></i> Laporan</a></li>
        <li><a href="logout.php"><i class="fas fa-fw fa-sign-out-alt"></i> Logout</a></li>
      </ul>
    </div>
  </nav>
  <div id="page-wrapper">
    <div id="page-inner">