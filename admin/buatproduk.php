<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_POST['submit'])) {
		$namaproduk = $_POST['namaproduk'];
		$kategori = $_POST['namakategori'];
		$deskripsi = $_POST['deskrip'];
		$harga = $_POST['harga'];
		// $fueltype = $_POST['fueltype'];
		$penjualan = $_POST['penjualan'];
		// $seatingcapacity = $_POST['seatingcapacity'];
		$vimage1 = $_FILES["img1"]["name"];
		$vimage2 = $_FILES["img2"]["name"];
		$vimage3 = $_FILES["img3"]["name"];
		$vimage4 = $_FILES["img4"]["name"];
		$vimage5 = $_FILES["img5"]["name"];
		$vimage6 = $_FILES["img6"]["name"];
		$vimage7 = $_FILES["img7"]["name"];
		$vimage8 = $_FILES["img8"]["name"];
		$vimage9 = $_FILES["img9"]["name"];
		$vimage10 = $_FILES["img10"]["name"];
		// $vimage11 = $_FILES["img11"]["name"];
		// $vimage12 = $_FILES["img12"]["name"];
		// $vimage13 = $_FILES["img13"]["name"];
		// $vimage14 = $_FILES["img14"]["name"];
		// $vimage15 = $_FILES["img15"]["name"];
		// $vimage16 = $_FILES["img16"]["name"];
		move_uploaded_file($_FILES["img1"]["tmp_name"], "img/produk/" . $_FILES["img1"]["name"]);
		move_uploaded_file($_FILES["img2"]["tmp_name"], "img/produk/" . $_FILES["img2"]["name"]);
		move_uploaded_file($_FILES["img3"]["tmp_name"], "img/produk/" . $_FILES["img3"]["name"]);
		move_uploaded_file($_FILES["img4"]["tmp_name"], "img/produk/" . $_FILES["img4"]["name"]);
		move_uploaded_file($_FILES["img5"]["tmp_name"], "img/produk/" . $_FILES["img5"]["name"]);
		move_uploaded_file($_FILES["img6"]["tmp_name"], "img/produk/" . $_FILES["img6"]["name"]);
		move_uploaded_file($_FILES["img7"]["tmp_name"], "img/produk/" . $_FILES["img7"]["name"]);
		move_uploaded_file($_FILES["img8"]["tmp_name"], "img/produk/" . $_FILES["img8"]["name"]);
		move_uploaded_file($_FILES["img9"]["tmp_name"], "img/produk/" . $_FILES["img9"]["name"]);
		move_uploaded_file($_FILES["img10"]["tmp_name"], "img/produk/" . $_FILES["img10"]["name"]);
		move_uploaded_file($_FILES["img11"]["tmp_name"], "img/produk/" . $_FILES["img11"]["name"]);
		// move_uploaded_file($_FILES["img12"]["tmp_name"], "img/produk/" . $_FILES["img12"]["name"]);
		// move_uploaded_file($_FILES["img13"]["tmp_name"], "img/produk/" . $_FILES["img13"]["name"]);
		// move_uploaded_file($_FILES["img14"]["tmp_name"], "img/produk/" . $_FILES["img14"]["name"]);
		// move_uploaded_file($_FILES["img15"]["tmp_name"], "img/produk/" . $_FILES["img15"]["name"]);
		// move_uploaded_file($_FILES["img16"]["tmp_name"], "img/produk/" . $_FILES["img16"]["name"]);

		$sql = "INSERT INTO tblproduk(Namaproduk,Kategori,Deskripsi,Harga,Penjualan,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,Vimage6,Vimage7,Vimage8,Vimage9,Vimage10) VALUES(:namaproduk,:kategori,:deskripsi,:harga,:penjualan,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:vimage6,:vimage7,:vimage8,:vimage9,:vimage10)";
		// $sql = "INSERT INTO tblproduk(Namaproduk,Kategori,Deskripsi,Harga,Penjualan,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,Vimage6,Vimage7,Vimage8,Vimage9,Vimage10,Vimage11,Vimage12,Vimage13,Vimage14,Vimage15,Vimage16) VALUES(:namaproduk,:kategori,:deskripsi,:harga,:penjualan,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:vimage6,:vimage7,:vimage8,:vimage9,:vimage10,:vimage11,:vimage12,:vimage13,:vimage14,:vimage15,:vimage16)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':namaproduk', $namaproduk, PDO::PARAM_STR);
		$query->bindParam(':kategori', $kategori, PDO::PARAM_STR);
		$query->bindParam(':deskripsi', $deskripsi, PDO::PARAM_STR);
		$query->bindParam(':harga', $harga, PDO::PARAM_STR);
		// $query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
		$query->bindParam(':penjualan', $penjualan, PDO::PARAM_STR);
		// $query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
		$query->bindParam(':vimage1', $vimage1, PDO::PARAM_STR);
		$query->bindParam(':vimage2', $vimage2, PDO::PARAM_STR);
		$query->bindParam(':vimage3', $vimage3, PDO::PARAM_STR);
		$query->bindParam(':vimage4', $vimage4, PDO::PARAM_STR);
		$query->bindParam(':vimage5', $vimage5, PDO::PARAM_STR);
		$query->bindParam(':vimage6', $vimage6, PDO::PARAM_STR);
		$query->bindParam(':vimage7', $vimage7, PDO::PARAM_STR);
		$query->bindParam(':vimage8', $vimage8, PDO::PARAM_STR);
		$query->bindParam(':vimage9', $vimage9, PDO::PARAM_STR);
		$query->bindParam(':vimage10', $vimage10, PDO::PARAM_STR);
		// $query->bindParam(':vimage11', $vimage11, PDO::PARAM_STR);
		// $query->bindParam(':vimage12', $vimage12, PDO::PARAM_STR);
		// $query->bindParam(':vimage13', $vimage13, PDO::PARAM_STR);
		// $query->bindParam(':vimage14', $vimage14, PDO::PARAM_STR);
		// $query->bindParam(':vimage15', $vimage15, PDO::PARAM_STR);
		// $query->bindParam(':vimage16', $vimage16, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if ($lastInsertId) {
			$msg = "Data Berhasil Di Tambahkan";
		} else {
			$error = "Terjadi Kesalahan Silahkan Coba Lagi";
		}
	}


