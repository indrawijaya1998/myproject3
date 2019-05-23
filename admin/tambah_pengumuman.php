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
  if ( tambahpengumuman ($_POST) > 0 ) {
    echo "<script>
      alert('data berhasil ditambahkan!');
      document.location.href = 'tambah_pengumuman.php';
      </script> 
      ";
  }else {
    echo "<script>
      alert('data gagal ditambahkan periksa kembali data inputan anda!');
      document.location.href = 'tambah_pengumuman.php';
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
    <h3><center>Form Input Data Hasil Seleksi</center></h3>
    <h4><center>Masukkan data dengan benar</center></h4>
    <fieldset>
      <label for="no_induk_siswa">Nomor Induk Siswa</label>
      <input type="text" name="no_induk_siswa" id="no_induk_siswa" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="nm_calon_mhs">Nama Calon Mahasiswa</label>
      <input type="text" name="nm_calon_mhs" id="nm_calon_mhs" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="prodi">Diterima di Prodi</label>
      <input type="text" name="prodi" id="prodi" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="keterangan">Keterangan Kelulusan</label>
      <input type="text" name="keterangan" id="keterangan" tabindex="1" required autofocus>
    </fieldset>




   <!--  <fieldset>
      <textarea placeholder="Type your message here...." tabindex="5" required></textarea>
    </fieldset> -->
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Simpan</button>
    </fieldset>
    <a href="table_pengumuman.php">Lihat Data</a>
    <a id="kembali" href="index.php">Kembali</a>
  </form>
</div>
</body>
</html>
