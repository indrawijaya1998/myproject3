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
  if ( tambah ($_POST) > 0 ) {
    echo "<script>
      alert('data berhasil ditambahkan!');
      document.location.href = 'form-input.php';
      </script> 
      ";
  }else {
    echo "<script>
      alert('data gagal ditambahkan!');
      document.location.href = 'index.php';
      </script>";
  }
  

}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Unica - University Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="Unica University Template">
	<meta name="keywords" content="event, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/themify-icons.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/01.css"/>
	  <!-- <link rel="stylesheet" type="text/css" href="forminput.css"> -->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- header section -->
	<header class="header-section">
		<div class="container">
			<!-- logo -->
			<a href="index.html" class="site-logo"><img src="img/logo.png" alt=""></a>
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<div class="header-info">
				<div class="hf-item">
					<i class="fa fa-clock-o"></i>
					<p><span>Waktu Kerja:</span>Senin - Sabtu: 08.00 - 17.00 </p>
				</div>
				<div class="hf-item">
					<i class="fa fa-map-marker"></i>
					<p><span>Alamat Kami:</span>40 Baria Street 133/2, New York City, US</p>
				</div>
			</div>
		</div>
	</header>
	<!-- header section end-->


	<!-- Header section  -->
	<nav class="nav-section">
		<div class="container">
			<div class="nav-right">
				<!-- <a href=""><i class="fa fa-search"></i></a>
				<a href=""><i class="fa fa-shopping-cart"></i></a> -->
			</div>
			<ul class="main-menu">
				<li class="active"><a href="index.php">Halaman Utama</a></li>
				<li><a href="about.html">Tentang Kami</a></li>
				<li><a href="#">Info Pendaftaran</a></li>
				<li><a href="course.html">Konfirmasi Pembayaran</a></li>
				<li><a href="form-input.php">Pendaftaran Online</a></li>
				<li><a href="Login.php">Login</a></li>
			</ul>
		</div>
	</nav>
	<div class="tengah">
	<form id="contact" action="" method="post" enctype="multipart/form-data" >
    <h3><center>Form Input Data Calon Mahasiswa</center></h3>
    <h4><center>Masukkan data dengan benar</center></h4>
    <fieldset>
      <label for="nis">Nomor Induk Siswa (Digunakan untuk Login)</label>
      <input type="text" name="nis" id="nis" required autofocus maxlength="12"/>
    </fieldset>
     <fieldset>
    	<label for="password">Password:</label>
		<input type="password" name="password" id="password" required maxlength="12">
    </fieldset>
    <fieldset>
    	<label for="password2">Konfirmasi Password:</label>
		<input type="password" name="password2" id="password2" required maxlength="12">
    </fieldset> 
    <fieldset>
      	<label for="nm_lengkap">Nama Lengkap</label>
      	<input type="text" name="nm_lengkap" id="nm_lengkap" required autofocus maxlength="30"/>
    </fieldset>
    <fieldset>
      <label for="jk">Jenis Kelamin</label>
      <select name="jk">
        <option value="">--Jenis Kelamin--</option>
        <option value="Laki-Laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
     <!--  <input type="text" name="jk" id="jk" tabindex="1" required autofocus> -->
    </fieldset>
   <!--  <fieldset>
      <label for="status">Status</label>
      <input type="text" name="status" id="status" tabindex="1" required autofocus maxlength="20"/>
    </fieldset> -->
    <fieldset>
      <label for="tempat_lahir">Tempat Lahir</label>
      <input type="text" name="tempat_lahir" id="tempat_lahir" tabindex="1" required autofocus maxlength="30"/>
    </fieldset>
    <fieldset>
      <label for="tgl_lahir">Tanggal Lahir</label>
      <input type="date" name="tgl_lahir" id="tgl_lahir" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="asal_prov">Provinsi Asal</label>
      <input type="text" name="asal_prov" id="asal_prov" tabindex="1" required autofocus maxlength="20"/>
    </fieldset>
     <fieldset>
      <label for="kota_asal">Kota/Kabupaten Asal</label>
      <input type="text" name="kota_asal" id="kota_asal" tabindex="1" required autofocus maxlength="20"/>
    </fieldset>
     <fieldset>
      <label for="alamat">Alamat saat ini</label>
      <input type="text" name="alamat" id="alamat" tabindex="1" required autofocus maxlength="30"/>
    </fieldset>
    <fieldset>
      <label for="agama">Agama</label>
      <select name="agama">
        <option value="">--Agama--</option>
        <option value="Islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="Katolik">Katolik</option>
        <option value="Buddah">Buddah</option>
        <option value="Hindu">Hindu</option>
        <option value="Lainnya">Lainnya</option>
      </select>
     <!--  <input type="text" name="agama" id="agama" tabindex="1"  required autofocus> -->
    </fieldset>
    <fieldset>
      <label for="kwr">Kewarganegaraan</label>
      <input type="text" name="kwr" id="kwr" tabindex="1" required autofocus maxlength="10"/>
    </fieldset>
      <fieldset>
      <label for="jenjang">Jenjang Pendidikan</label>
      <select name="jenjang">
        <option value="">--Pilih Jenjang Pendidikan--</option>
        <option value="sma ipa">SMA - IPA</option>
        <option value="sma ips">SMA - IPS</option>
        <option value="smk ipa">SMK - IPA</option>
        <option value="smk ips">SMK - IPS</option>
        <option value="Lainnya">Lainnya</option>
      </select>
    </fieldset>
     <fieldset>
      <label for="tahun_lulus_sma">Tahun Lulus SMA</label>
      <input type="text" name="tahun_lulus_sma" id="tahun_lulus_sma" tabindex="1" required autofocus maxlength="5"/>
    </fieldset>
    <fieldset>
      <label for="kode_pos">Kode Pos</label>
      <input type="text" name="kode_pos" id="kode_pos" tabindex="1" required autofocus maxlength="12"/>
    </fieldset>
     <fieldset>
      <label for="nm_ayah">Nama Ayah</label>
      <input type="text" name="nm_ayah" id="nm_ayah" tabindex="1" required autofocus maxlength="30"/>
    </fieldset>
     <fieldset>
      <label for="nm_ibu">Nama Ibu</label>
      <input type="text" name="nm_ibu" id="nm_ibu" tabindex="1" required autofocus maxlength="30"/>
    </fieldset>
     <!-- <fieldset>
      <label for="prov_ortu">Provinsi Orang Tua</label>
      <input type="text" name="prov_ortu" id="prov_ortu" tabindex="1" required autofocus maxlength="20"/>
    </fieldset>
    <fieldset>
      <label for="kota_ortu">Kota/Kabupaten Orang Tua</label>
      <input type="text" name="kota_ortu" id="kota_ortu" tabindex="1" required autofocus maxlength="20"/>
    </fieldset> -->
    <fieldset>
      <label for="alamat_ortu">Alamat Orang Tua</label>
      <input type="text" name="alamat_ortu" id="alamat_ortu" tabindex="1" required autofocus maxlength="25"/>
    </fieldset>
    <fieldset>
      <label for="no_hp_ortu">Nomor Telepon Orang Tua</label>
      <input type="text" name="no_hp_ortu" id="no_hp_ortu" tabindex="1" required autofocus maxlength="12"/>
    </fieldset>
    <fieldset>
      <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
      <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" tabindex="1" required autofocus maxlength="30"/>
    </fieldset>
    <fieldset>
      <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
      <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" tabindex="1" required autofocus maxlength="30"/>
    </fieldset>
    <fieldset>
      <label for="sumber_informasi">Sumber Informasi</label>
     <select name="sumber_informasi" id="sumber_informasi">
        <option value="">--Sumber Informasi--</option>
        <option value="Teman">Teman</option>
        <option value="Keluarga">Keluarga</option>
        <option value="Kerabat">Kerabat</option>
        <option value="Internet">Internet</option>
      </select>
    </fieldset>
     <fieldset>
      <label for="nm_jurusan">Fakultas</label>
      <select name="nm_jurusan">
        <option value="">--Pilih Fakultas--</option>
        <option value="Ilmu Hukum">Ilmu Hukum</option>
      </select>
    </fieldset>
    </fieldset>
    <fieldset>
      <label for="konsentrasi">Konsentrasi</label>
      <select name="konsentrasi">
        <option value="">--Pilih Konsentrasi--</option>
        <option value="Hukum Perdata">Hukum Perdata</option>
        <option value="Hukum Pidana">Hukum Pidana</option>
      </select>
    </fieldset>
    <fieldset>
      <label for="foto">Foto</label>
      <input type="file" name="foto" id="foto" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Simpan</button>   
    </fieldset>
    </form>	
