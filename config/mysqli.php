<?php
session_start(); 
// error_reporting(0); 

$mysqli = new mysqli("localhost","root","","spk_fuzzy_tsukamoto");

$admin	= new admin($mysqli);

class admin {
	public $koneksi;

	public function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function tampil()
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_admin");
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function ambil_admin($id)
	{
		$ambil_admin = $this->koneksi->query("SELECT * FROM tb_admin JOIN tb_karyawan ON tb_admin.id_karyawan=tb_karyawan.id_karyawan WHERE id_admin = '$id'");

		$data_pecah = $ambil_admin->fetch_assoc();
		return $data_pecah;
	}

	public function login($username, $password)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_admin WHERE username_admin = '$username'");

		if ($hasil->num_rows > 0)
		{
			$data_pecah = $hasil->fetch_assoc();
			$password_benar = $data_pecah['password_admin'];

			$password_user = $password;
			$password_user_enctypted = sha1($password);

			if ($password_user_enctypted == $password_benar) {

				$_SESSION['tb_admin']['id'] = $data_pecah['id_admin'];

				return 'Sukses';
			}
			else
			{
				return 'Salah';
			}
		}
		else
		{
			return 'tidak_ada';
		}
	}
}

$pemilik	= new pemilik($mysqli);

class pemilik {
	public $koneksi;

	public function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function tampil()
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_pemilik");
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function ambil_pemilik($id)
	{
		$ambil_pemilik = $this->koneksi->query("SELECT * FROM tb_pemilik WHERE id_pemilik = '$id'");

		$data_pecah = $ambil_pemilik->fetch_assoc();
		return $data_pecah;
	}

	public function login($username, $password)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_pemilik WHERE username = '$username'");

		if ($hasil->num_rows > 0)
		{
			$data_pecah = $hasil->fetch_assoc();
			$password_benar = $data_pecah['password'];

			$password_user = $password;
			$password_user_enctypted = sha1($password);

			if ($password_user_enctypted == $password_benar) {

				$_SESSION['tb_pemilik']['id'] = $data_pecah['id_pemilik'];

				return 'Sukses';
			}
			else
			{
				return 'Salah';
			}
		}
		else
		{
			return 'tidak_ada';
		}
	}
}

$karyawan = new karyawan($mysqli);

class karyawan {
	public $koneksi;

	public function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function loginkaryawan($username, $password)
	{
		$hasil = $this->koneksi->query("SELECT * FROM login_karyawan WHERE username= '$username'");

		if ($hasil->num_rows > 0) 
		{
			$data_pecah = $hasil->fetch_assoc();
			$password_benar = $data_pecah['password'];

			$password_user = $password;
			$password_user_encrypted = sha1($password);

			if ($password_user_encrypted == $password_benar) {
				
				$_SESSION['karyawan']['id'] = $data_pecah['id_karyawan'];

				return 'sukses';
			}
			else {
				return 'salah';
			}
		} else {
			return 'tidak_ada';
		}
	}

	public function tampil($order_by='')
	{
		if (!empty($order_by)) {
			$hasil = $this->koneksi->query("SELECT * FROM tb_karyawan ORDER BY $order_by ");
		} else {
			$hasil = $this->koneksi->query("SELECT * FROM tb_karyawan");
		}
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc()) 
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function tambah($nip, $nama, $jenis_kelamin, $tgl_lahir, $alamat, $no_hp, $email, $foto)
	{
		$nama_file = $foto['name'];

		$lokasi_sementara = $foto['tmp_name'];

		$nama_file_renamed = date('Y-m-d_h-i-s') . '_' . $nama_file;

		move_uploaded_file($lokasi_sementara, "gambar/$nama_file_renamed");

		$this->koneksi->query("INSERT INTO tb_karyawan (nip, nama_karyawan, jk_karyawan, tgl_lahir, alamat_karyawan, no_hp_karyawan, email, foto_karyawan) VALUES ('$nip', '$nama', '$jenis_kelamin', '$tgl_lahir', '$alamat', '$no_hp', '$email', '$nama_file_renamed')");

		return 'sukses';
	}

	public function ambil_karyawan($id)
	{
		$ambil_karyawan = $this->koneksi->query("SELECT * FROM tb_karyawan WHERE id_karyawan='$id' ");

		$data_pecah = $ambil_karyawan->fetch_assoc();

		return $data_pecah;
	}

