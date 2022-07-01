<?php

function base_url($param='')
{
	return "http://localhost/spk_fuzzy_tsukamoto/" . $param;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>HALAMAN PEMILIK - SUPPER DAZZLE YOGYAKARTA</title>
	<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" crossorigin="anonymous" />
	<link rel="stylesheet" href="<?php echo base_url('admin/assets/fontawesome/css/all.css') ?>">
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script> -->
	<script>
		const BASE_URL = "<?php echo base_url() ?>";
	</script>
</head>
<body class="sb-nav-fixed" 
	<?php if (empty($_GET) || isset($_GET['beranda_pelamar'])): ?>
		style="background-image: url('assets/skrt.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center top;"
	<?php endif ?>
>
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<a class="navbar-brand" style="font-weight: bold; color: white; font-family: 'cambria'" href="?"><i class="fab fa-java">HALAMAN PEMILIK</i></a>
		<!-- <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa-fw fas fa-bars"></i></button> -->
		<div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>
		<!-- Navbar-->
		<ul class="navbar-nav ml-auto ml-md-0">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-fw fas fa-user fa-fw"></i></a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<!-- <a class="dropdown-item" href="<?php echo base_url('profil') ?>">Profil</a> -->
					<!-- <div class="dropdown-divider"></div> -->
					<a style="font-weight: bold; color: black; font-family: 'cambria'" class="dropdown-item" href="<?php echo base_url('pemilik/logoutpemilik.php') ?>">LOGOUT</a>
				</div>
			</li>
		</ul>
	</nav>
	<div id="layoutSidenav">
		
		<div id="layoutSidenav_content" class="pl-0 ml-0">
			<main>
				<div class="container mt-3">
					<?php 
					include_once '../config/mysqli.php';

					if (!isset($_SESSION['tb_pemilik'])) {
						echo "<script>alert('Anda Harus Login Terlebih Dahulu!');</script>";
						echo "<script>location='loginpemilik.php';</script>";
					}
					?>

					<?php  
					
					if (isset($_GET ['hasil_umum']) && empty($_GET['hasil_umum'])) {
						include 'hasil_umum.php';
					}
					elseif (isset($_GET ['hasil_umum']) && ($_GET['hasil_umum']=='detail')) {
						include 'detail_hasil_umum.php';
					}
					elseif (isset($_GET ['hasil_personal']) && empty($_GET['hasil_personal'])) {
						include 'laporan_ranking.php';
					}
					else 
					{
						include 'homepemilik.php';
					}


					?>

				</div>
			</main>
			<!-- <footer class="py-4 bg-light mt-auto">
				<div class="container-fluid">
					<div class="d-flex align-items-center justify-content-end small">
						<div class="text-muted">Copyright &copy; Your Website 2020</div>
					</div>
				</div>
			</footer> -->
		</div>
	</div>

	<script src="<?php echo base_url('assets/js/jquery-3.5.1.slim.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/scripts.js') ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
	<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/demo/chart-area-demo.js') ?>"></script>
	<script src="<?php echo base_url('assets/demo/chart-bar-demo.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/sendiri.js') ?>"></script>

	<script>
		$(document).ready(function() {
           // Call the dataTables jQuery plugin
           $('#dataTable').DataTable();
           $('#table-data-admin').DataTable();
           $("#resetForm").click(function(){
           	$("input[name=tgl_mulai]").val("");
           	$("input[name=tgl_selesai]").val("");
           })
        })
     </script>

  </body>
  </html>
