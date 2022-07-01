<!-- <?php  
$id_karyawan = $_GET['id'];
$data_karyawan = $karyawan->ambil_karyawan($_GET['id']);
$data_kriteria = $kriteria->tampil();

$detail_nilai = $karyawan->ambil_detail_nilai($id_karyawan);

if(!empty($detail_nilai))
{
	$detail_nilai = $detail_nilai['detail_nilai'];
} else {
	$detail_nilai = ['jam_kerja'=>[],'kehadiran'=>[],'jam_lembur'=>[]];
}


// echo "<pre>";
// print_r ($detail_nilai);
// echo "</pre>";

?>

<style>
.gambar
{
	border-color: black;
	border-radius: 2%;
	border-style: solid;
	border-width: 3px; 
}
</style>

<p class="text-center">
	<img src="gambar/<?php echo $data_karyawan['foto_karyawan'] ?>" alt="Foto Tidak Tersedia" width="300px" class="gambar">
	
</p>

<table class="table">
	<thead>
		<tr>
			<th width="20%" style= "font-family: 'cambria'">NIP</th>
			<th width="1%"></th>
			<td><?php echo $data_karyawan['nip'] ?></td>
		</tr>
		<tr>
			<th width="20%" style="font-family: 'cambria'">Nama</th>
			<th width="1%"></th>
			<td><?php echo $data_karyawan['nama_karyawan'] ?></td>
		</tr>
		<tr>
			<th width="20%" style="font-family: 'cambria'">Jenis Kelamin</th>
			<th width="1%"></th>
			<td><?php echo $data_karyawan['jk_karyawan'] ?></td>
		</tr>
		<tr>
			<th width="20%" style="font-family: 'cambria'">Tanggal Lahir</th>
			<th width="1%"></th>
			<td><?php echo $data_karyawan['tgl_lahir'] ?></td>
		</tr>
		<tr>
			<th width="20%">Alamat</th>
			<th width="1%"></th>
			<td><?php echo $data_karyawan['alamat_karyawan'] ?></td>
		</tr>
		<tr>
			<th width="20%" style="font-family: 'cambria'">No. Handphone</th>
			<th width="1%"></th>
			<td><?php echo $data_karyawan['no_hp_karyawan'] ?></td>
		</tr>
		<tr>
			<th width="20%" style="font-family: 'cambria'">Email</th>
			<th width="1%"></th>
			<th><?php echo $data_karyawan['email'] ?></th>
		</tr>
		<tr>
			<th width="20%" style="font-family: 'cambria'">Ranking</th>
			<th width="1%"></th>
			<th><?php echo $data_karyawan['ranking'] ?></th>
		</tr>
	</thead>
</table>

<table class="table table-bordered">
	<thead>
		<tr>
			<th rowspan="2" style="vertical-align: middle;" class="text-center">Ranking</th>
			<th colspan="<?php echo count($data_kriteria) ?>" style="vertical-align: middle;" class="text-center">Kriteria</th>
			<th rowspan="2" style="vertical-align: middle;" class="text-center">Hasil Akhir</th>
			<th rowspan="2" style="vertical-align: middle;" class="text-center">Status</th>
		</tr>

		<tr>
			<?php foreach ($data_kriteria as $key => $value): ?>
				<th class="text-center"><?php echo $value['nama_kriteria'] ?></th>
			<?php endforeach ?>
		</tr>
	</thead>
	
	<tbody>
		<tr>
			<!-- <td><?php echo $data_karyawan['ranking'] ?></td> -->
			<?php foreach ($data_kriteria as $key_k => $value_k): ?>
				<?php $nilai_kl = $nilai_karyawan->cek_nilai($_GET['id'], $value_k['id_kriteria']) ?>
				<td class="text-center"><?php echo $nilai_kl['nilai'] ?></td>
			<?php endforeach ?>
			<td class="text-center"><?php echo $data_karyawan['nilai'] ?></td>
			<td class="text-center"><?php echo $data_karyawan['status'] ?></td>
		</tr>
	</tbody>

