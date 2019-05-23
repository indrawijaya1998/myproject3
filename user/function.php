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
	$first_name = strtolower(stripslashes($data["first_name"]));
	$last_name = strtolower(stripslashes($data["last_name"]));
	$email = strtolower(stripslashes($data["email"]));
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username 
	$result = mysqli_query($conn, "SELECT username FROM registrasi WHERE username = '$username'");
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
	mysqli_query($conn, "INSERT INTO registrasi VALUES('','$first_name','$last_name','$email','$username','$password')");
	return mysqli_affected_rows($conn);
}

function tambah ($data) {
	global $conn;
	$nis = $data["nis"];
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
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
	$kode_pos = $data["kode_pos"];
	$no_hp_ortu = $data["no_hp_ortu"];
	$pekerjaan_ayah = $data["pekerjaan_ayah"];
	$pekerjaan_ibu= $data["pekerjaan_ibu"];
	$sumber_informasi =$data["sumber_informasi"];
	$nm_jurusan =$data["nm_jurusan"];
	$konsentrasi =$data["konsentrasi"];
	// upload gambar
	$foto = upload();
	if (!$foto ) {
		return false;
	}
	// $foto =$data["foto"];
	if($password !== $password2) {
		echo "<script>
			alert('konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}

	// enkripsi password 
	$password = password_hash($password, PASSWORD_DEFAULT);


	// query insert data
	$query = "INSERT INTO pendaftar VALUES 
			('', '$nis', '$password', '$nm_lengkap', '$jk', '$tempat_lahir', '$tgl_lahir', '$asal_prov', '$kota_asal', '$alamat', '$agama', '$kwr', '$jenjang', '$tahun_lulus_sma', '$kode_pos', '$nm_ayah', '$nm_ibu', '$alamat_ortu', '$no_hp_ortu', '$pekerjaan_ayah', '$pekerjaan_ibu', '$sumber_informasi', '$nm_jurusan', '$konsentrasi', '$foto')
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambahkonfirmasi ($data) {
	global $conn;
	$nis = $data["nis"];
	$nm_pendaftar =$data["nm_pendaftar"];
	// upload gambar
	$foto_bukti = uploadbukti();
	if (!$foto_bukti ) {
		return false;
	}

	// query insert data
	$query = "INSERT INTO konfirmasi VALUES 
			('$nis', '$nm_pendaftar', '$foto_bukti')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function uploadbukti() {
	$namafile = $_FILES['foto_bukti']['name'];
	$ukuranfile = $_FILES['foto_bukti']['size'];
	$error = $_FILES['foto_bukti']['error'];
	$tmpName = $_FILES['foto_bukti']['tmp_name'];

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
function ubah ($data) {
	global $conn;
	$id_user = $data["id_user"];
	$nm_lengkap = $data["nm_lengkap"];
	$nis = $data["nis"];
	$jk = $data["jk"];
	$status = $data["status"];
	$tempat_lahir = $data["tempat_lahir"];
	$tgl_lahir = $data["tgl_lahir"];
	$asal_prov = $data["asal_prov"];
	$kota_asal = $data["kota_asal"];
	$alamat = $data["alamat"];
	$agama = $data["agama"];
	$kwr = $data["kwr"];
	$tahun_lulus_sma = $data["tahun_lulus_sma"];
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
	$sumber_informasi =$data["sumber_informasi"];
	$fotolama =$data["fotolama"];
	// cek apakah user baru merubah gambar
	if ($_FILES['foto']['error'] === 4) {
		$foto = $fotolama;	
	}else {
		$foto = upload();
	}

	// query insert data
	$query = "UPDATE mahasiswa SET 
				nm_lengkap = '$nm_lengkap',
				nis = '$nis',
				jk = '$jk',
				status = '$status',
				tempat_lahir = '$tempat_lahir',
				tgl_lahir ='$tgl_lahir',
				asal_prov = '$asal_prov',
				kota_asal = '$kota_asal',
				alamat = '$alamat',
				agama = '$agama',
				kwr = '$kwr',
				tahun_lulus_sma = '$tahun_lulus_sma',
				nm_ayah = '$nm_ayah',
				nm_ibu = '$nm_ibu',
				prov_ortu = '$prov_ortu',
				kota_ortu = '$kota_ortu',
				alamat_ortu = '$alamat_ortu',
				kode_pos = '$kode_pos',
				no_hp_ortu = '$no_hp_ortu',
				pekerjaan_ayah = '$pekerjaan_ayah',
				penghasilan_ortu = '$penghasilan_ortu',
				jumlah_saudara = '$jumlah_saudara',
				sumber_informasi = '$sumber_informasi',
				foto = '$foto'

				WHERE id_user = '$id_user'
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
	$tgl_mulai = $data["tgl_mulai"];
	$tgl_akhir = $data["tgl_akhir"];
	$pengumuman = $data["pengumuman"];
	
	// query insert data
	$query = "UPDATE jadwal_pendaftaran SET 
				nama_jalur = '$nama_jalur',
				tgl_mulai = '$tgl_mulai',
				tgl_akhir = '$tgl_akhir',
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
function hapususer ($iduser) {
	global $conn;
	mysqli_query($conn, "DELETE FROM registrasi WHERE id_user  = $iduser");
	return mysqli_affected_rows($conn);
}




?>