<?php
require 'function.php'; 
// AMBIL DATA DI  URL
$idjadwal = $_GET["id_jadwal"];

// query data mahasiswa berdasarkan id_JADWAL
$nama = query("SELECT * FROM jadwal_pendaftaran WHERE id_jadwal = $idjadwal")[0];

// cek apakah tombol submit sudah ditekan aatu belum
if (isset($_POST["submit"])) {
	//ambil data
	
	// cek data berhasil di ubah
	if ( ubahjadwal($_POST) > 0 ) {
		echo "<script>
			alert('data berhasil diubah!');
			document.location.href = 'table_jadwal.php';
			</script> 
			";
	}else {
		echo "<script>
			alert('data gagal diubah!');
			document.location.href = 'ubah_jadwal.php';
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
    <h3><center>Form Kelolah Data Jadwal Pendaftaran</center></h3>
    <input type="hidden" name="id_jadwal" value="<?= $nama ["id_jadwal"];?>">
    <fieldset>
      <label for="nama_jalur">Nama Jalur</label>
      <input type="text" name="nama_jalur" id="nama_jalur" required autofocus value="<?= $nama["nama_jalur"]; ?>">
    </fieldset>
    <fieldset>
      <label for="tgl_pendaftaran">Tanggal Pendaftaran</label>
      <input type="text" name="tgl_pendaftaran" id="tgl_pendaftaran" required autofocus value="<?= $nama["tgl_pendaftaran"]; ?>">
    </fieldset>
    <fieldset>
      <label for="pengumuman">Pengumuman</label>
      <input type="text" name="pengumuman" id="pengumuman" required autofocus value="<?= $nama["pengumuman"]; ?>">
    </fieldset>
   <!--  <fieldset>
      <textarea placeholder="Type your message here...." tabindex="5" required></textarea>
    </fieldset> -->
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Simpan</button>
    </fieldset>
    <a href="table_jadwal.php ">Lihat Data</a>
    <a id="kembali" href="index.php">Kembali</a>
  </form>
</div>
</body>
</html>