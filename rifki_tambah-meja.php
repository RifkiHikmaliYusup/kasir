<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/rifki-style-login.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<title>Tambah | Meja</title>
</head>
 <?php 
	 session_start();
	 if ($_SESSION['status'] != "login") {
	 	header("location: rifki_login.php?pesan=belum-login");
	 }
	  ?>
	  <?php
    include 'koneksi.php';
 
    $query = mysqli_query($conn, "SELECT max(rifki_nama_meja) as kodeTerbesar FROM rifki_meja");
    $data = mysqli_fetch_array($query);
    $kodeMeja = $data['kodeTerbesar'];
 
    $urutan = (int) substr($kodeMeja, 3, 3);
 
    $urutan++;
  
    $huruf = "MJ-";
    $kodeMeja = $huruf . sprintf("%03s", $urutan);
    ?>
	  <br>
        <div style="margin-left: 20px;">
        		<a href="rifki_index.php" class="btn btn-danger "  style="text-decoration:none; font-weight: bold;">Kembali</a>
	  	  </div>
<body style="background: black;">
<div class="limiter">
	<div class="container-login100" style="background: black;">
		<div class="wrap-login100">
			<form  method="post" class="login100-form validate-form" action="" enctype="multipart/form-data">
				<span class="login100-form-title">
						<h4>Tambah Meja</h4>
					</span>
					<br>
					<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="rifki_nama_meja" value="<?php echo $kodeMeja ?>" required>
					</div>
					<div class="wrap-input100 validate-input">
					<select class="input100" type="text" name="rifki_status" autocomplete="off">
                        <option value="tersedia">Tersedia</option>
                        <option value="terisi">Terisi</option>
					</select>
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
   	$rifki_nama_meja = $_POST['rifki_nama_meja'];
   	$rifki_status = $_POST['rifki_status'];
    

      mysqli_query($conn,"insert into rifki_meja values('','$rifki_nama_meja','$rifki_status')");

     header("location: rifki_data-meja.php?pesan=berhasil");
    }
?>
</body>
</html>
