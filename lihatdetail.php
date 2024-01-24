<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (isset($_POST['submit'])) {
  $daritanggal = $_POST['daritanggal'];
  $sampaitanggal = $_POST['sampaitanggal'];
  $pesan = $_POST['pesan'];
  $email = $_SESSION['login'];
  $status = 0;
  $vhid = $_GET['vhid'];
  $sql = "INSERT INTO  tblbooking(Emailid,Barang,Daritanggal,Sampaitanggal,Pesan,Status) VALUES(:email,:vhid,:daritanggal,:sampaitanggal,:pesan,:status)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query->bindParam(':daritanggal', $daritanggal, PDO::PARAM_STR);
  $query->bindParam(':sampaitanggal', $sampaitanggal, PDO::PARAM_STR);
  $query->bindParam(':pesan', $pesan, PDO::PARAM_STR);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    echo "<script>alert('Pemesanan Berhasil.');</script>";
  } else {
    echo "<script>alert('Terjadi Kesalahan. Silahkan Coba Lagi');</script>";
  }
}

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

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="assets/images/favicon-icon/24x24.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>

  <!-- Start Switcher -->
  <!-- /Switcher -->

  <!--Header-->
  <?php include('includes/header.php'); ?>
  <!-- /Header -->

  <!--Listing-Image-Slider-->

  <?php
  $vhid = intval($_GET['vhid']);
  $sql = "SELECT tblproduk.*,tblkategori.namaKategori,tblkategori.id as bid  from tblproduk join tblkategori on tblkategori.id=tblproduk.Kategori where tblproduk.id=:vhid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
    foreach ($results as $result) {
      $_SESSION['brndid'] = $result->bid;
  ?>

      <section id="listing_img_slider">
        <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage2); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage3); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage4); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage5); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage6); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage7); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage8); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage9); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage10); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <!-- <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage11); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage12); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage13); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage14); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage15); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/produk/<?php echo htmlentities($result->Vimage16); ?>" class="img-responsive" alt="image" width="900" height="560"></div> -->

        <!-- ?> -->

      </section>
      <!--/Listing-Image-Slider-->


      <!--Listing-detail-->
      <section class="listing-detail">
        <div class="container">
          <div class="listing_detail_head row">
            <div class="col-md-6">
              <h3><?php echo htmlentities($result->namaKategori); ?>,<?php echo htmlentities($result->Namaproduk); ?></h3>
            </div>
            <div class="col-md-5">
              <div class="price_info">
                <p style="font-size: 25px;">Harga Rp. <?php echo htmlentities($result->Harga); ?> </p>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="main_features">
                <ul>

                  <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                    <h5><?php echo htmlentities($result->Penjualan); ?></h5>
                  </li>
                  <!-- <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                    <h5><?php echo htmlentities($result->FuelType); ?></h5>
                    <p>Fuel Type</p>
                  </li> -->

                  <!-- <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
                    <h5><?php echo htmlentities($result->SeatingCapacity); ?></h5>
                    <p>Seats</p>
                  </li> -->
                </ul>
              </div>
              <div class="listing_more_info">
                <div class="listing_detail_wrap">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs gray-bg" role="tablist">
                    <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Deskripsi Produk </a></li>

                    <!-- <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Jenis</a></li> -->
                    <!-- <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Ukuran</a></li> -->
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- vehicle-overview -->
                    <div role="tabpanel" class="tab-pane active" id="vehicle-overview">

                      <p><?php echo htmlentities($result->Deskripsi); ?></p>
                    </div>


                    <!-- Accessories -->
                    <div role="tabpanel" class="tab-pane" id="accessories">
                      <!--Accessories-->
                      <table>
                        <thead>
                          <tr>
                            <th colspan="2"></th>
                          </tr>
                        </thead>
                        <tbody>




                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
          <?php }
      } ?>

            </div>

            <!--Side-Bar-->
            <aside class="col-md-4">

              <!-- <div class="share_vehicle">
                <p>Share: <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> </p>
              </div> -->
              <div class="sidebar_widget">
                <div class="widget_heading">
                  <h5 style="font-size: 16px;"><i class="fa fa-envelope" aria-hidden="true"></i>Catat Penyewaan/Pembelian</h5>
                </div>
                <!-- <form method="post"> -->
                <form onsubmit="return validateDate()" method="post">
                  <div class="form-group">
                    <label style="font-size: 12px; color: red;" for="">⚠️Jika Melakukan Pembelian Produk Hanya Memasukkan
                      Tanggal Pembelian, Dan Jika Melakukan Penyewaan Produk Silahkan Memasukkan Tanggal
                      Penyewaan
                      Dan Tanggal Pengembalian</label>
                    <label style="font-size: 12px;" for=""> Tanggal Pembelian/Penyewaan Produk</label>
                    <!-- <input type="date" class="form-control" name="daritanggal" placeholder="" required> -->
                    <input type="date" class="form-control" name="daritanggal" id="daritanggal" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label style="font-size: 13px;" for=""> Tanggal Pengembalian Produk</label>
                    <input type="date" class="form-control" name="sampaitanggal" placeholder="">
                  </div>
                  <div class="form-group">
                    <textarea rows="4" class="form-control" name="pesan" placeholder="Catat Pesanan (Opsional)"></textarea>
                  </div>
                  <?php if ($_SESSION['login']) { ?>
                    <div class="form-group">
                      <input type="submit" class="btn" name="submit" value="Pesan Sekarang">
                    </div>
                  <?php } else { ?>
                    <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login Terlebih Dahulu</a>

                  <?php } ?>
                </form>
              </div>
            </aside>
            <!--/Side-Bar-->
          </div>

          <div class="space-20"></div>
          <div class="divider"></div>

          <!--Similar-Cars-->
          <!-- <div class="similar_cars">
            <h3>Similar Bikes</h3>
            <div class="row">
              <?php
              $bid = $_SESSION['brndid'];
              $sql = "SELECT tblproduk.VehiclesTitle,tblkategori.BrandName,tblproduk.PricePerDay,tblproduk.FuelType,tblproduk.ModelYear,tblproduk.id,tblproduk.SeatingCapacity,tblproduk.VehiclesOverview,tblproduk.Vimage1 from tblproduk join tblkategori on tblkategori.id=tblproduk.VehiclesBrand where tblproduk.VehiclesBrand=:bid";
              $query = $dbh->prepare($sql);
              $query->bindParam(':bid', $bid, PDO::PARAM_STR);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $result) { ?>
                  <div class="col-md-3 grid_listing">
                    <div class="product-listing-m gray-bg">
                      <div class="product-listing-img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image" /> </a>
                      </div>
                      <div class="product-listing-content">
                        <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></a></h5>
                        <p class="list-price">$<?php echo htmlentities($result->PricePerDay); ?></p>

                        <ul class="features_list">

                          <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity); ?> seats</li>
                          <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear); ?> model</li>
                          <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType); ?></li>
                        </ul>
                      </div>
                    </div>
                  </div>
              <?php }
              } ?>

            </div>
          </div> -->
          <!--/Similar-Cars-->

        </div>
      </section>
      <!--/Listing-detail-->

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



      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/interface.js"></script>
      <script src="assets/switcher/js/switcher.js"></script>
      <script src="assets/js/bootstrap-slider.min.js"></script>
      <script src="assets/js/slick.min.js"></script>
      <script src="assets/js/owl.carousel.min.js"></script>
      <script>
        function validateDate() {
          var inputDate = new Date(document.getElementById('daritanggal').value);
          var currentDate = new Date();

          // Set waktu ke awal hari ini
          currentDate.setHours(0, 0, 0, 0);

          if (inputDate < currentDate) {
            alert('Pilih tanggal pada hari ini atau setelahnya.');
            return false; // Formulir tidak akan dikirim
          } else {
            // alert('Tanggal valid.');
            return true; // Formulir akan dikirim
          }
        }
      </script>

</body>

</html>