	public function ambil_detail_nilai($id)
	{
		$bulan = date("m");
		$ambil = $this->koneksi->query("SELECT * FROM tb_detail_nilai WHERE id_karyawan='$id' AND bulan_nilai = '$bulan' ");

		$data_pecah = $ambil->fetch_assoc();

		return $data_pecah;
	}

	public function ubah($nip, $nama, $jenis_kelamin, $tgl_lahir, $alamat, $no_hp, $email, $foto, $id)
	{
		$nama_foto = $foto['name'];

		$lokasi_foto = $foto['tmp_name'];

		if (!empty($lokasi_foto)) 
		{
			$detail_karyawan = $this->ambil_karyawan($id);

			$foto_lama = $detail_karyawan["foto_karyawan"];

			if (file_exists("gambar/$foto_lama")) 
			{
				unlink("gambar/$foto_lama");
			}

			$ekstensi_foto = pathinfo($nama_foto, PATHINFO_EXTENSION);

			$ekstensi_boleh = array("jpg", "jpeg", "JPG", "JPEG", "PNG", "png");

			if (in_array($ekstensi_foto, $ekstensi_boleh))
			{
				$nama_fiks = date("Y_m_d_H_m_d")."_".$nama_foto;

				move_uploaded_file($lokasi_foto, "gambar/$nama_fiks");

				$this->koneksi->query("UPDATE tb_karyawan SET nip='$nip', nama_karyawan='$nama', jk_karyawan='$jenis_kelamin', tgl_lahir='$tgl_lahir', email='$email', alamat_karyawan='$alamat', no_hp_karyawan='$no_hp', foto_karyawan='$nama_fiks' WHERE id_karyawan='$id'");

				return "sukses";
			}

			else
			{
				return "gagal";
			}
		}
		else
		{
			$this->koneksi->query("UPDATE tb_karyawan SET nip='$nip', nama_karyawan='$nama', jk_karyawan='$jenis_kelamin', tgl_lahir='$tgl_lahir', email='$email', alamat_karyawan='$alamat', no_hp_karyawan='$no_hp' WHERE id_karyawan='$id'");

			return "sukses";
		}
	}
	public function hapus($id)
	{
		$this->koneksi->query("DELETE FROM tb_karyawan WHERE id_karyawan='$id' ");
		if (mysqli_error($this->koneksi)){
			return "gagal";
		}
	}
}

$nilai_karyawan = new nilai_karyawan($mysqli);
class nilai_karyawan{

	public $koneksi;
	public function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function tampil($id_karyawan)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_nilai_karyawan WHERE id_karyawan='$id_karyawan' ");
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function ubah($data_nilai)
	{
		foreach ($data_nilai as $id_nilai_karyawan => $nilai)
		{
			$this->koneksi->query(" UPDATE tb_nilai_karyawan SET nilai='$nilai' WHERE id_nilai_karyawan='$id_nilai_karyawan'");

			$nilai_k = $this->koneksi->query("SELECT * FROM tb_nilai_karyawan WHERE id_nilai_karyawan = '$id_nilai_karyawan'")->fetch_assoc() or die(mysqli_error($this->koneksi));


		}

		echo "<pre>";
		print_r ($nilai_k);
		echo "</pre>";
		

		$this->simpan_detail_nilai($nilai_k['id_karyawan']);

		return 'sukses';

	}

	public function simpan($id_karyawan, $data_nilai, $id_admin)
	{
		foreach ($data_nilai as $id_kriteria => $nilai)
		{
			$this->koneksi->query("INSERT INTO tb_nilai_karyawan (id_karyawan, id_kriteria, id_admin, nilai) VALUES ('$id_karyawan', '$id_kriteria', '$id_admin', '$nilai')") or die(mysqli_error($this->koneksi));
		}	

		$this->simpan_detail_nilai($id_karyawan);

		return 'sukses';


	}

	public function simpan_detail_nilai($id_karyawan)
	{
		date_default_timezone_set("Asia/Jakarta");

		$inputan = $_POST;
		$inputan['waktu_hitung'] = date("Y-m-d H:i:s");

		unset($inputan['simpan']);
		unset($inputan['nilai']);


		// echo "<pre>";
		// print_r ($inputan);
		// echo "</pre>";
		// die;


		$data_detail_nilai = json_encode($inputan);
		$bulan = date("m");

		// cek detail nilai di bulan ini sudah ada atau belum?
		$cek = $this->koneksi->query("SELECT * FROM tb_detail_nilai WHERE bulan_nilai = '$bulan' WHERE id_karyawan = '$id_karyawan' ")->num_rows;

		// echo $cek; die;
		if($cek < 1) {
			$this->koneksi->query("INSERT INTO tb_detail_nilai (id_karyawan, bulan_nilai, detail_nilai) VALUES ('$id_karyawan','$bulan','$data_detail_nilai') ") or die(mysqli_error($this->koneksi));
		} else {
			$this->koneksi->query("UPDATE tb_detail_nilai SET id_karyawan = '$id_karyawan', bulan_nilai = '$bulan', detail_nilai = '$data_detail_nilai' ") or die(mysqli_error($this->koneksi));
		}

		return 'sukses';
	}

