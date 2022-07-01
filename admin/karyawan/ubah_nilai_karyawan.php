<?php  
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


<h1 style="font-family: 'cambria'">Ubah Nilai Karyawan</h1>
<br>

<div id="ubah-nilai">
	<form method="POST">

		<h3>Input Jam Kerja</h3>
		<hr>
		<table class="table">
			<tr>
				<th class="tanggal">Dihari</th>
				<th>
					Jam Kerja <small class="text-muted">(Jam kerja 08:00 - 21:00)</small></th>
			</tr>
			<tr v-for="(item, index) in jam_kerja" :key="index">
				<td>{{item.tanggal}}</td>
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
		<h3>Input Kehadiran</h3>
		<hr>
		<table class="table">
			<tr>
				<th class="tanggal">Dihari</th>
				<th>Kehadiran <small class="text-muted">(1: Hadir - 0: Tidak Hadir)</small></th>
			</tr>
			<tr v-for="(item, index) in kehadiran" :key="index">
				<td>{{item.tanggal}}</td>
				<td>
					<input type="hidden" :name="'kehadiran['+index+'][tanggal]'" v-model="item.tanggal">
					<select v-model="item.nilai" :name="'kehadiran['+index+'][nilai]'"  @change="onChangeKehadiran($event, index)">
						<option :value="1">Hadir</option>
						<option :value="0">Tidak Hadir</option>
					</select>
				</td>
			</tr>
		</table>
		<h3>Input Jam Lembur</h3>
		<hr>
		<table class="table">
			<tr>
				<th class="tanggal">Dihari</th>
				<th>Lembur <small class="text-muted">(Maksimal 7 kali perbulan)</small></th>
			</tr>
			<tr v-for="(item, index) in jam_lembur" :key="index">
				<td>{{item.tanggal}}</td>
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
						<th>No</th>
						<th>Kriteria</th>
						<th>Range Nilai</th>
						<th>Nilai</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($data_kriteria as $key => $value): ?>
						<?php $data_nilai = $nilai_karyawan->cek_nilai($_GET['id'], $value['id_kriteria']); ?>
						<tr>
							<td><?php echo $key+1 ?></td>
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
		echo "<script>alert('Nilai Berhasil Dihitung Ulang !!!');</script>";
		// $perhitungan->hitung();
		// echo "<script>location='?karyawan'</script>";
		echo "<script>location='index.php?karyawan=detail&id=".$id_karyawan."'</script>";
	}

	?>

	<?php include 'javascript.php' ?>
