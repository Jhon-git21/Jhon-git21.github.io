<?php  
$idpemilik = $_SESSION['tb_pemilik']['id'];

$datapemilik = $pemilik->ambil_pemilik($idpemilik);
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
		<div style="font-weight: bold; font-family: cambria" class="card bg-secondary text-black mb-4">
			<div class="card-body"><i class="fas fa-users fa-fw mr-2"></i> Kinerja Karyawan</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a style="font-weight: bold; font-family: cambria" class="small text-white stretched-link" href="?hasil_umum">Lihat Detail</a>
				<div class="small text-white"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-3">
		<div style="font-weight: bold; font-family: cambria" class="card bg-secondary text-black mb-4">
			<div class="card-body"><i class="fas fa-user-tie fa-fw mr-2"></i> Laporan Hasil Nilai</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a style="font-weight: bold; font-family: cambria" class="small text-white stretched-link" href="?hasil_personal">Lihat Detail</a>
				<div class="small text-white"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
	</div>
</div>