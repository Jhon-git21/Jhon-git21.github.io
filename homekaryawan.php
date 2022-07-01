<?php  
$idkaryawan = $_SESSION['karyawan']['id'];

$datakaryawan = $karyawan->ambil_karyawan($idkaryawan);
?>

<!-- <div class="alert alert-dark">
	<h1>Selamat Datang</h1>
	<hr>
	<h2><?php echo $datakaryawan['nama_karyawan'] ?></h2>
</div>
-->
<h1 style="font-weight: bold;font-family: Agency FB" class="mt-4">Beranda</h1>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Beranda</li>
</ol>
<div class="row">
	<div class="col-xl-3 col-md-3">
		<div class="card bg-dark text-white mb-4">
			<div class="card-body"><i class="fas fa-user fa-fw mr-2"></i> Biodata</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="?biodata">Lihat Detail</a>
				<div class="small text-white"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-3">
		<div class="card bg-secondary text-white mb-4">
			<div class="card-body"><i class="fas fa-users fa-fw mr-2"></i> Hasil Umum</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="?hasil_umum">Lihat Detail</a>
				<div class="small text-white"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-3">
		<div class="card bg-secondary text-white mb-4">
			<div class="card-body"><i class="fas fa-user-tie fa-fw mr-2"></i> Hasil Personal</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="?hasil_personal">Lihat Detail</a>
				<div class="small text-white"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-3">
		<div class="card bg-dark text-white mb-4">
			<div class="card-body"><i class="fas fa-file-alt fa-fw mr-2"></i> Riwayat Kehadiran</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="?laporan_harian">Lihat Detail</a>
				<div class="small text-white"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
	</div>
</div>