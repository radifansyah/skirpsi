<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-3 ">
          <h4 class="judul" style="margin-top: 10px;">Azha Seserahan Palopo</h4>
        </div>
        <div class="col-sm-9 col-md-9">
          <div class="header_info">
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Email : </p>
              <a href="mailto:info@example.com">azhaseserahanpalopo@gmail.com</a>
            </div>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">No Telpon : </p>
              <a href="tel:+639079373999">08129373999</a>
            </div>
            <div class="social-follow">
              <ul>
                <li><a href="#"><i class="fa-brands fa-square-facebook fa-bounce" aria-hidden="true"></i></a></li>
                <li><a href="#"> <i class="fa-brands fa-square-whatsapp fa-bounce"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-square-instagram fa-bounce" aria-hidden="true"></i></a></li>
                <!-- <li><a href="#"><i class="fa fa-google-plus-square " aria-hidden="true"></i></a></li> -->
                <!-- <i class="fa-brands fa-tiktok fa-bounce"></i> -->
                <li><a href="#"><i class="fa-brands fa-tiktok fa-bounce" aria-hidden="true"></i></a></li>
              </ul>
            </div>
            <?php if (strlen($_SESSION['login']) == 0) {
            ?>
              <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Daftar</a> </div>
            <?php } else {

              echo "Anda Berhasil Login";
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
                <?php
                $email = $_SESSION['login'];
                $sql = "SELECT Namalengkap FROM tbluser WHERE Email=:email ";
                $query = $dbh->prepare($sql);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                  foreach ($results as $result) {

                    echo htmlentities($result->Namalengkap);
                  }
                } ?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
                <?php if ($_SESSION['login']) { ?>
                  <!-- <li><a href="profile.php">Profile Settings</a></li> -->
                  <!-- <li><a href="update-password.php">Update Password</a></li> -->
                  <li><a href="pesanansaya.php">Pesanan Saya</a></li>
                  <li><a href="tambahtestimoni.php">Tambah Testimoni</a></li>
                  <!-- <li><a href="my-testimonials.php">My Testimonial</a></li> -->
                  <li><a href="logout.php">Logout</a></li>
                <?php } else { ?>
                  <li>Silahkan Login Terlebih Dahulu</li>
                  <!-- <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Profile Settings</a></li> -->
                  <!-- <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Update Password</a></li> -->
                  <!-- <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Pesanan Saya</a></li> -->
                  <!-- <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Tambah Testimoni</a></li> -->
                  <!-- <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">My Testimonial</a></li> -->
                  <!-- <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Logout</a></li> -->
                <?php } ?>
              </ul>
            </li>
          </ul>
        </div>
        <!-- <div class="header_search">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="#" method="get" id="header-search-form">
            <input type="text" placeholder="Search..." class="form-control">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div> -->
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a> </li>

          <!-- <li><a href="page.php?type=aboutus">Tentang Toko</a></li> -->
          <li><a href="tentang-toko.php">Tentang Toko</a></li>
          <li><a href="faqs.php">Faqs</a></li>
          <li><a href="produk.php">Produk</a>
            <!-- <li><a href="page.php?type=faqs">Faqs</a></li> -->
          <li><a href="hubungikami.php">Hubungi Kami</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end -->

</header>