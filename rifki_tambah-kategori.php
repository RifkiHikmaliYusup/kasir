<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/rifki-style-login.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<title>Tambah | Kategori</title>
</head>
 <?php 
	 session_start();
	 if ($_SESSION['status'] != "login") {
	 	header("location: rifki_login.php?pesan=belum-login");
	 }
	  ?>
	  <br>
        <div style="margin-left: 20px;">
        		<a href="rifki_manager.php" class="btn btn-danger "  style="text-decoration:none; font-weight: bold;">Kembali</a>
	  	  </div>
<body style="background: black;">
<div class="limiter">
	<div class="container-login100" style="background: black;">
		<div class="wrap-login100">
			<form  method="post" class="login100-form validate-form" action="" enctype="multipart/form-data">
				<span class="login100-form-title">
						<h4>Kategori Menu</h4>
					</span>
					<br>
					<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="rifki_nama_kategori" placeholder="Nama Kategori" required autocomplete="off">
					</div>
					<div>
				<input type="submit" name="submit" value="Tambah" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
include 'koneksi.php';

   if(isset($_POST['submit'])){
   	$rifki_nama_kategori = $_POST['rifki_nama_kategori'];
    

      mysqli_query($conn,"insert into rifki_kategori values('','$rifki_nama_kategori')");

     header("location: rifki_data-kategori.php?pesan=berhasil");
    }
?>
</body>
</html>
