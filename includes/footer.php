<!-- <?php
      if (isset($_POST['emailsubscibe'])) {
        $subscriberemail = $_POST['subscriberemail'];
        $sql = "SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
        $query = $dbh->prepare($sql);
        $query->bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
          echo "<script>alert('Already Subscribed.');</script>";
        } else {
          $sql = "INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
          $query = $dbh->prepare($sql);
          $query->bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
          $query->execute();
          $lastInsertId = $dbh->lastInsertId();
          if ($lastInsertId) {
            echo "<script>alert('Subscribed successfully.');</script>";
          } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
          }
        }
      }
      ?> -->

<footer>

  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-push-6 text-right">
          <div class="footer_widget">
            <!-- <p><button><a href="admin/" style="color: black;">Login Admin</a></button></p> -->
            <p><a href="admin/" style="color: black; background-color: white; padding: 5px 20px;">Login Admin</a></p>

          </div>
        </div>
        <div class="col-md-6 col-md-pull-6">
          <p class="copy-right">Copyright &copy; 2024 AzhaSeserahanPalopo</p>
        </div>
      </div>
    </div>
  </div>
</footer>