<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Azha Seserahan Palopo</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!--Custome Style -->
    <link rel="stylesheet" href="assets/css/styles.css" type="text/css">
    <!--OWL Carousel slider-->
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <!--slick-slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!--bootstrap-slider -->
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <!--FontAwesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">


    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/images/favicon-icon/24x24.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>
</head>

<body>

    <!-- Start Switcher -->
    <!-- <?php include('includes/colorswitcher.php'); ?> -->
    <!-- /Switcher -->

    <!--Header-->
    <?php include('includes/header.php'); ?>
    <!-- /Header -->

    <!--Page Header-->
    <section class="page-header contactus_page" style="background-image: url(assets/images/b.jpeg);">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>Faqs</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Faqs</li>
                </ul>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <!--Contact-us-->
    <section class="contact_us section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Cara Buat Akun ?</h5>
                    <ol type="1">
                        <li>Klik Tombol Login/Register</a></li>
                        <li>Klik Daftar</a></li>
                        <li>Kemudian Masukkan Nama Lengkap, No.Telpon, Email, dan Password</a></li>
                    </ol>
                    <h5>Cara Melakukan Transaksi Pembelian/Penyewaan Produk ?</h5>
                    <ol type="1">
                        <li>Login Terlebih Dahulu Jika Belum Mempunyai Akun Silahkan Daftar </a></li>
                        <li>Klik Menu Produk</a></li>
                        <li>Pilih Produk Yang Inginkan</a></li>
                        <!-- <li><a href="#"><i class="fa fa-google-plus-square " aria-hidden="true"></i></a></li> -->
                        <!-- <i class="fa-brands fa-tiktok fa-bounce"></i> -->
                        <li>
                            Klik Tombol Lihat Detail</a></li>
                        <li>Jika Melakukan Pembelian Produk Hanya Memasukkan Tanggal Pembelian, Dan Jika Melakukan Penyewaan Produk Silahkan Memasukkan Tanggal Penyewaan Dan Tanggal Pengembalian</li>
                        <li>Klik Tombol Pesan Sekarang</li>
                        <li>Klik Nama Anda Di Bagian Menu Untuk Melihat Pesanan Anda Apakah Di Konfirmasi Atau Belum Dan Silahkan Klik Menu Tambah Testimoni Untuk Memberikan Ulasan Tentang Toko Azha Seserahan Palopo
                        </li>
                    </ol>


                </div>
            </div>
        </div>
    </section>
    <!-- /Contact-us-->


    <!--Footer -->
    <?php include('includes/footer.php'); ?>
    <!-- /Footer-->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
    <!--/Back to top-->

    <!--Login-Form -->
    <?php include('includes/login.php'); ?>
    <!--/Login-Form -->

    <!--Register-Form -->
    <?php include('includes/registration.php'); ?>

    <!--/Register-Form -->

    <!--Forgot-password-Form -->
    <?php include('includes/forgotpassword.php'); ?>
    <!--/Forgot-password-Form -->

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/interface.js"></script>
    <!--Switcher-->
    <script src="assets/switcher/js/switcher.js"></script>
    <!--bootstrap-slider-JS-->
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <!--Slider-JS-->
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="https://kit.fontawesome.com/59dcbb9722.js" crossorigin="anonymous"></script>


</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:55 GMT -->

</html>