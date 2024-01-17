<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_GET['del'])) {
		$delid = $_GET['del'];
		$sql = "delete from tblproduk  WHERE  id=:delid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':delid', $delid, PDO::PARAM_STR);
		$query->execute();
		$msg = "Data Berhasil Di Hapus";
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

							<h2>Semua Produk</h2>

							<!-- Zero Configuration Table -->
							<div class="panel panel-default">
								<!-- <div class="panel-heading"></div> -->
								<div class="panel-body">
									<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong></strong><?php echo htmlentities($msg); ?> </div><?php } ?>
									<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Kategori</th>
												<th>Produk</th>
												<th>Harga</th>
												<th>Penjualan</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<!-- <tfoot>
											<tr>
												<th>No</th>
												<th>Kategori</th>
												<th>Produk</th>
												<th>Harga</th>
												<th>Stok</th>
												<th>Aksi</th>
											</tr>
											</tr>
										</tfoot> -->
										<tbody>

											<?php $sql = "SELECT tblproduk.Namaproduk,tblkategori.namaKategori,tblproduk.Harga,tblproduk.Penjualan,tblproduk.id from tblproduk join tblkategori on tblkategori.id=tblproduk.Kategori";
											$query = $dbh->prepare($sql);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											$cnt = 1;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {				?>
													<tr>
														<td><?php echo htmlentities($cnt); ?></td>
														<td><?php echo htmlentities($result->namaKategori); ?></td>
														<td><?php echo htmlentities($result->Namaproduk); ?></td>
														<td><?php echo htmlentities($result->Harga); ?></td>
														<!-- <td><?php echo htmlentities($result->FuelType); ?></td> -->
														<td><?php echo htmlentities($result->Penjualan); ?></td>
														<td><a class=" btn-primary" href="editproduk.php?id=<?php echo $result->id; ?>">Edit</a>&nbsp;&nbsp;
															<a class=" btn-primary" href="semuaproduk.php?del=<?php echo $result->id; ?>" onclick="return confirm('Apakah Anda Ingin Hapus?');">Hapus</a>
														</td>
													</tr>
											<?php $cnt = $cnt + 1;
												}
											} ?>

										</tbody>
									</table>



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