</div>

  
	<footer class="footer-section">
		<div class="container footer-top">
			<div class="row">
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
					<div class="about-widget">
						<img src="img/logo-light.png" alt="">
						<p>orem ipsum dolor sit amet, consecter adipiscing elite. Donec minos varius, viverra justo ut, aliquet nisl.</p>
						<div class="social pt-1">
							<a href=""><i class="fa fa-twitter-square"></i></a>
							<a href=""><i class="fa fa-facebook-square"></i></a>
							<a href=""><i class="fa fa-google-plus-square"></i></a>
							<a href=""><i class="fa fa-linkedin-square"></i></a>
							<a href=""><i class="fa fa-rss-square"></i></a>
						</div>
					</div>
				</div>
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">USEFUL LINK</h6>
					<div class="dobule-link">
						<ul>
							<li><a href="">Home</a></li>
							<li><a href="">About us</a></li>
							<li><a href="">Services</a></li>
							<li><a href="">Events</a></li>
							<li><a href="">Features</a></li>
						</ul>
						<ul>
							<li><a href="">Policy</a></li>
							<li><a href="">Term</a></li>
							<li><a href="">Help</a></li>
							<li><a href="">FAQs</a></li>
							<li><a href="">Site map</a></li>
						</ul>
					</div>
				</div>
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">RECENT POST</h6>
					<ul class="recent-post">
						<li>
							<p>Snackable study:How to break <br> up your master's degree</p>
							<span><i class="fa fa-clock-o"></i>24 Mar 2018</span>
						</li>
						<li>
							<p>Open University plans major <br> cuts to number of staff</p>
							<span><i class="fa fa-clock-o"></i>24 Mar 2018</span>
						</li>
					</ul>
				</div>
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">CONTACT</h6>
					<ul class="contact">
						<li><p><i class="fa fa-map-marker"></i> 40 Baria Street 133/2, NewYork City,US</p></li>
						<li><p><i class="fa fa-phone"></i> (+88) 111 555 666</p></li>
						<li><p><i class="fa fa-envelope"></i> infodeercreative@gmail.com</p></li>
						<li><p><i class="fa fa-clock-o"></i> Monday - Friday, 08:00AM - 06:00 PM</p></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- copyright -->
		<div class="copyright">
			<div class="container">
				<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>		
		</div>
	</footer>
	<!-- Footer section end-->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.countdown.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
	
</body>
</html>