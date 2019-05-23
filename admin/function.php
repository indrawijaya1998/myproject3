<?php 
// koneksi ke database
$conn= mysqli_connect("localhost", "root", "", "pendaftaran");

function query($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
}


function registrasi ($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username 
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
	if ( mysqli_fetch_assoc($result)) {
		echo "<script>
			alert('username yang dipilih sudah terdaftar!')
		</script>";
		return false;
	}

	// cek konfirmasi password
	if($password !== $password2) {
		echo "<script>
			alert('konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}

	// enkripsi password 
	$password = password_hash($password, PASSWORD_DEFAULT);
	 //tambahkan data ke database
	mysqli_query($conn, "INSERT INTO users VALUES('','$username', '$password')");
	return mysqli_affected_rows($conn);
}

function tambah ($data) {
	global $conn;
	$nm_lengkap = $data["nm_lengkap"];
	$nis = $data["nis"];
	$jk = $data["jk"];
	$status = $data["status"];
	$tgl_lahir = $data["tgl_lahir"];
	$asal_prov = $data["asal_prov"];
	$agama = $data["agama"];
	$kwr = $data["kwr"];
	$nm_sma = $data["nm_sma"];
	$jurusan_sma= $data["jurusan_sma"];
	$alamat_sma = $data["alamat_sma"];
	$tahun_lulus_sma = $data["tahun_lulus_sma"];
	$nm_smp = $data["nm_smp"];
	$alamat_smp = $data["alamat_smp"];
	$tahun_lulus_smp = $data["tahun_lulus_smp"];
	$nm_sd= $data["nm_sd"];
	$alamat_sd = $data["alamat_sd"];
	$tahun_lulus_sd = $data["tahun_lulus_sd"];
	$nm_ayah = $data["nm_ayah"];
	$nm_ibu = $data["nm_ibu"];
	$prov_ortu = $data["prov_ortu"];
	$kota_ortu = $data["kota_ortu"];
	$alamat_ortu = $data["alamat_ortu"];	
	$kode_pos = $data["kode_pos"];
	$no_hp_ortu = $data["no_hp_ortu"];
	$pekerjaan_ayah = $data["pekerjaan_ayah"];
	$pekerjaan_ibu= $data["pekerjaan_ibu"];
	$penghasilan_ortu =$data["penghasilan_ortu"];
	$jumlah_saudara = $data["jumlah_saudara"];
	$jurusan= $data["jurusan"];
	$sumber_informasi =$data["sumber_informasi"];
	// upload gambar
	$foto = upload();
	if (!$foto ) {
		return false;
	}
	// $foto =$data["foto"];


	// query insert data
	$query = "INSERT INTO mahasiswa VALUES 
			('', '$nm_lengkap', '$nis', '$jk', '$status', '$tgl_lahir', '$asal_prov', '$agama', '$kwr', '$nm_sma', '$jurusan_sma', '$alamat_sma', '$tahun_lulus_sma','$nm_smp', '$alamat_smp', '$tahun_lulus_smp', '$nm_sd', '$alamat_sd', '$tahun_lulus_sd', '$nm_ayah', '$nm_ibu', '$prov_ortu','$kota_ortu', '$alamat_ortu', '$kode_pos', '$no_hp_ortu', '$pekerjaan_ayah', '$pekerjaan_ibu', '$penghasilan_ortu', '$jumlah_saudara', '$jurusan', '$sumber_informasi', '$foto')
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function upload() {
	$namafile = $_FILES['foto']['name'];
	$ukuranfile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];

	// cek apakah tdk ada gambar yg di upload
	if ($error === 4) {
		echo "<script>
			alert('pilih gambar terlebih dahulu');
			</script>";
			return false;
	}

	// yang boleh diupload hanya gambar
	$ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower(end($ekstensigambar));
	if (!in_array($ekstensigambar, $ekstensigambarvalid) ) {

		echo "<script>
			alert('yang anda upload bukan gambar');
			</script>";
			return false;
	}
	//cek jika ukurannya terlalu besar
	if ($ukuranfile > 1000000) {
		echo "<script>
			alert('ukuran gambar terlalu besar!');
			</script>";
			return false;
	}
	//lolos pengecekan gambar
	move_uploaded_file($tmpName, 'img/' . $namafile);

	return $namafile;

	// generate gambar baru
	$namafilebaru = uniqid();
	$namafilebaru = '.';
	$namafilebaru = $ekstensigambar;

	move_uploaded_file($tmp_name, 'img/' . $namafilebaru);

	return $namafilebaru;
}

function hapus ($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_user = $id");
	return mysqli_affected_rows($conn);
}
function ubahpendaftar ($data) {
	global $conn;
	$id_user = $data["id_user"];
	$nis = $data["nis"];
	$nm_lengkap = $data["nm_lengkap"];
	$jk = $data["jk"];
	$tempat_lahir = $data["tempat_lahir"];
	$tgl_lahir = $data["tgl_lahir"];
	$asal_prov = $data["asal_prov"];
	$kota_asal = $data["kota_asal"];
	$alamat = $data["alamat"];
	$agama = $data["agama"];
	$kwr = $data["kwr"];
	$jenjang = $data["jenjang"];
	$tahun_lulus_sma = $data["tahun_lulus_sma"];
	$kode_pos = $data["kode_pos"];
	$nm_ayah = $data["nm_ayah"];
	$nm_ibu = $data["nm_ibu"];
	$alamat_ortu = $data["alamat_ortu"];
	$no_hp_ortu = $data["no_hp_ortu"];
	$pekerjaan_ayah = $data["pekerjaan_ayah"];
	$pekerjaan_ibu= $data["pekerjaan_ibu"];
	$sumber_informasi =$data["sumber_informasi"];
	$nm_jurusan = $data["nm_jurusan"];
	$konsentrasi = $data["konsentrasi"];
	$fotolama =$data["fotolama"];
	
	if ($_FILES['foto']['error'] === 4) {
		$foto = $fotolama;	
	}else {
		$foto = upload();
	}

	// query insert
	$query = "UPDATE pendaftar SET 
				nis = '$nis',
				nm_lengkap = '$nm_lengkap',
				jk = '$jk',
				tgl_lahir ='$tgl_lahir',
				asal_prov = '$asal_prov',
				kota_asal =  '$kota_asal',
				agama = '$agama',
				kwr = '$kwr',
				jenjang =  '$jenjang',
				tahun_lulus_sma = '$tahun_lulus_sma',
				kode_pos =  '$kode_pos',
				nm_ayah = '$nm_ayah',
				nm_ibu = '$nm_ibu',
				alamat_ortu = '$alamat_ortu',
				no_hp_ortu = '$no_hp_ortu',
				pekerjaan_ayah = '$pekerjaan_ayah',
				sumber_informasi = '$sumber_informasi',
				nm_jurusan =  '$nm_jurusan',
				konsentrasi =  '$konsentrasi',
				foto = '$foto'

				WHERE id_user = $id_user
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

} 
function ubahbiaya ($data) {
	global $conn;
	$id_biaya = $data["id_biaya"];
	$kode_bank = $data["kode_bank"];
	$nama_bank = $data["nama_bank"];
	$no_rekening = $data["no_rekening"];
	$biaya_daftar = $data["biaya_daftar"];
	
	// query insert data
	$query = "UPDATE biaya_pendaftaran SET 
				kode_bank = '$kode_bank',
				nama_bank = '$nama_bank',
				no_rekening = '$no_rekening',
				biaya_daftar = '$biaya_daftar'

				WHERE id_biaya = '$id_biaya'
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

} 
function ubahjadwal ($data) {
	global $conn;
	$id_jadwal = $data["id_jadwal"];
	$nama_jalur = $data["nama_jalur"];
	$tgl_pendaftaran = $data["tgl_pendaftaran"];
	$pengumuman = $data["pengumuman"];
	
	// query insert data
	$query = "UPDATE jadwal_pendaftaran SET 
				nama_jalur = '$nama_jalur',
				tgl_pendaftaran = '$tgl_pendaftaran',
				pengumuman = '$pengumuman'

				WHERE id_jadwal = '$id_jadwal'
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function ubahpengumuman ($data) {
	global $conn;
	$id_pengumuman = $data["id_pengumuman"];
	$no_induk_siswa = $data["no_induk_siswa"];
	$nm_calon_mhs = $data["nm_calon_mhs"];
	$prodi = $data["prodi"];
	$keterangan = $data["keterangan"];
	
	// query insert data
	$query = "UPDATE pengumuman SET 
				no_induk_siswa = '$no_induk_siswa',
				nm_calon_mhs = '$nm_calon_mhs',
				prodi = '$prodi',
				keterangan = '$keterangan'

				WHERE id_pengumuman = '$id_pengumuman'
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function ubahujian ($data) {
	global $conn;
	$id_jadwal_ujian = $data["id_jadwal_ujian"];
	$hari = $data["hari"];
	$kegiatan = $data["kegiatan"];
	$waktu = $data["waktu"];
	$tempat = $data["tempat"];
	
	// query insert data
	$query = "UPDATE jadwal_ujian SET 
				hari = '$hari',
				kegiatan = '$kegiatan',
				waktu = '$waktu',
				tempat = '$tempat'

				WHERE id_jadwal_ujian = '$id_jadwal_ujian'
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

} 
function tambahjadwal ($data) {
	global $conn;
	$nama_jalur = $data["nama_jalur"];
	$tgl_pendaftaran = $data["tgl_pendaftaran"];
	$pengumuman = $data["pengumuman"];
	
	// $foto =$data["foto"];


	// query insert data
	$query = "INSERT INTO jadwal_pendaftaran VALUES 
			('', '$nama_jalur', '$tgl_pendaftaran', '$pengumuman')
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}
function tambahbiaya ($data) {
	global $conn;
	$kode_bank = $data["kode_bank"];
	$nama_bank = $data["nama_bank"];
	$no_rekening = $data["no_rekening"];
	$biaya_daftar = $data["biaya_daftar"];
	
	// $foto =$data["foto"];


	// query insert data
	$query = "INSERT INTO biaya_pendaftaran VALUES 
			('', '$kode_bank', '$nama_bank', '$no_rekening', '$biaya_daftar')
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}
function tambahpengumuman ($data) {
	global $conn;
	$no_induk_siswa= $data["no_induk_siswa"];
	$nm_calon_mhs = $data["nm_calon_mhs"];
	$prodi = $data["prodi"];
	$keterangan = $data["keterangan"];
	
	// $foto =$data["foto"];


	// query insert data
	$query = "INSERT INTO pengumuman VALUES 
			('', '$no_induk_siswa', '$nm_calon_mhs', '$prodi', '$keterangan')
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}
function tambahujian ($data) {
	global $conn;
	$hari= $data["hari"];
	$kegiatan = $data["kegiatan"];
	$waktu = $data["waktu"];
	$tempat = $data["tempat"];
	
	// $foto =$data["foto"];


	// query insert data
	$query = "INSERT INTO jadwal_ujian VALUES 
			('', '$hari', '$kegiatan', '$waktu', '$tempat')
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}
function hapusjadwal ($idjadwal) {
	global $conn;
	mysqli_query($conn, "DELETE FROM jadwal_pendaftaran WHERE id_jadwal  = $idjadwal");
	return mysqli_affected_rows($conn);
}
function hapusbiaya ($idbiaya) {
	global $conn;
	mysqli_query($conn, "DELETE FROM biaya_pendaftaran WHERE id_biaya  = $idbiaya");
	return mysqli_affected_rows($conn);
}
function hapuspengumuman ($idpengumuman) {
	global $conn;
	mysqli_query($conn, "DELETE FROM pengumuman WHERE id_pengumuman  = $idpengumuman");
	return mysqli_affected_rows($conn);
}
function hapusujian ($idujian) {
	global $conn;
	mysqli_query($conn, "DELETE FROM jadwal_ujian WHERE id_jadwal_ujian  = $idujian");
	return mysqli_affected_rows($conn);
}
function hapuspendaftar ($iduser) {
	global $conn;
	mysqli_query($conn, "DELETE FROM pendaftar WHERE id_user  = $iduser");
	return mysqli_affected_rows($conn);
}




?>