	public function cek_nilai($id_karyawan, $id_kriteria)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_nilai_karyawan WHERE id_karyawan='$id_karyawan' AND id_kriteria= '$id_kriteria'");
		$data_pecah = $hasil->fetch_assoc();
		return $data_pecah;
	}
}


$kriteria = new kriteria($mysqli);

class kriteria {
	public $koneksi;

	public function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function tampil()
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_kriteria");
		$wadah = array();
		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function tambah($nama_kriteria, $minimal_nilai, $maksimal_nilai)
	{
		$hasil = $this->koneksi->query("INSERT INTO tb_kriteria (nama_kriteria, minimal_nilai, maksimal_nilai) VALUES ('$nama_kriteria', '$minimal_nilai', '$maksimal_nilai')");
		return "sukses";
	}

	public function ambil_kriteria($id)
	{
		$ambil_kriteria = $this->koneksi->query("SELECT * FROM tb_kriteria WHERE id_kriteria='$id'");

		$data_pecah = $ambil_kriteria->fetch_assoc();

		return $data_pecah;
	}
	public function ubah($nama, $minimal_nilai, $maksimal_nilai, $id)
	{
		$get_kriteria = $this->ambil_kriteria($id);

		$hasil = $this->koneksi->query("UPDATE tb_kriteria SET nama_kriteria='$nama', minimal_nilai='$minimal_nilai', maksimal_nilai='$maksimal_nilai' WHERE id_kriteria='$id'");
		return "sukses";
	}
	public function hapus($id)
	{
		$this->koneksi->query("DELETE FROM tb_kriteria WHERE id_kriteria='$id'");
	}

}

$himpunan = new himpunan($mysqli);

class himpunan {
	public $koneksi;

	public function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function tampil($id_kriteria)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_himpunan JOIN tb_kriteria ON tb_himpunan.id_kriteria=tb_kriteria.id_kriteria WHERE tb_himpunan.id_kriteria='$id_kriteria' ");
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function tambah_himpunan($id, $nama, $ba, $bt1, $bt2, $bb)
	{
		$hasil = $this->koneksi->query("INSERT INTO tb_himpunan(id_kriteria, nama_himpunan, batas_bawah_himpunan, batas_tengah1_himpunan, batas_tengah2_himpunan, batas_atas_himpunan) VALUES ('$id', '$nama', '$bb', '$bt1', '$bt2', '$ba' )");
		return "sukses";
	}

	public function ambil_himpunan($id_himpunan)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_himpunan JOIN tb_kriteria ON tb_himpunan.id_kriteria=tb_kriteria.id_kriteria WHERE id_himpunan='$id_himpunan' ");
		$data_pecah = $hasil->fetch_assoc();
		return $data_pecah;
	}

	public function ubah($nama, $ba, $bt1, $bt2, $bb, $id_himpunan)
	{
		$get_himpunan = $this->ambil_himpunan($id_himpunan);

		$hasil = $this->koneksi->query("UPDATE tb_himpunan SET nama_himpunan='$nama', batas_atas_himpunan='$ba', batas_tengah1_himpunan='$bt1', batas_tengah2_himpunan='$bt2', batas_bawah_himpunan='$bb' WHERE id_himpunan='$id_himpunan'");
		return "sukses";
	}

	public function hapus($id)
	{
		$this->koneksi->query("DELETE FROM tb_himpunan WHERE id_himpunan='$id'");
	}

	public function max_bawah($id_kriteria)
	{
		$ambil = $this->koneksi->query("SELECT MAX(batas_bawah_himpunan) as max FROM tb_himpunan WHERE id_kriteria='$id_kriteria'");
		$array = $ambil->fetch_assoc();
		return $array['max'];
	}

	public function max_atas($id_kriteria)
	{
		$ambil = $this->koneksi->query("SELECT MAX(batas_atas_himpunan) as max FROM tb_himpunan WHERE id_kriteria='$id_kriteria'");
		$array = $ambil->fetch_assoc();
		return $array['max'];
	}

	public function min_bawah($id_kriteria)
	{
		$ambil = $this->koneksi->query("SELECT MIN(batas_bawah_himpunan) as min FROM tb_himpunan WHERE id_kriteria='$id_kriteria'");
		$array = $ambil->fetch_assoc();
		return $array['min'];
	}

}


