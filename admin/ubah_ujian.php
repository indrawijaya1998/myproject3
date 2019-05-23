<?php
require 'function.php'; 
// AMBIL DATA DI  URL
$idujian = $_GET["id_jadwal_ujian"];

// query data mahasiswa berdasarkan id_JADWAL
$ujian = query("SELECT * FROM jadwal_ujian WHERE id_jadwal_ujian = $idujian")[0];

// cek apakah tombol submit sudah ditekan aatu belum
if (isset($_POST["submit"])) {
  //ambil data
  
  // cek data berhasil di ubah
  if ( ubahujian($_POST) > 0 ) {
    echo "<script>
      alert('data berhasil diubah!');
      document.location.href = 'table_ujian.php';
      </script> 
      ";
  }else {
    echo "<script>
      alert('data gagal diubah, periksa kembali data inputan anda!');
      document.location.href = 'ubah_ujian.php';
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
    <h3><center>Form Kelolah Data Jadwal Ujian</center></h3>
    <input type="hidden" name="id_jadwal_ujian" value="<?= $ujian ["id_jadwal_ujian"];?>">
    <fieldset>
      <label for="hari">Hari</label>
      <input type="text" name="hari" id="hari" required autofocus value="<?= $ujian["hari"]; ?>">
    </fieldset>
    <fieldset>
      <label for="kegiatan">Kegiatan</label>
      <input type="text" name="kegiatan" id="kegiatan" required autofocus value="<?= $ujian["kegiatan"]; ?>">
    </fieldset>
    <fieldset>
      <label for="waktu">Waktu</label>
      <input type="text" name="waktu" id="waktu" required autofocus value="<?= $ujian["waktu"]; ?>">
    </fieldset>
    <fieldset>
      <label for="tempat">Tempat</label>
      <input type="text" name="tempat" id="tempat" required autofocus value="<?= $ujian["tempat"]; ?>">
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
