<?php 
include '../config/mysqli.php';
$data_k1 = $karyawan->tampil('ranking ASC');
$data_k = $kriteria->tampil();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title style="font-weight: bold; font-family: Agency FB">Laporan Hasil Nilai Karyawan</title>
	<link href="../admin/assets/css/bootstrap.min.css" rel="stylesheet">
	<style>
		/*.table td, .table th {
			padding: 2px !important;
			font-size: 8pt !important;
		}
		tr{
			padding: 2px !important;
			margin: 2px;
		}*/
		tbody td{
			text-align: center;
		}

	</style>
	<style type="text/css" media="print">
		@page { 
			size: portrait;
		}
		table { page-break-inside:auto }
		tr   { page-break-inside:avoid; page-break-after:auto }
		td   { page-break-inside:avoid; page-break-after:auto }
		thead { display:table-header-group }
		tfoot { display:table-footer-group }

	</style>
</head>
<body>


	<page size="A4" layout="portrait">
		<div class="container table-responsive">
			<h1 style="font-weight: bold; font-family: 'cambria'">Laporan
			 <button class="btn btn-info btn-sm hidden-print" onclick="print()"><i class="fas fa-print"></i> Cetak</button></h1>
			<table class="table table-bordered" id="table-data-admin" width="100%">
				<thead>
					<tr>
						<th rowspan="2">Ranking</th>
						<th rowspan="2">Nama</th>
						<th rowspan="2">Status</th>
						<th rowspan="2">Hasil</th>
						<th rowspan="2">Tanggal</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data_k1 as $key => $value): ?>
						<tr>
							<td><?php echo $value['ranking'] ?></td>
							<td class="text-left"><?php echo $value['nama_karyawan'] ?></td>
							<td><?php echo $value['status'] ?></td>
							<td><?php echo $value['nilai'] ?></td>
							<td class="text-center"><?php echo date("d-m-Y", strtotime($value['tgl_hitung'])) ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</page>


	
</body>
</html>


