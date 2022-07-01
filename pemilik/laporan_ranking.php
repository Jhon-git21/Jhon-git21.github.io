<?php 
$data_k1 = $karyawan->tampil('ranking ASC');
$data_k = $kriteria->tampil();
?>

<h1 style="font-weight: bold;font-family: 'cambria'" class="mt-4">Laporan Hasil Ranking Karyawan</h1>
<hr>
<ol class="breadcrumb mb-4">
	<li style="font-weight: bold;font-family: 'cambria'" class="breadcrumb-item"><a href="?beranda_pelamar">Beranda</a></li>
	<li style="font-weight: bold;font-family: 'cambria'" class="breadcrumb-item active">Laporan Hasil Nilai</li>
</ol>

<div class="card mb-4">
	<div class="card-body">
		<!-- <h1 class="text-center">HASIL UMUM KARYAWAN BERPRESTASI</h1> -->
		<!-- <hr> -->
		<!-- <h1 style="font-weight: bold; font-family: 'cambria'">Laporan  -->
			<!-- <a href="?karyawan=riwayat_nilai" class="btn btn-success btn-sm float-right"><i class="fas fa-fw fa-search"></i> Detail</a> -->
			<!-- <a style="font-weight: bold; font-family: 'cambria'" href="cetak.php" class="btn btn-info btn-sm"><i class="fas fa-print fa-fw"></i> Cetak</a> -->
		</h1>

		<div class="table-responsive">
			<table class="table table-bordered" id="table-data-admin">
				<thead>
					<tr>
						<th rowspan="2" style="vertical-align: middle;" class="text-center">Ranking</th>
						<th rowspan="2" style="vertical-align: middle;" class="text-center">Nama Karyawan</th>
						<th rowspan="2" style="vertical-align: middle;" class="text-center">Status Keputusan</th>
						<th rowspan="2" style="vertical-align: middle;" class="text-center">Hasil Akhir</th>
						<th rowspan="2" style="vertical-align: middle;" class="text-center">Tanggal Hitung</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data_k1 as $key => $value): ?>
						<tr>
							<td class="text-center"><?php echo $value['ranking'] ?></td>
							<td><?php echo $value['nama_karyawan'] ?></td>
							<td><?php echo $value['status'] ?></td>
							<td class="text-center"><?php echo $value['nilai'] ?></td>
							<td class="text-center"><?php echo date("d-m-Y", strtotime($value['tgl_hitung'])) ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>