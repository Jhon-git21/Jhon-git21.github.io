<?php
	include_once '../config/mysqli.php';
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
	<title>SUPER DAZZLE YOGYAKARTA</title>
	<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" crossorigin="anonymous" />
	<link rel="stylesheet" href="<?php echo base_url('admin/assets/fontawesome/css/all.css') ?>">
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script> -->
	<script>
		const BASE_URL = "<?php echo base_url() ?>";
	</script>
</head>
		<!-- style="background-image: url('../assets/staff3.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center top;" -->
<body class="sb-nav-fixed ">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<a style="font-weight: bold;font-family: 'cambria'" class="navbar-brand" href="index.html"><i class="fab fa-java">SUPER DAZZLE YOGYAKARTA</a></i>

		<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa-fw fas fa-bars"></i></button>
		<div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>
		<!-- Navbar-->
		<ul class="navbar-nav ml-auto ml-md-0">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-fw fas fa-user fa-fw"></i>
                <span class="mb-0 text-sm  font-weight-bold"></span></a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<!-- <a class="dropdown-item" href="<?php echo base_url('profil') ?>">Profil</a> -->
					<!-- <div class="dropdown-divider"></div> -->
					<a style="font-weight: bold;font-family: 'cambria'" class="dropdown-item" href="<?php echo base_url('admin/logout.php') ?>">LOGOUT</a>
				</div>
			</li>
		</ul>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav">
						<a class="nav-link" href="<?php echo base_url('admin/index.php?beranda') ?>">
							<div class="sb-nav-link-icon"><i class="fa-fw fas fa-home"></i></div>
							Beranda
						</a>
						<div class="sb-sidenav-menu-heading mt-0 pt-2">Data</div>
						<a class="nav-link" href="<?php echo base_url('admin/index.php?karyawan') ?>">
							<div class="sb-nav-link-icon"><i class="fa-fw fas fa-users"></i></div>
							Karyawan
						</a>
						<div class="sb-sidenav-menu-heading mt-0 pt-2">Perhitungan</div>
						<a class="nav-link" href="<?php echo base_url('admin/index.php?kriteria') ?>">
							<div class="sb-nav-link-icon"><i class="fa-fw fas fa-user-check"></i></div>
							Kriteria
						</a>
						<a class="nav-link" href="<?php echo base_url('admin/index.php?aturan') ?>">
							<div class="sb-nav-link-icon"><i class="fa-fw fas fa-sliders-h"></i></div>
							Aturan Fuzzy
						</a>
						<div class="sb-sidenav-menu-heading mt-0 pt-2">Laporan</div>
						<a class="nav-link" href="<?php echo base_url('admin/index.php?laporan=tampil') ?>">
							<div class="sb-nav-link-icon"><i class="fa-fw fas fa-file-alt"></i></div>
							Laporan
						</a>
						
					</div>
				</div>
				<!-- <div class="sb-sidenav-footer">
					<div class="small">Login sebagai:</div>

				</div> -->
			</nav>
		</div>
		<div id="layoutSidenav_content"  <?php if (isset($_GET['beranda'])): ?>
		style="background-image: url('gambar/pemilik.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center top;"
	<?php endif ?>>
			<main>
				<div class="container-fluid mt-3">
				<?php 

				if(!isset($_SESSION['tb_admin'])) {
					echo "<script>alert('Anda Harus Login Terlebih Dahulu!!');</script>";
					echo "<script>location='login.php';</script>";
				}

				// echo "<pre>";
				// print_r ($_SESSION);
				// echo "</pre>";

				?>

				<?php  
				if (isset($_GET['karyawan']) && empty($_GET['karyawan'])) {
					include 'karyawan/tampil.php';
				}
				elseif (isset($_GET['karyawan']) && $_GET['karyawan']=='tambah') {
					include 'karyawan/tambah.php';
				}
				elseif (isset($_GET['karyawan']) && $_GET['karyawan']=='hapus') {
					include 'karyawan/hapus.php';
				}
				elseif (isset($_GET['karyawan']) && $_GET['karyawan']=='ubah') {
					include 'karyawan/ubah.php';
				}
				elseif (isset($_GET['karyawan']) && $_GET['karyawan']=='detail') {
					include 'karyawan/detail_karyawan.php';
				}
				elseif (isset($_GET['karyawan']) && $_GET['karyawan']=='hitung') {
					include 'karyawan/hitung_nilai.php';
				}
				elseif (isset($_GET['karyawan']) && $_GET['karyawan']=='riwayat_nilai') {
					include 'karyawan/riwayat_nilai.php';
				}
				elseif (isset($_GET['karyawan']) && $_GET['karyawan']=='input') {
					include 'karyawan/input_nilai_karyawan.php';
				}
				elseif (isset($_GET['karyawan']) && $_GET['karyawan']=='ubah_nilai') {
					include 'karyawan/ubah_nilai_karyawan.php';
				}
				elseif (isset($_GET['kriteria']) && empty($_GET['kriteria'])) {
					include 'kriteria/tampil.php';
				}
				elseif (isset($_GET['kriteria']) && $_GET['kriteria']=='tambah') {
					include 'kriteria/tambah.php';
				}
				elseif (isset($_GET['kriteria']) && $_GET['kriteria']=='hapus') {
					include 'kriteria/hapus.php';
				}
				elseif (isset($_GET['kriteria']) && $_GET['kriteria']=='ubah') {
					include 'kriteria/ubah.php';
				}
				elseif (isset($_GET['kriteria']) && $_GET['kriteria']=='detail') {
					include 'kriteria/detail.php';
				}
				elseif (isset($_GET['kriteria']) && $_GET['kriteria']=='himpunan') {
					include 'kriteria/himpunan.php';
				}
				elseif (isset($_GET['kriteria']) && $_GET['kriteria']=='tambah_himpunan') {
					include 'kriteria/tambah_himpunan.php';
				}
				elseif (isset($_GET['kriteria']) && $_GET['kriteria']=='ubah_himpunan') {
					include 'kriteria/ubah_himpunan.php';
				}
				elseif (isset($_GET['kriteria']) && $_GET['kriteria']=='hapus_himpunan') {
					include 'kriteria/hapus_himpunan.php';
				}
				elseif (isset($_GET['aturan']) && empty($_GET['aturan'])) {
					include 'aturan/tampil.php';
				}
				elseif (isset($_GET['aturan']) && $_GET['aturan']=='tambah') {
					include 'aturan/tambah.php';
				}
				elseif (isset($_GET['aturan']) && $_GET['aturan']=='hapus') {
					include 'aturan/hapus.php';
				}
				elseif (isset($_GET['aturan']) && $_GET['aturan']=='ubah') {
					include 'aturan/ubah.php';
				}
				elseif (isset($_GET['aturan']) && $_GET['aturan']=='detail_aturan') {
					include 'detail_aturan/tampil.php';
				}
				elseif (isset($_GET['laporan']) && $_GET['laporan']=='tampil') {
					include 'laporan/tampil.php';
				}
				elseif (isset($_GET['beranda']) && empty($_GET['beranda'])) {
					include 'home.php';
				}
				else
				{
					include 'home.php';
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
                </footer>
            </div>
        </div> -->
      
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
