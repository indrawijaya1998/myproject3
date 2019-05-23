<?php
require 'function.php'; 
// AMBIL DATA DI  URL
$idbiaya = $_GET["id_biaya"];

// query data mahasiswa berdasarkan id_JADWAL
$pendaftaran = query("SELECT * FROM biaya_pendaftaran WHERE id_biaya = $idbiaya")[0];

// cek apakah tombol submit sudah ditekan aatu belum
if (isset($_POST["submit"])) {
	//ambil data
	
	// cek data berhasil di ubah
	if ( ubahbiaya($_POST) > 0 ) {
		echo "<script>
			alert('data berhasil diubah!');
			document.location.href = 'table_biaya.php';
			</script> 
			";
	}else {
		echo "<script>
			alert('data gagal diubah!');
			document.location.href = 'ubah_biaya.php';
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
    <h3><center>Form Kelolah Data Biaya Pendaftaran</center></h3>
    <input type="hidden" name="id_biaya" value="<?= $pendaftaran ["id_biaya"];?>">
    <fieldset>
      <label for="kode_bank">Kode Bank</label>
      <input type="text" name="kode_bank" id="kode_bank" required autofocus value="<?= $pendaftaran["kode_bank"]; ?>">
    </fieldset>
    <fieldset>
      <label for="nama_bank">Nama BANK</label>
      <input type="text" name="nama_bank" id="nama_bank" required autofocus value="<?= $pendaftaran["nama_bank"]; ?>">
    </fieldset>
    <fieldset>
      <label for="no_rekening">Nomor Rekening</label>
      <input type="text" name="no_rekening" id="no_rekening" required autofocus value="<?= $pendaftaran["no_rekening"]; ?>">
    </fieldset>
    <fieldset>
      <label for="biaya_daftar">Biaya Pendafataran</label>
      <input type="text" name="biaya_daftar" id="biaya_daftar" required autofocus value="<?= $pendaftaran["biaya_daftar"]; ?>">
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