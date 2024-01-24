<?php
//error_reporting(0);
if (isset($_POST['signup'])) {
  $fname = $_POST['fullname'];
  $email = $_POST['emailid'];
  $mobile = $_POST['mobileno'];
  $password = md5($_POST['password']);
  $sql = "INSERT INTO  tbluser(Namalengkap,Email,Notelpon,Password) VALUES(:fname,:email,:mobile,:password)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':fname', $fname, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    echo "<script>alert('Anda Berhasil Mendaftar Account. Silahkan Login');</script>";
  } else {
    echo "<script>alert('Terjadi Kesalahan. Silahkan Coba Lagi');</script>";
  }
}

?>


<script>
  function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "check_availability.php",
      data: 'emailid=' + $("#emailid").val(),
      type: "POST",
      success: function(data) {
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
      },
      error: function() {}
    });
  }
</script>
<!-- <script type="text/javascript">
  function valid() {
    if (document.signup.password.value != document.signup.confirmpassword.value) {
      alert("Password and Confirm Password Field do not match  !!");
      document.signup.confirmpassword.focus();
      return false;
    }
    return true;
  }
</script> -->

<script type="text/javascript">
  function validateForm() {
    var password = document.signup.password.value;
    var confirmPassword = document.signup.confirmpassword.value;

    // Memastikan kedua kolom password tidak kosong
    if (password === '' || confirmPassword === '') {
      alert("Password and Confirm Password cannot be empty!");
      return false;
    }

    // Memastikan kedua kolom password sama
    if (password !== confirmPassword) {
      alert("password dan konfirmasi Password tidak sesuai!");
      document.signup.confirmpassword.focus();
      return false;
    }

    // Memastikan panjang password minimal 8 karakter
    if (password.length < 5) {
      alert("passwoard minimal harus terdiri dari 5 karakter!");
      document.signup.password.focus();
      return false;
    }

    // // Memastikan password mengandung setidaknya satu huruf besar, satu huruf kecil, dan satu angka
    // var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;
    // if (!regex.test(password)) {
    //   alert("Password should contain at least one uppercase letter, one lowercase letter, and one digit!");
    //   document.signup.password.focus();
    //   return false;
    // }

    // return true;
  }
</script>













<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Daftar</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post" name="signup" onsubmit="return validateForm()">
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Masukkan Nama Lengkap " required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="mobileno" placeholder="Masukkan No. Telpon " maxlength="15" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Masukkan Email " required="required">
                  <span id="user-availability-status" style="font-size:12px;"></span>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Masukkan Password " required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="confirmpassword" placeholder="Konfirmasi Password " required="required">
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">Saya Setuju dengan Syarat dan Ketentuan</label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Daftar" name="signup" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Sudah punya akun? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login </a></p>
      </div>
    </div>
  </div>
</div>