$aturan = new aturan($mysqli);

class aturan {
	public $koneksi;

	public function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function tampil()
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_aturan");
		$wadah = array();
		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function tambah($nama_aturan, $hasil_aturan)
	{
		$hasil = $this->koneksi->query("INSERT INTO tb_aturan (nama_aturan, hasil_aturan) VALUES ('$nama_aturan', '$hasil_aturan')");
		return "sukses";
	}

	public function ambil_aturan($id)
	{
		$ambil_aturan = $this->koneksi->query("SELECT * FROM tb_aturan WHERE id_aturan='$id'");

		$data_pecah = $ambil_aturan->fetch_assoc();

		return $data_pecah;
	}
	public function ubah($nama_aturan, $hasil_aturan, $id_aturan)
	{
		$get_aturan = $this->ambil_aturan($id);

		$hasil = $this->koneksi->query("UPDATE tb_aturan SET nama_aturan='$nama_aturan', hasil_aturan='$hasil_aturan' WHERE id_aturan='$id_aturan'");
		return "sukses";
	}
	public function hapus($id_aturan)
	{
		$this->koneksi->query("DELETE FROM tb_aturan WHERE id_aturan='$id_aturan'");
	}

}

$detail_aturan = new detail_aturan($mysqli);

class detail_aturan {
	public $koneksi;

	public function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function tampil($id_aturan)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_detail_aturan JOIN tb_aturan ON tb_detail_aturan.id_aturan=tb_aturan.id_aturan WHERE tb_detail_aturan.id_aturan='$id_aturan' ");
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function simpan($data_himpunan, $id_aturan)
	{
		foreach ($data_himpunan as $id_kriteria => $id_himpunan) {
			$cek_detail = $this->koneksi->query("SELECT * FROM tb_detail_aturan JOIN tb_himpunan ON tb_himpunan.id_himpunan=tb_detail_aturan.id_himpunan WHERE id_aturan='$id_aturan' AND id_kriteria='$id_kriteria' ");
			$hitung = $cek_detail->num_rows;
			if ($hitung==0) {
				$this->koneksi->query("INSERT INTO tb_detail_aturan (id_aturan, id_himpunan) VALUES ('$id_aturan', '$id_himpunan')");
			} else {
				$array_detail = $cek_detail->fetch_assoc();
				$id_detail_aturan = $array_detail['id_detail_aturan'];
				$this->koneksi->query("UPDATE tb_detail_aturan SET id_himpunan='$id_himpunan' WHERE id_detail_aturan='$id_detail_aturan' ");
			}
		}
	}
}

$perhitungan = new perhitungan($mysqli);

