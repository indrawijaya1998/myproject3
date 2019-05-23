<?php
require 'function.php'; 
// session_start();
// if (!isset($_SESSION["login"])) {
//   header ("Location: login.php");
//   exit;
// }

// cek apakah tombol submit sudah ditekan aatu belum
if (isset($_POST["submit"]) ) {
  
  // cek data berhasil di tambahkan
  if ( tambahujian ($_POST) > 0 ) {
    echo "<script>
      alert('data berhasil ditambahkan!');
      document.location.href = 'tambah_ujian.php';
      </script> 
      ";
  }else {
    echo "<script>
      alert('data gagal ditambahkan periksa kembali data inputan anda!');
      document.location.href = 'tambah_ujian.php';
      </script>";
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
    <h3><center>Form Input Data Jadwal Ujian</center></h3>
    <h4><center>Masukkan data dengan benar</center></h4>
    <fieldset>
      <label for="hari">Hari</label>
      <input type="text" name="hari" id="hari" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="kegiatan">Kegiatan</label>
      <input type="text" name="kegiatan" id="kegiatan" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="waktu">Waktu</label>
      <input type="text" name="waktu" id="waktu" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="tempat">Tempat</label>
      <input type="text" name="tempat" id="tempat" tabindex="1" required autofocus>
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
