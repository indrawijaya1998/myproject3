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
  if ( tambahjadwal ($_POST) > 0 ) {
    echo "<script>
      alert('data berhasil ditambahkan!');
      document.location.href = 'tambah_jadwal.php';
      </script> 
      ";
  }else {
    echo "<script>
      alert('data gagal ditambahkan!');
      document.location.href = 'tambah_jadwal.php';
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
    <h3><center>Form Input Data Jadwal Pendaftaran</center></h3>
    <h4><center>Masukkan data dengan benar</center></h4>
    <fieldset>
      <label for="nama_jalur">Nama Jalur</label>
      <input type="text" name="nama_jalur" id="nama_jalur" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="tgl_pendaftaran">Tanggal Pendaftaran</label>
      <input type="text" name="tgl_pendaftaran" id="tgl_pendaftaran" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="pengumuman">Pengumuman</label>
      <input type="text" name="pengumuman" id="pengumuman" tabindex="1" required autofocus>
    </fieldset>


   <!--  <fieldset>
      <textarea placeholder="Type your message here...." tabindex="5" required></textarea>
    </fieldset> -->
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Simpan</button>
    </fieldset>
    <a href="table_jadwal.php">Lihat Data</a>
    <a id="kembali" href="index.php">Kembali</a>
  </form>
</div>
</body>
</html>