class perhitungan {
	public function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function hitung()
	{
		$karyawan = new karyawan($this->koneksi);
		$kriteria = new kriteria($this->koneksi);
		$himpunan = new himpunan($this->koneksi);
		$nilai_karyawan = new nilai_karyawan($this->koneksi);
		$aturan = new aturan($this->koneksi);
		$detail_aturan = new detail_aturan($this->koneksi);

		// 1. Ambil dan memperulangkan semua data karyawan
		// 2. Ambil dan memperulangkan kriteria
		// 3. Mengambil nilai pelamar untuk menentukan rumus
		// 4. Ambil dan memperulangkan data himpunan berdasarkan kriteria
		// 5. Menentukan rumus mana yang mau dipakai
		// 6. Menghitung berdasarkan rumus yang diambil
		// 7. Ambil dan memperulangkan data aturan
		// 8. Masukkan hasil perhitungan rumus ke dalam aturan
		// 9. Diambil nilai minimal_nilai
		// 10. Mencari Nilai z

		// 1.
		$dkaryawan = $karyawan->tampil();
		$dk = $kriteria->tampil();
		$da = $aturan->tampil();
		foreach ($dkaryawan as $kkaryawan => $vkaryawan) {
			$ikaryawan = $vkaryawan['id_karyawan'];
			foreach ($dk as $kk => $vk) {
				$ik = $vk['id_kriteria'];
				//3.
				$dnilaikaryawan = $nilai_karyawan->cek_nilai($ikaryawan,$ik);
				$inilaikaryawan = $dnilaikaryawan['id_nilai_karyawan'];
				$nilai = $dnilaikaryawan['nilai'];

				// 4.
				$dh = $himpunan->tampil($ik);

				// 
				foreach ($dh as $kh => $vh) {
					$ih = $vh['id_himpunan'];
					$b = $vh['batas_bawah_himpunan'];
					$t1 = $vh['batas_tengah1_himpunan'];
					$t2 = $vh['batas_tengah2_himpunan'];
					$a = $vh['batas_atas_himpunan'];

					//5. dan 6.
					// BENTUK GRAFIK DENGAN 1 NILAI TENGAH / LANCIP----------------------------
					if (($b!==$t1) AND ($t1==$t2)) {
						if($b < $a) {
							if(($nilai <= $b) OR ($nilai > $a)){
								$keanggotaan[$ikaryawan][$ih] = 0;

							}
							elseif (($nilai > $b) AND ($nilai <= $t1)) {
								$keanggotaan[$ikaryawan][$ih] = round(($nilai - $b) / ($t1 - $b), 3);

							}
							elseif (($nilai > $t1) AND ($nilai <= $a)) {
								$keanggotaan[$ikaryawan][$ih] = round(($a - $nilai) / ($a - $t1), 3);
							}
						} elseif ($b > $a) {
							if(($nilai < $a) OR ($nilai > $b)){
								$keanggotaan[$ikaryawan][$ih] = 0;
							}
							elseif (($nilai >= $a) AND ($nilai <= $t1)) {
								$keanggotaan[$ikaryawan][$ih] = round(($nilai - $a) / ($t1 - $a), 3);
							}
							elseif (($nilai > $t1) AND ($nilai <= $b)) {
								$keanggotaan[$ikaryawan][$ih] = round(($b - $nilai) / ($b - $t1), 3);
							}
						}

					}
					// BENTUK GRAFIK DENGAN 2 NILAI TENGAH / TRAPESIUM--------------------------
					elseif (($b!==$t1) AND ($t1!==$t2)) {
						if(($nilai <= $b) OR ($nilai > $a)){
							$keanggotaan[$ikaryawan][$ih] = 0;
						}
						elseif (($nilai > $t1) AND ($nilai <= $t2)) {
							$keanggotaan[$ikaryawan][$ih] = round(($nilai - $t1) / ($t2 - $t1), 3);
						}
						elseif (($nilai > $t2) AND ($nilai <= $a)) {
							$keanggotaan[$ikaryawan][$ih] = round(($a - $nilai) / ($a - $t2), 3);
						}
					}
					// BENTUK GRAFIK TANPA NILAI TENGAH / LANDAI----------------------------------
					elseif (($b==$t1) AND ($b==$t2) AND ($b!==$a)) {
						if($b < $a) {
							if (($b == 10) OR ($b==1)) {
								if ($nilai <= $b) {
									$keanggotaan[$ikaryawan][$ih] = 1;
								}
								elseif (($nilai > $b) AND ($nilai <= $a)) {
									$keanggotaan[$ikaryawan][$ih] = round(($a - $nilai) / ($a - $b), 3);
								}

								elseif ($nilai > $a) {
									$keanggotaan[$ikaryawan][$ih] = 0;
								}

							} 
							else {
								if($nilai <= $b){
									$keanggotaan[$ikaryawan][$ih] = 0;
								}
								elseif (($nilai > $b) AND ($nilai <= $a)) {
									$keanggotaan[$ikaryawan][$ih] = round(($nilai - $b) / ($a - $b), 3);
								}
								elseif($nilai > $a) {
								// Mengambil nilai bawah paling besar
									$max_bawah = $himpunan->max_bawah($ik);
								// Jika nilai bawah paling besar, maka jika nilai lebih dr batas_atas maka hasilnya 1.
								// Selain itu maka 0
									if($b == $max_bawah) {
										$keanggotaan[$ikaryawan][$ih] = 1;
									} elseif ($b !== $max_bawah) {
										$keanggotaan[$ikaryawan][$ih] = 0;
									}
								}
							}


						} elseif ($b > $a) {
							// Mengambil nilai atas paling besar
							$max_atas = $himpunan->max_atas($ik);
							$min_bawah = $himpunan->min_bawah($ik);
							// Jika nilai atas paling besar, maka jika nilai lebih dr batas_atas maka hasilnya 1.
							// Selain itu maka 0
							if(($a == $max_atas) AND ($b !== $min_bawah)) {
								if($nilai <= $a){
									$keanggotaan[$ikaryawan][$ih] = 0;
								}
								elseif (($nilai > $a) AND ($nilai <= $b)) {
									$keanggotaan[$ikaryawan][$ih] = round(($nilai - $a) / ($b - $a), 3);
								}
								elseif($nilai > $b) {
									$keanggotaan[$ikaryawan][$ih] = 1;
								}
							} elseif ($b == $min_bawah) {
								if($nilai > $b){
									$keanggotaan[$ikaryawan][$ih] = 0;
								}
								elseif (($nilai >= $a) AND ($nilai <= $b)) {
									$keanggotaan[$ikaryawan][$ih] = round(($b - $nilai) / ($b - $a), 3);
								}
								elseif($nilai < $a) {
									$keanggotaan[$ikaryawan][$ih] = 1;
								}
							}
						}
					}
					// JIKA TANPA GRAFIK----------------------------------------------------------
					elseif (($b==$t1) AND ($b==$t2) AND ($b==$a)) {
						if($nilai == $b){
							$keanggotaan[$ikaryawan][$ih] = 1;
						}
						elseif ($nilai !== $b) {
							$keanggotaan[$ikaryawan][$ih] = 0;
						}
					}
				}
			}


			// 7.
			foreach ($da as $ka => $va) {
				$ia = $va['id_aturan'];
				$keputusan[$ia] = $va['hasil_aturan'];


				 	// 8.
				$dda = $detail_aturan->tampil($ia);

				
				foreach ($dda as $kda => $vda) {
				 		// 9.
					if (isset($keanggotaan[$ikaryawan][$vda['id_himpunan']])) {
						$fire_strength[$ikaryawan][$ia][$vda['id_himpunan']] = $keanggotaan[$ikaryawan][$vda['id_himpunan']];
					}
				}
			} 
		} 


		// 10.
		foreach ($fire_strength as $ikaryawan => $vkaryawan) {
			foreach ($vkaryawan as $ia => $va) {
				$hasil_fire_strength[$ikaryawan][$ia] = min($va);
				if ($keputusan[$ia] == "Berprestasi") 
				{
					$z[$ikaryawan][$ia] = 70 + ((min($va)) * (95-70));
				}
				elseif ($keputusan[$ia] == "Tidak Berprestasi")
				{
					$z[$ikaryawan][$ia] = 95 - ((95-70) * (min($va)));	
				}
				foreach ($hasil_fire_strength as $ikaryawan => $vkaryawan) {
					$penyebut[$ikaryawan] = array_sum($vkaryawan);
				}
			}
		}

		// 11.

		foreach ($z as $ikaryawan => $vkaryawan) 
		{
				//$penyebut[$ikaryawan] = array_sum($vkaryawan);

			foreach ($vkaryawan as $ia => $va) 
			{
				$pembilang[$ikaryawan][$ia] = round(($hasil_fire_strength[$ikaryawan][$ia] * $va), 3);
			}	
		}

		// 12.

		foreach ($pembilang as $ikaryawan => $vkaryawan) {
			if ($penyebut[$ikaryawan] > 0) 
			{
				$skor[$ikaryawan] = round((array_sum($vkaryawan) / $penyebut[$ikaryawan]), 3);
			}
			else 
			{
				$skor[$ikaryawan] = 0;
			}

		}

		// echo "<pre>";
		// print_r ($pembilang);
		// echo "</pre>";


		// 13.

		$akan_diurutkan = $skor;
		arsort($akan_diurutkan);
		$no = 1;
		foreach ($akan_diurutkan as $ikaryawan => $value) {
			$ranking[$no] = $ikaryawan;
			$no += 1;
		}

		// echo "<pre>";
		// print_r ($skor);
		// echo "</pre>";

		// Menyimpan Hasil Perhitungan
		foreach ($ranking as $urutan => $ikaryawan) {
			$nilai_karyawan_fuzzy = $skor[$ikaryawan]; 
			if ($nilai_karyawan_fuzzy > 80) {
				$status = "Berprestasi";
			} else {
				$status = "Tidak Berprestasi";
			}

			$sekarang = date("Y-m-d");

			$this->koneksi->query("UPDATE tb_karyawan SET ranking='$urutan', nilai='$nilai_karyawan_fuzzy', status='$status', tgl_hitung='$sekarang'  WHERE id_karyawan='$ikaryawan' ");
		}
	}

}	 
?>