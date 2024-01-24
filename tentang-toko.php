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
                    <h1>Tentang Toko</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Tentang Toko</li>
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
                    <!-- <h3>Contact Info</h3> -->
                    <!-- <div class="contact_detail">
                        <?php
                        $pagetype = $_GET['type'];
                        $sql = "SELECT Address,EmailId,ContactNo from tblcontactusinfo";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) { ?>
                                <ul>
                                    <li>
                                        <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="contact_info_m"><?php echo htmlentities($result->Address); ?></div>
                                    </li>
                                    <li>
                                        <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                        <div class="contact_info_m"><a href="tel:61-1234-567-90"><?php echo htmlentities($result->EmailId); ?></a></div>
                                    </li>
                                    <li>
                                        <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                        <div class="contact_info_m"><a href="mailto:codeprojectsorg@gmail.com"><?php echo htmlentities($result->ContactNo); ?></a></div>
                                    </li>
                                </ul>
                        <?php }
                        } ?>
                    </div> -->
                    <!-- <div class="social-follow"> -->
                    <h5>Toko Azha Seserahan Palopo</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi amet nemo doloribus nam, enim, vero vitae dolore commodi nostrum doloremque nesciunt minus! Harum quas quibusdam facilis possimus incidunt aliquam quis molestiae est officia nulla consequatur pariatur qui voluptate cumque dolorem quisquam quae totam, iusto architecto iure ipsam ad? Ab, nihil.</p>
                    <h5>Media Sosial</h5>
                    <ul>
                        <li><a href="#"><i class="fa-brands fa-square-facebook fa-bounce" aria-hidden="true"></i>Facebook</a></li>
                        <li><a href="#"> <i class="fa-brands fa-square-whatsapp fa-bounce"></i>Whatshapp</a></li>
                        <li><a href="#"><i class="fa-brands fa-square-instagram fa-bounce" aria-hidden="true"></i>Instagram</a></li>
                        <!-- <li><a href="#"><i class="fa fa-google-plus-square " aria-hidden="true"></i></a></li> -->
                        <!-- <i class="fa-brands fa-tiktok fa-bounce"></i> -->
                        <li><a href="#"><i class="fa-brands fa-tiktok fa-bounce" aria-hidden="true"></i>Tiktok</a></li>
                    </ul>

                </div>

                <div class="col-md-6">
                    <!-- <h3>Get in touch using the form below</h3> -->
                    <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                    <div class="contact_form gray-bg">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.2030302493176!2d120.21355297366107!3d-3.040171740055703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d9159152066cc49%3A0xa221fab9b18ac2a6!2sAzha%20peyewaan%20Box%20fiber%20dan%20tutup%20acrilic%20erang-erang%20%2FSeserahan%20Palopo!5e0!3m2!1sen!2sid!4v1702569983525!5m2!1sen!2sid" width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </form>
                    </div>
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