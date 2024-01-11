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
		$id = intval($_GET['id']);
		// $id = $_GET['id'];

		$sql = "update tblproduk set Namaproduk=:namaproduk,Kategori=:kategori,Deskripsi=:deskripsi,Harga=:harga,Penjualan=:penjualan where id=:id";
		$query = $dbh->prepare($sql);
		$query->bindParam(':namaproduk', $namaproduk, PDO::PARAM_STR);
		$query->bindParam(':kategori', $kategori, PDO::PARAM_STR);
		$query->bindParam(':deskripsi', $deskripsi, PDO::PARAM_STR);
		$query->bindParam(':harga', $harga, PDO::PARAM_STR);
		// $query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
		$query->bindParam(':penjualan', $penjualan, PDO::PARAM_STR);
		// $query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();

		$msg = "Data Berhasil di update";
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

							<h2 class="page-title">Edit Produk</h2>

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<?php if ($msg) { ?><div class="succWrap"><strong></strong><?php echo htmlentities($msg); ?> </div><?php } ?>
											<?php
											$id = intval($_GET['id']);
											$sql = "SELECT tblproduk.*,tblkategori.namaKategori,tblkategori.id as bid from tblproduk join tblkategori on tblkategori.id=tblproduk.Kategori where tblproduk.id=:id";
											$query = $dbh->prepare($sql);
											$query->bindParam(':id', $id, PDO::PARAM_STR);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											$cnt = 1;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {	?>

													<form method="post" class="form-horizontal" enctype="multipart/form-data">
														<div class="form-group">
															<label class="col-sm-2 control-label">Nama Produk<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input type="text" name="namaproduk" class="form-control" value="<?php echo htmlentities($result->Namaproduk) ?>" required>
															</div>
															<label class="col-sm-2 control-label">Kategori<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<select class="selectpicker" name="namakategori" required>
																	<option value="<?php echo htmlentities($result->bid); ?>"><?php echo htmlentities($bdname = $result->namaKategori); ?> </option>
																	<?php $ret = "select id,namaKategori from tblkategori";
																	$query = $dbh->prepare($ret);
																	//$query->bindParam(':id',$id, PDO::PARAM_STR);
																	$query->execute();
																	$resultss = $query->fetchAll(PDO::FETCH_OBJ);
																	if ($query->rowCount() > 0) {
																		foreach ($resultss as $results) {
																			if ($results->namaKategori == $bdname) {
																				continue;
																			} else {
																	?>
																				<option value="<?php echo htmlentities($results->id); ?>"><?php echo htmlentities($results->namaKategori); ?></option>
																	<?php }
																		}
																	} ?>

																</select>
															</div>
														</div>

														<div class="hr-dashed"></div>
														<div class="form-group">
															<label class="col-sm-2 control-label">Deskripsi<span style="color:red">*</span></label>
															<div class="col-sm-10">
																<textarea class="form-control" name="deskrip" rows="3" required><?php echo htmlentities($result->Deskripsi); ?></textarea>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-2 control-label">Harga<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input type="text" name="harga" class="form-control" value="<?php echo htmlentities($result->Harga); ?>" required>
															</div>
															<!-- <label class="col-sm-2 control-label">Select Fuel Type<span style="color:red">*</span></label> -->
															<label class="col-sm-2 control-label">Penjualan<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<div class="col-sm-4">
																	<select class="selectpicker" name="penjualan" required>
																		<option value="<?php echo htmlentities($result->Penjualan); ?>"> <?php echo htmlentities($result->Penjualan); ?></option>
																		<option value="Dijual">Dijual</option>
																		<option value="Disewakan">Disewakan</option>
																	</select>
																</div>
															</div>
														</div>


														<!-- <div class="form-group">
															<label class="col-sm-2 control-label">Stok<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input type="text" name="stok" class="form-control" value="<?php echo htmlentities($result->Stok); ?>" required>
															</div> -->
														<!-- <label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input type="text" name="seatingcapacity" class="form-control" value="<?php echo htmlentities($result->SeatingCapacity); ?>" required>
															</div> -->
										</div>
										<div class="hr-dashed"></div>
										<div class="form-group">
											<div class="col-sm-12">
												<h4><b>Gambar</b></h4>
											</div>
										</div>


										<div class="form-group">
											<div class="col-sm-4">
												Gambar 1 <img src="img/produk/<?php echo htmlentities($result->Vimage1); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage1.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 1</a>
											</div>
											<div class="col-sm-4">
												Gambar 2<img src="img/produk/<?php echo htmlentities($result->Vimage2); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage2.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 2</a>
											</div>
											<div class="col-sm-4">
												Gambar 3<img src="img/produk/<?php echo htmlentities($result->Vimage3); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage3.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 3</a>
											</div>
										</div>


										<div class="form-group">
											<div class="col-sm-4">
												Gambar 4<img src="img/produk/<?php echo htmlentities($result->Vimage4); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage4.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 4</a>
											</div>
											<div class="col-sm-4">
												Gambar 5<img src="img/produk/<?php echo htmlentities($result->Vimage5); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage5.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 5</a>
											</div>
											<div class="col-sm-4">
												Gambar 6<img src="img/produk/<?php echo htmlentities($result->Vimage6); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage6.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 6</a>
											</div>
											<!-- <div class="col-sm-4">
																Image 5
																<?php if ($result->Vimage5 == "") {
																	echo htmlentities("File not available");
																} else { ?>
																	<img src="img/produk/<?php echo htmlentities($result->Vimage5); ?>" width="300" height="200" style="border:solid 1px #000">
																	<a href="changeimage5.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 5</a>
																<?php } ?>
															</div> -->

										</div>



										<div class="form-group">
											<div class="col-sm-4">
												Gambar 7 <img src="img/produk/<?php echo htmlentities($result->Vimage7); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage7.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 7</a>
											</div>
											<div class="col-sm-4">
												Gambar 8<img src="img/produk/<?php echo htmlentities($result->Vimage8); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage8.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 8</a>
											</div>
											<div class="col-sm-4">
												Gambar 9<img src="img/produk/<?php echo htmlentities($result->Vimage9); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage9.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 9</a>
											</div>
										</div>




										<div class="form-group">
											<div class="col-sm-4">
												Gambar 10 <img src="img/produk/<?php echo htmlentities($result->Vimage10); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage10.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 10</a>
											</div>
											<!-- <div class="col-sm-4">
												Gambar 11<img src="img/produk/<?php echo htmlentities($result->Vimage11); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage11.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 11</a>
											</div>
											<div class="col-sm-4">
												Gambar 12<img src="img/produk/<?php echo htmlentities($result->Vimage12); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage12.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 12</a>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-4">
												Gambar 13 <img src="img/produk/<?php echo htmlentities($result->Vimage13); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage13.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 13</a>
											</div>
											<div class="col-sm-4">
												Gambar 14<img src="img/produk/<?php echo htmlentities($result->Vimage14); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage14.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 14</a>
											</div>
											<div class="col-sm-4">
												Gambar 15<img src="img/produk/<?php echo htmlentities($result->Vimage15); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage15.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 15</a>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-4">
												Gambar 16 <img src="img/produk/<?php echo htmlentities($result->Vimage16); ?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage16.php?imgid=<?php echo htmlentities($result->id) ?>">Ubah Gambar 16</a>
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

								<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
							</div>
						</div>
						<!-- <div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Warna</div>
										<div class="panel-body">


											<div class="form-group">
												<div class="col-sm-3">
													<?php if ($result->AirConditioner == 1) { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="airconditioner" checked value="1">
															<label for="inlineCheckbox1"> Air Conditioner </label>
														</div>
													<?php } else { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="airconditioner" value="1">
															<label for="inlineCheckbox1"> Air Conditioner </label>
														</div>
													<?php } ?>
												</div>
												<div class="col-sm-3">
													<?php if ($result->PowerDoorLocks == 1) { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="powerdoorlocks" checked value="1">
															<label for="inlineCheckbox2"> Power Door Locks </label>
														</div>
													<?php } else { ?>
														<div class="checkbox checkbox-success checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="powerdoorlocks" value="1">
															<label for="inlineCheckbox2"> Power Door Locks </label>
														</div>
													<?php } ?>
												</div>
												<div class="col-sm-3">
													<?php if ($result->AntiLockBrakingSystem == 1) { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="antilockbrakingsys" checked value="1">
															<label for="inlineCheckbox3"> AntiLock Braking System </label>
														</div>
													<?php } else { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="antilockbrakingsys" value="1">
															<label for="inlineCheckbox3"> AntiLock Braking System </label>
														</div>
													<?php } ?>
												</div>
												<div class="col-sm-3">
													<?php if ($result->BrakeAssist == 1) {
													?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="brakeassist" checked value="1">
															<label for="inlineCheckbox3"> Brake Assist </label>
														</div>
													<?php } else { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="brakeassist" value="1">
															<label for="inlineCheckbox3"> Brake Assist </label>
														</div>
													<?php } ?>
												</div>

												<div class="form-group">
													<?php if ($result->PowerSteering == 1) {
													?>
														<div class="col-sm-3">
															<div class="checkbox checkbox-inline">
																<input type="checkbox" id="inlineCheckbox1" name="powersteering" checked value="1">
																<label for="inlineCheckbox1"> Power Steering </label>
															</div>
														<?php } else { ?>
															<div class="col-sm-3">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" id="inlineCheckbox1" name="powersteering" value="1">
																	<label for="inlineCheckbox1"> Power Steering </label>
																</div>
															<?php } ?>
															</div>
															<div class="col-sm-3">
																<?php if ($result->DriverAirbag == 1) {
																?>
																	<div class="checkbox checkbox-inline">
																		<input type="checkbox" id="inlineCheckbox1" name="driverairbag" checked value="1">
																		<label for="inlineCheckbox2">Driver Airbag</label>
																	</div>
																<?php } else { ?>
																	<div class="checkbox checkbox-inline">
																		<input type="checkbox" id="inlineCheckbox1" name="driverairbag" value="1">
																		<label for="inlineCheckbox2">Driver Airbag</label>
																	<?php } ?>
																	</div>
																	<div class="col-sm-3">
																		<?php if ($result->DriverAirbag == 1) {
																		?>
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="inlineCheckbox1" name="passengerairbag" checked value="1">
																				<label for="inlineCheckbox3"> Passenger Airbag </label>
																			</div>
																		<?php } else { ?>
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="inlineCheckbox1" name="passengerairbag" value="1">
																				<label for="inlineCheckbox3"> Passenger Airbag </label>
																			</div>
																		<?php } ?>
																	</div>
																	<div class="col-sm-3">
																		<?php if ($result->PowerWindows == 1) {
																		?>
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="inlineCheckbox1" name="powerwindow" checked value="1">
																				<label for="inlineCheckbox3"> Power Windows </label>
																			</div>
																		<?php } else { ?>
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="inlineCheckbox1" name="powerwindow" value="1">
																				<label for="inlineCheckbox3"> Power Windows </label>
																			</div>
																		<?php } ?>
																	</div>


																	<div class="form-group">
																		<div class="col-sm-3">
																			<?php if ($result->CDPlayer == 1) {
																			?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="cdplayer" checked value="1">
																					<label for="inlineCheckbox1"> CD Player </label>
																				</div>
																			<?php } else { ?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="cdplayer" value="1">
																					<label for="inlineCheckbox1"> CD Player </label>
																				</div>
																			<?php } ?>
																		</div>
																		<div class="col-sm-3">
																			<?php if ($result->CentralLocking == 1) {
																			?>
																				<div class="checkbox  checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="centrallocking" checked value="1">
																					<label for="inlineCheckbox2">Central Locking</label>
																				</div>
																			<?php } else { ?>
																				<div class="checkbox checkbox-success checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="centrallocking" value="1">
																					<label for="inlineCheckbox2">Central Locking</label>
																				</div>
																			<?php } ?>
																		</div>
																		<div class="col-sm-3">
																			<?php if ($result->CrashSensor == 1) {
																			?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="crashcensor" checked value="1">
																					<label for="inlineCheckbox3"> Crash Sensor </label>
																				</div>
																			<?php } else { ?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="crashcensor" value="1">
																					<label for="inlineCheckbox3"> Crash Sensor </label>
																				</div>
																			<?php } ?>
																		</div>
																		<div class="col-sm-3">
																			<?php if ($result->CrashSensor == 1) {
																			?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="leatherseats" checked value="1">
																					<label for="inlineCheckbox3"> Leather Seats </label>
																				</div>
																			<?php } else { ?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="leatherseats" value="1">
																					<label for="inlineCheckbox3"> Leather Seats </label>
																				</div>
																			<?php } ?>
																		</div>
																	</div>

															<?php }
													} ?>


															<div class="form-group">
																<div class="col-sm-8 col-sm-offset-2">

																	<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
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
							</div> -->
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