<?php
session_start();
include('includes/config.php');
error_reporting(0);
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
  <link rel="stylesheet" href="./assets/css/styles.css" type="text/css">
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
</head>

<body>

  <!-- Start Switcher -->
  <!-- <?php include('includes/colorswitcher.php'); ?> -->
  <!-- /Switcher -->

  <!--Header-->
  <?php include('includes/header.php'); ?>
  <!-- /Header -->

  <!--Page Header-->
  <section class="page-header listing_page" style="background-image: url(assets/images/b.jpeg);">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Produk</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li>Produk</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->

  <!--Listing-->
  <section class="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-push-3">
          <div class="result-sorting-wrapper">
            <div class="sorting-count">
              <?php
              //Query for Listing count
              $sql = "SELECT id from tblproduk";
              $query = $dbh->prepare($sql);
              $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = $query->rowCount();
              ?>
              <p><span><?php echo htmlentities($cnt); ?> Produk</span></p>
            </div>
          </div>

          <?php $sql = "SELECT tblproduk.*,tblkategori.namaKategori,tblkategori.id as bid  from tblproduk join tblkategori on tblkategori.id=tblproduk.Kategori";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) {  ?>
              <div class="product-listing-m gray-bg">
                <div class="product-listing-img"><img src="admin/img/produk/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="Image" /> </a>
                </div>
                <div class="product-listing-content">
                  <h5><a href="lihatdetail.php?vhid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->namaKategori); ?> , <?php echo htmlentities($result->Namaproduk); ?></a></h5>
                  <p class="list-price">Rp. <?php echo htmlentities($result->Harga); ?></p>
                  <ul>
                    <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->Penjualan); ?></li>
                  </ul>
                  <a href="lihatdetail.php?vhid=<?php echo htmlentities($result->id); ?>" class="btn">Lihat Detail <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                </div>
              </div>
          <?php }
          } ?>
        </div>

        <!--Side-Bar-->
        <aside class="col-md-3 col-md-pull-9">
          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5><i class="fa fa-filter" aria-hidden="true"></i> Cari Kategori </h5>
            </div>
            <div class="sidebar_filter">
              <form action="cari.php" method="post">
                <div class="form-group select">
                  <select class="form-control" name="brand">
                    <!-- <option>Select Brand</option> -->

                    <?php $sql = "SELECT * from  tblkategori ";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                      foreach ($results as $result) {       ?>
                        <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->namaKategori); ?></option>
                    <?php }
                    } ?>

                  </select>
                </div>
                <!-- <div class="form-group select">
                  <select class="form-control" name="fueltype">
                    <option>Select Fuel Type</option>
                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                    <option value="CNG">CNG</option>
                  </select>
                </div> -->

                <div class="form-group">
                  <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Cari</button>
                </div>
              </form>
            </div>
          </div>

          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5></i>Kategori/Produk Tersedia</h5>

            </div>
            <div class="recent_addedcars">
              <ul>
                <?php $sql = "SELECT tblproduk.*,tblkategori.namaKategori,tblkategori.id as bid  from tblproduk join tblkategori on tblkategori.id=tblproduk.Kategori order by id desc limit 100";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                  foreach ($results as $result) {  ?>

                    <li class="gray-bg">
                      <div class="recent_post_img"> <a href="lihatdetail.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/produk/<?php echo htmlentities($result->Vimage1); ?>" alt="image"></a> </div>
                      <div class="recent_post_title"> <a href="lihatdetail.php?vhid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->namaKategori); ?> , <?php echo htmlentities($result->Namaproduk); ?></a>
                        <p class="widget_price">Rp. <?php echo htmlentities($result->Harga); ?> </p>
                      </div>
                    </li>
                <?php }
                } ?>

              </ul>
            </div>
          </div>
        </aside>
        <!--/Side-Bar-->
      </div>
    </div>
  </section>
  <!-- /Listing-->

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

</html>