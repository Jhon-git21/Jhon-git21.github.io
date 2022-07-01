<?php 
include '../../config/mysqli.php';
$data_k1 = $karyawan->tampil('ranking ASC');
$data_k = $kriteria->tampil();
date_default_timezone_set('Asia/Jakarta');
$idadmin1 = $_SESSION['tb_admin']['id'];
$dataadmin1 = $admin->ambil_admin($idadmin1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>.</title>
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
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
				<h3 align="center" style="font-weight: bold; font-family: 'cambria'">SUPER DAZZLE YOGYAKARTA
					<h5 align="center" style="font-family: 'cambria'">Jalan Kaliurang KM.5,6 No.25, Manggung, Caturtunggal, Kec. Depok
						<h5 align="center" style="font-family: 'cambria'">Kabupaten Sleman. Daerah Istimewa Yogyakarta 55281
						</h5>
						<button style="font-weight: bold; font-family: cambria" class="btn btn-success btn-sm hidden-print" onclick="print()"><i class="fas fa-print"></i> CETAK</button>
						<hr>
						<h5 align="center" style="font-family: 'cambria'" value="$waktu">Time: <?php echo date('h:i:sa'); ?></h5>

						<table class="table table-bordered" id="table-data-admin" width="100%">
							<thead>
								<tr>
									<th class="text-center" rowspan="2">Ranking</th>
									<th rowspan="2">Nama Karyawan</th>
									<th class="text-center" rowspan="2">Status Keputusan</th>
									<th class="text-center" rowspan="2">Hasil Akhir</th>
									<th class="text-center" rowspan="2">Tanggal Hitung</th>
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
						<p align="right" style="font-weight: bold; font-family: 'cambria'">Hormat Kami</p>
						<br>
						<br>
						<p align="right" style="font-weight: bold; font-family: 'cambria'">( <?php echo $dataadmin1['username_admin'] ?> )</p>
					</div>
				</page>



			</body>
			</html>