</table>


<!-- <h3>Riwayat Terakhir</h3>

<table class="table table-bordered">
	<thead>
		<tr>
			<th width="5%">Tanggal</th>
			<th>Jam Kerja</th>
			<th>Absensi Karyawan</th>
			<th>Jam Lembur</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($detail_nilai['jam_kerja'] as $key => $jamkerja): ?>
			<tr>
				<td><?php echo $jamkerja['tanggal'] ?></td>
				<td>
					<?php if($detail_nilai['kehadiran'][$key]['nilai'] == 0) 
					{
						echo "<b>Tidak Hadir</b>";
					} else {
						echo "Hadir";
					}

					?>
				</td>
				<td><?php 
				if(!empty($jamkerja['masuk']) && $jamkerja['masuk'] != "[object Object]") {
					echo "$jamkerja[masuk] - $jamkerja[pulang] / <b>$jamkerja[nilai]</b> jam kerja"; 
				} else {
					echo "-";
				}
				?>	
			</td>
			<td>
					<?php if($detail_nilai['jam_lembur'][$key]['nilai'] == 0) 
					{
						echo "Tidak Lembur";
					} else {
						echo "<b>Lembur</b>";
					}

					?>
				</td>
		</tr>
	<?php endforeach ?>
</tbody>
</table> --> -->

<!-- <?php  
$id_karyawan = $_GET['id'];
$detail = $karyawan->ambil_karyawan($id_karyawan);
$detail_nilai = $karyawan->ambil_detail_nilai($id_karyawan);
$data_kriteria = $kriteria->tampil();


if(!empty($detail_nilai))
{
	$detail_nilai = $detail_nilai['detail_nilai'];
} else {
	$detail_nilai = json_encode(['jam_kerja'=>[],'kehadiran'=>[],'jam_lembur'=>[]]);
}

// echo "<pre>";
// print_r ($detail_nilai);
// echo "</pre>";

?>


<h1 style="font-weight: bold;font-family: 'Agency FB'" class="text-center">Ubah Nilai Karyawan</h1>
<hr>

