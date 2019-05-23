<?php 
require 'function.php';

if (isset($_POST["login"]) ) {
  $nis = $_POST["nis"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM pendaftar WHERE nis = '$nis'");
  // cek username
  if(mysqli_num_rows($result) === 1 ) {

  // cek password
  $row = mysqli_fetch_assoc($result);
  if( password_verify($password, $row["password"]) ) {
    // set session
    $_SESSION ["login"] = true;
    header("Location: index.php");
    exit;
  }

  }

  $error = true;

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
  <link rel="stylesheet" href="css/login.css"/>
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
       <!--  <a href=""><i class="fa fa-search"></i></a>
        <a href=""><i class="fa fa-shopping-cart"></i></a> -->
      </div>
      <ul class="main-menu">
        <li class="active"><a href="index.php">Halaman Utama</a></li>
        <li><a href="#">Tentang Kami</a></li>
        <li><a href="#">Info Pendaftaran</a></li>
        <li><a href="#">Konfirmasi Pembayaran</a></li>
        <li><a href="form-input.php">Pendaftaran Online</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </div>
  </nav>
  <div class="login">
    <?php if (isset($error)) : ?> 
    <p style= "color:red; font-style: italic;"> username / password salah </p>
    <?php endif; ?>
      <form id="contact" action="#" method="post">
      <h2 class="mb-4">Log in with your account</h2>
       <div class="row">
         <div class="col-md-12 form-group">
           <label for="nis">Nomor Induk Siswa</label>
           <input type="text" name="nis" id="nis" class="form-control py-2" maxlength="12">
         </div>
       </div>
       <div class="row mb-5">
         <div class="col-md-12 form-group">
           <label for="password">Password</label>
           <input type="password" name="password" id="password" class="form-control py-2" maxlength="12">
         </div>
       </div>
        <div class="row">
         <div class="col-md-6 form-group">
           <button name="login" type="submit" class="btn btn-primary px-5 py-2">LOGIN</button>
         </div>
        </div>
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