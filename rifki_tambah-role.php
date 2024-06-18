<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/rifki-style-login.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<title>Tambah Role</title>
</head>
<br>
	 <div style="margin-left: 20px;">
        		<a href="rifki_admin.php" class="btn btn-danger "  style="text-decoration:none; font-weight: bold;">Kembali</a>
       </div>
 <?php 
	 session_start();
	 if ($_SESSION['status'] != "login") {
	 	header("location: rifki_login.php?pesan=belum-login");
	 }
	  ?>
	  
<body style="background: black;">
<div class="limiter">
	<div class="container-login100" style="background: black;">
		<div class="wrap-login100">
			<form  method="post" class="login100-form validate-form" action="">
				<span class="login100-form-title">
						<h4>ROLE</h4>
					</span>
					<br>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="rifki_nama_role" placeholder="Nama Role" required autocomplete="off">
				</div>
		
				<input type="submit" name="submit" class="btn btn-primary" value="Tambah"></
			</form>
		</div>
	</div>
</div>
<?php 
include 'koneksi.php';

   include 'teguh_koneksi.php';
   if(isset($_POST['submit'])){
      $rifki_nama_role = $_POST['rifki_nama_role'];

      mysqli_query($conn,"insert into rifki_role values('','$rifki_nama_role')");

     header("location: rifki_data-role.php?pesan=berhasil");
    }
	
 ?>
</body>
</html>