<div id="ubah-nilai">
	<form method="POST">

		<h3 style="font-family: cambria">Input Jam Kerja</h3>
		<hr>
		<table class="table">
			<tr>
				<th class="tanggal">Tanggal</th>
				<th>
					Jam Kerja Harian <small class="text-muted">(Jam kerja 08:00 - 21:00 | Rentang 1-8 jam / hari)</small></th>
			</tr>
			<tr v-for="(item, index) in jam_kerja" :key="index">
				<td class="text-center">{{item.tanggal}}</td>
				<td>
					<input type="hidden" :name="'jam_kerja['+index+'][tanggal]'" v-model="item.tanggal">
					<input type="hidden" :name="'jam_kerja['+index+'][nilai]'" :value="timeDiff(item.masuk, item.pulang)">
					<input type="hidden" :name="'jam_kerja['+index+'][masuk]'" v-model="item.masuk">
					<input type="hidden" :name="'jam_kerja['+index+'][pulang]'" v-model="item.pulang">
					MASUK : <vue-timepicker
							  format="HH:mm"
							  :minute-interval="15"
							  :hour-range="[8,9,10,11,12,13,14,15,16,17,18,19,20,21]"
							  manual-input
							  auto-scroll
							  @close="cek_jamkerja(index, item.masuk, item.pulang)"
							  @change="onChangeJam($event, index)"
							  v-model="item.masuk"
							  ></vue-timepicker>
					PULANG : <vue-timepicker
							  format="HH:mm"
							  :minute-interval="15"
							  :hour-range="[8,9,10,11,12,13,14,15,16,17,18,19,20,21]"
							  manual-input
							  auto-scroll
							   @close="cek_jamkerja(index, item.masuk, item.pulang)"
							   @change="onChangeJam($event, index)"
							  v-model="item.pulang"
							  ></vue-timepicker>
					<span :class="[timeDiff(item.masuk, item.pulang)>8?'text-danger':'']">JAM KERJA :  {{timeDiff(item.masuk, item.pulang)}}</span>
				</td>
			</tr>
		</table>
		<h3 style="font-family: cambria">Input Absensi Karyawan</h3>
		<hr>
		<table class="table">
			<tr>
				<th class="tanggal">Tanggal</th>
				<th>Kehadiran <small class="text-muted">(1: Hadir - 0: Tidak Hadir)</small></th>
			</tr>
			<tr v-for="(item, index) in kehadiran" :key="index">
				<td class="text-center">{{item.tanggal}}</td>
				<td>
					<input type="hidden" :name="'kehadiran['+index+'][tanggal]'" v-model="item.tanggal">
					<select v-model="item.nilai" :name="'kehadiran['+index+'][nilai]'"  @change="onChangeKehadiran($event, index)">
						<option :value="1">Hadir</option>
						<option :value="0">Tidak Hadir</option>
					</select>
				</td>
			</tr>
		</table>
		<h3 style="font-family: cambria">Input Tambahan Jam Lembur</h3>
		<hr>
		<table class="table">
			<tr>
				<th class="tanggal">Tanggal</th>
				<th>Tambahan Lembur <small class="text-muted">(Maksimal 7 kali perbulan)</small></th>
			</tr>
			<tr v-for="(item, index) in jam_lembur" :key="index">
				<td class="text-center">{{item.tanggal}}</td>
				<td>
					<input type="hidden" :name="'jam_lembur['+index+'][tanggal]'" v-model="item.tanggal">
					<select v-model="item.nilai" @change="cek_lembur(index)" :name="'jam_lembur['+index+'][nilai]'">
						<option :value="0">Tidak Lembur</option>
						<option :value="1">Lembur</option>
					</select>
				</td>
			</tr>
		</table>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th style="font-family: cambria" width="5%">No</th>
						<th style="font-family: cambria">Kriteria</th>
						<th style="font-family: cambria">Range Nilai</th>
						<th style="font-family: cambria">Nilai Inputan</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($data_kriteria as $key => $value): ?>
						<?php $data_nilai = $nilai_karyawan->cek_nilai($_GET['id'], $value['id_kriteria']); ?>
						<tr>
							<td><?php echo $key+1 ?>.</td>
							<td><?php echo $value['nama_kriteria'] ?></td>
							<td><?php echo $value['minimal_nilai']." - ". $value['maksimal_nilai'] ?></td>
							<td>
								<?php if ($value['tipe_kriteria']=='Input' && !empty($data_nilai)): ?>
									<input readonly type="number" min="<?php echo $value['minimal_nilai'] ?>" name="nilai[<?php echo $data_nilai['id_nilai_karyawan'] ?>]" class="form-control" value="<?php echo $data_nilai['nilai'] ?>" step="any" required ref="nilai-<?php echo $value['id_kriteria'] ?>">
								<?php else: ?>
									<input readonly type="number" min="<?php echo $value['minimal_nilai'] ?>" name="nilai[]" class="form-control" step="any" required ref="nilai-<?php echo $value['id_kriteria'] ?>">
								<?php endif ?>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			{{total_jamkerja()}}
			{{total_kehadiran()}}
			{{total_jamlembur()}}
			<button class="btn btn-success" name="simpan" style="font-weight: bold; font-family: 'cambria'">SIMPAN</button>
		</form>
	</div>
	<?php 
	if (isset($_POST['simpan'])) {
		$nilai_karyawan->ubah($_POST['nilai']);
		echo "<script>location='?karyawan'</script>";
	}

	?>

	<?php include 'javascript.php' ?>

 -->
