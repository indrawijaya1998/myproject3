<?php
require 'function.php'; 
// AMBIL DATA DI  URL
$iduser = $_GET["id_user"];

// query data mahasiswa berdasarkan id_JADWAL
$user = query("SELECT * FROM pendaftar WHERE id_user = $iduser")[0];

// cek apakah tombol submit sudah ditekan aatu belum
if (isset($_POST["submit"])) {
  //ambil data
  
  // cek data berhasil di ubah
  if ( ubahpendaftar($_POST) > 0 ) {
    echo "<script>
      alert('data berhasil diinput!');
      document.location.href = 'table_pendaftar.php';
      </script> 
      ";
  }else {
    echo "<script>
      alert('data gagal diinput!');
      document.location.href = 'ubah_pendaftar.php';
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
    <h3><center>Lihat Kembali Data Inputan Anda</center></h3>
    <input type="hidden" name="id_user" value="<?= $user ["id_user"];?>">
    <fieldset>
      <label for="nis">Nomor Induk Siswa</label>
      <input type="text" name="nis" id="nis" required autofocus value="<?= $user["nis"]; ?>">
    </fieldset>
    <fieldset>
      <label for="nm_lengkap">Nama Lengkap</label>
      <input type="text" name="nm_lengkap" id="nm_lengkap" required autofocus value="<?= $user["nm_lengkap"]; ?>">
    </fieldset>
    <fieldset>
      <label for="jk">Jenis Kelamin</label>
      <input type="text" name="jk" id="jk" required autofocus value="<?= $user["jk"]; ?>">
    </fieldset>
    <fieldset>
      <label for="tempat_lahir">Tempat Lahir</label>
      <input type="text" name="tempat_lahir" id="tempat_lahir" required autofocus value="<?= $user["tempat_lahir"]; ?>">
    </fieldset>
    <fieldset>
      <label for="tgl_lahir">Tanggal Lahir</label>
      <input type="date" name="tgl_lahir" id="tgl_lahir" required autofocus value="<?= $user["tgl_lahir"]; ?>">
    </fieldset>
    <fieldset>
      <label for="asal_prov">Provinsi Asal</label>
      <input type="text" name="asal_prov" id="asal_prov" required autofocus value="<?= $user["asal_prov"]; ?>">
    </fieldset>
     <fieldset>
      <label for="kota_asal">Kota Asal</label>
      <input type="text" name="kota_asal" id="kota_asal" required autofocus value="<?= $user["kota_asal"]; ?>">
    </fieldset>
     <fieldset>
      <label for="alamat">Alamat saat ini</label>
      <input type="text" name="alamat" id="alamat" required autofocus value="<?= $user["alamat"]; ?>">
    </fieldset>
    <fieldset>
      <label for="agama">Agama</label>
      <input type="text" name="agama" id="agama" required autofocus value="<?= $user["agama"]; ?>">
    </fieldset>
    <fieldset>
      <label for="kwr">Kewarganegaraan</label>
      <input type="text" name="kwr" id="kwr" required autofocus value="<?= $user["kwr"]; ?>">
    </fieldset>
    <fieldset>
      <label for="jenjang">Nomor Induk Siswa</label>
      <input type="text" name="jenjang" id="jenjang" required autofocus value="<?= $user["jenjang"]; ?>">
    </fieldset>
     <fieldset>
      <label for="tahun_lulus_sma">Tahun Lulus SMA</label>
      <input type="text" name="tahun_lulus_sma" id="tahun_lulus_sma" required autofocus value="<?= $user["tahun_lulus_sma"]; ?>">
    </fieldset>
    <fieldset>
      <label for="kode_pos">Nomor Induk Siswa</label>
      <input type="text" name="kode_pos" id="kode_pos" required autofocus value="<?= $user["kode_pos"]; ?>">
    </fieldset>
     <fieldset>
      <label for="nm_ayah">Nama Ayah</label>
      <input type="text" name="nm_ayah" id="nm_ayah" required autofocus value="<?= $user["nm_ayah"]; ?>">
    </fieldset>
     <fieldset>
      <label for="nm_ibu">Nama Ibu</label>
      <input type="text" name="nm_ibu" id="nm_ibu" required autofocus value="<?= $user["nm_ibu"]; ?>">
    </fieldset>
    <fieldset>
      <label for="alamat_ortu">Alamat Orang Tua</label>
      <input type="text" name="alamat_ortu" id="alamat_ortu" required autofocus value="<?= $user["alamat_ortu"]; ?>">
    </fieldset>
    <fieldset>
      <label for="no_hp_ortu">Nomor Telepon Orang Tua</label>
      <input type="text" name="no_hp_ortu" id="no_hp_ortu" required autofocus value="<?= $user["no_hp_ortu"]; ?>">
    </fieldset>
    <fieldset>
      <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
      <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah"  required autofocus value="<?= $user["pekerjaan_ayah"]; ?>">
    </fieldset>
    <fieldset>
      <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
      <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" required autofocus value="<?= $user["pekerjaan_ibu"]; ?>">
    </fieldset>
    <fieldset>
      <label for="sumber_informasi">Sumber Informasi</label>
      <input type="text" name="sumber_informasi" id="sumber_informasi"  required autofocus value="<?= $user["sumber_informasi"]; ?>">
    </fieldset>
    <fieldset>
      <label for="nm_jurusan">Nomor Induk Siswa</label>
      <input type="text" name="nm_jurusan" id="nm_jurusan" required autofocus value="<?= $user["nm_jurusan"]; ?>">
    </fieldset>
    <fieldset>
      <label for="konsentrasi">Nomor Induk Siswa</label>
      <input type="text" name="konsentrasi" id="konsentrasi" required autofocus value="<?= $user["konsentrasi"]; ?>">
    </fieldset>
    <fieldset>
      <label for="foto">Foto</label>
      <img src="img/<?= $user['foto']; ?>" width="60"> <br>
      <input type="file" name="foto" id="foto">
    </fieldset>


   <!--  <fieldset>
      <textarea placeholder="Type your message here...." tabindex="5" required></textarea>
    </fieldset> -->
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Simpan</button>
    </fieldset>
  </form>
</div>
</body>
</html>
