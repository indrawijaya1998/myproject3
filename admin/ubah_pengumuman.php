<?php
require 'function.php'; 
// AMBIL DATA DI  URL
$idpengumuman = $_GET["id_pengumuman"];

// query data mahasiswa berdasarkan id_JADWAL
$pengumuman = query("SELECT * FROM pengumuman WHERE id_pengumuman = $idpengumuman")[0];

// cek apakah tombol submit sudah ditekan aatu belum
if (isset($_POST["submit"])) {
	//ambil data
	
	// cek data berhasil di ubah
	if ( ubahpengumuman($_POST) > 0 ) {
		echo "<script>
			alert('data berhasil diubah!');
			document.location.href = 'table_pengumuman.php';
			</script> 
			";
	}else {
		echo "<script>
			alert('data gagal diubah!');
			document.location.href = 'ubah_pengumuman.php';
			</script>
			";
	}
	

}
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="forminput.css">
  <title></title>
</head>
<body>
<div class="container">  
  <form id="contact" action="" method="post" enctype="multipart/form-data" >
    <h3><center>Form Kelolah Data Pengumuman</center></h3>
    <input type="hidden" name="id_pengumuman" value="<?= $pengumuman ["id_pengumuman"];?>">
    <fieldset>
      <label for="no_induk_siswa">Nomor Induk Siswa</label>
      <input type="text" name="no_induk_siswa" id="no_induk_siswa" required autofocus value="<?= $pengumuman["no_induk_siswa"]; ?>">
    </fieldset>
    <fieldset>
      <label for="nm_calon_mhs">Nama Peserta</label>
      <input type="text" name="nm_calon_mhs" id="nm_calon_mhs" required autofocus value="<?= $pengumuman["nm_calon_mhs"]; ?>">
    </fieldset>
    <fieldset>
      <label for="prodi">Diterima di Prodi</label>
      <input type="text" name="prodi" id="prodi" required autofocus value="<?= $pengumuman["prodi"]; ?>">
    </fieldset>
    <fieldset>
      <label for="keterangan">Keterangan Kelulusan</label>
      <input type="text" name="keterangan" id="keterangan" required autofocus value="<?= $pengumuman["keterangan"]; ?>">
    </fieldset>




   <!--  <fieldset>
      <textarea placeholder="Type your message here...." tabindex="5" required></textarea>
    </fieldset> -->
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Simpan</button>
    </fieldset>
    <a href="table_ujian.php ">Lihat Data</a>
    <a id="kembali" href="index.php">Kembali</a>
  </form>
</div>
</body>
</html>