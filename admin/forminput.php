<?php
require 'function.php'; 
// session_start();
// if (!isset($_SESSION["login"])) {
//  header ("Location: login.php");
//  exit;

// cek apakah tombol submit sudah ditekan aatu belum
if (isset($_POST["submit"]) ) {

  // cek data berhasil di tambahkan
  if ( tambahbiaya ($_POST) > 0 ) {
    echo "<script>
      alert('data berhasil ditambahkan!');
      document.location.href = 'table_biaya.php';
      </script> 
      ";
  }else {
    echo "<script>
      alert('data gagal ditambahkan!');
      document.location.href = 'tambahbiaya.php';
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
  <form id="contact" action="" method="post">
    <h3>Form Input Data Calon Mahasiswa</h3>
    <h4>Masukkan data dengan benar</h4>
    <fieldset>
      <label for="kode_bank"></label>
      <input placeholder="Kode Bank" type="text" name="kode_bank" id="kode_bank" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="nama_bank"></label>
      <input placeholder="Nama Bank" type="text" name="nama_bank" id="nama_bank" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="no_rekening"></label>
      <input placeholder="Nomor Rekening" type="text" name="no_rekening" id="no_rekening" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="biaya_daftar"></label>
      <input placeholder="Biaya Pendaftaran" type="text" name="biaya_daftar" id="biaya_daftar" tabindex="1" required autofocus>
    </fieldset>
   <!--  <fieldset>
      <textarea placeholder="Type your message here...." tabindex="5" required></textarea>
    </fieldset> -->
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
    <p class="copyright">Designed by <a href="https://colorlib.com" target="_blank" title="Colorlib">Colorlib</a></p>
  </form>
</div>
</body>
</html>
