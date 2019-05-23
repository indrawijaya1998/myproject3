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
  if ( tambahbiaya ($_POST) > 0 ) {
    echo "<script>
      alert('data berhasil ditambahkan!');
      document.location.href = 'tambah_biaya.php';
      </script> 
      ";
  }else {
    echo "<script>
      alert('data gagal ditambahkan!');
      document.location.href = 'tambah_biaya.php';
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
    <h3><center>Form Input Data Biaya Pendaftaran</center></h3>
    <h4><center>Masukkan data dengan benar</center></h4>
    <fieldset>
      <label for="kode_bank">Kode Bank</label>
      <input type="text" name="kode_bank" id="kode_bank" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="nama_bank">Nama Bank</label>
      <input type="text" name="nama_bank" id="nama_bank" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="no_rekening">Nomor Rekening</label>
      <input type="text" name="no_rekening" id="no_rekening" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="biaya_daftar">Biaya Pendaftaran</label>
      <input type="text" name="biaya_daftar" id="biaya_daftar" tabindex="1" required autofocus>
    </fieldset>


   <!--  <fieldset>
      <textarea placeholder="Type your message here...." tabindex="5" required></textarea>
    </fieldset> -->
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Simpan</button>
    </fieldset>
    <a href="table_biaya.php">Lihat Data</a>
    <a id="kembali" href="index.php">Kembali</a>
  </form>
</div>
</body>
</html>