?>
	<!doctype html>
	<html lang="en" class="no-js">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="theme-color" content="#3e454c">

		<title>Azha Seserahan Palopo</title>

		<!-- Font awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Sandstone Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<!-- Bootstrap social button library -->
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<!-- Bootstrap select -->
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- Bootstrap file input -->
		<link rel="stylesheet" href="css/fileinput.min.css">
		<!-- Awesome Bootstrap checkbox -->
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<!-- Admin Stye -->
		<link rel="stylesheet" href="css/style.css">
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
		<?php include('includes/header.php'); ?>
		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">

							<h2>Buat Produk</h2>

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<!-- <div class="panel-heading"></div> -->
										<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong></strong><?php echo htmlentities($msg); ?> </div><?php } ?>

										<div class="panel-body">
											<form method="post" class="form-horizontal" enctype="multipart/form-data">
												<div class="form-group">
													<label class="col-sm-2 control-label">Nama Produk<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="namaproduk" class="form-control" required>
													</div>
													<label class="col-sm-2 control-label">Kategori<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="namakategori" required>
															<option value=""> Select </option>
															<?php $ret = "select id,namaKategori from tblkategori";
															$query = $dbh->prepare($ret);
															//$query->bindParam(':id',$id, PDO::PARAM_STR);
															$query->execute();
															$results = $query->fetchAll(PDO::FETCH_OBJ);
															if ($query->rowCount() > 0) {
																foreach ($results as $result) {
															?>
																	<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->namaKategori); ?></option>
															<?php }
															} ?>

														</select>
													</div>
												</div>

												<div class="hr-dashed"></div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Deskripsi<span style="color:red">*</span></label>
													<div class="col-sm-10">
														<textarea class="form-control" name="deskrip" rows="3" required></textarea>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Harga<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="harga" placeholder="Contoh dijual: 10.000/disewa: 100.000/hari" class="form-control" required>
													</div>
													<label class="col-sm-2 control-label">Penjualan<span style="color:red">*</span></label>
													<div class="col-sm-2">
														<select class="selectpicker " name="penjualan" required>
															<option value=""> Select</option>
															<option value="Disewakan">Disewakan</option>
															<option value="Dijual">Dijual</option>
														</select>
													</div>
												</div>


												<!-- <div class="form-group">
													<label class="col-sm-2 control-label">Stok<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="stok" class="form-control" required>
													</div> -->
												<!-- <label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="seatingcapacity" class="form-control" required>
													</div> -->
												<!-- </div> -->
												<div class="hr-dashed"></div>


												<div class="form-group">
													<div class="col-sm-12">
														<h4><b>Upload Gambar</b></h4>
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-4">
														Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
													</div>
													<div class="col-sm-4">
														Image 2<span style="color:red">*</span><input type="file" name="img2" required>
													</div>
													<div class="col-sm-4">
														Image 3<span style="color:red">*</span><input type="file" name="img3">
													</div>
												</div>


												<div class="form-group">
													<div class="col-sm-4">
														Image 4<span style="color:red">*</span><input type="file" name="img4">
													</div>
													<div class="col-sm-4">
														Image 5<span style="color:red">*</span><input type="file" name="img5">
													</div>
													<div class="col-sm-4">
														Image 6<span style="color:red">*</span><input type="file" name="img6">
													</div>

												</div>


												<div class="form-group">
													<div class="col-sm-4">
														Image 7<span style="color:red">*</span><input type="file" name="img7">
													</div>
													<div class="col-sm-4">
														Image 8<span style="color:red">*</span><input type="file" name="img8">
													</div>
													<div class="col-sm-4">
														Image 9<span style="color:red">*</span><input type="file" name="img9">
													</div>

												</div>



												<!-- Mulai Dari Sini Di Tambahkan -->
												<div class="form-group">
													<div class="col-sm-4">
														Image 10<span style="color:red">*</span><input type="file" name="img10">
													</div>
													<!-- <div class="col-sm-4">
														Image 11<span style="color:red">*</span><input type="file" name="img11">
													</div>
													<div class="col-sm-4">
														Image 12<span style="color:red">*</span><input type="file" name="img12">
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4">
														Image 13<span style="color:red">*</span><input type="file" name="img13">
													</div>
													<div class="col-sm-4">
														Image 14<span style="color:red">*</span><input type="file" name="img14">
													</div>
													<div class="col-sm-4">
														Image 15<span style="color:red">*</span><input type="file" name="img15">
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4">
														Image 16<span style="color:red">*</span><input type="file" name="img16">
													</div>
												</div> -->

												</div>
												<div class="hr-dashed"></div>
										</div>
									</div>
								</div>
							</div>


							<div class="form-group">
								<div class="col-sm-8 col-sm-offset-2">
									<button class="btn btn-primary" name="submit" type="submit">Create</button>
									<button class="btn btn-default" type="reset">Cancel</button>
								</div>
							</div>




							</form>
						</div>
					</div>
				</div>
			</div>



		</div>
		</div>



		</div>
		</div>
		</div>

		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
	</body>

	</html>
<?php } ?>