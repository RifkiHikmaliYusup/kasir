<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/rifki-style-login.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<title>Registrasi</title>
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
	 
	  	   <?php
    include 'koneksi.php';
 
    $query = mysqli_query($conn, "SELECT max(rifki_kd_user) as kodeTerbesar FROM rifki_user");
    $data = mysqli_fetch_array($query);
    $kodeUser = $data['kodeTerbesar'];
 
    $urutan = (int) substr($kodeUser, 3, 3);
 
    $urutan++;
  
    $huruf = "USR";
    $kodeUser = $huruf . sprintf("%03s", $urutan);
    ?>
	  
<body style="background: black;">
<div class="limiter">
	<div class="container-login100" style="background: black;">
		<div class="wrap-login100">
			<form  method="post" class="login100-form validate-form">
				<span class="login100-form-title">
						<h4>REGISTRASI</h4>
					</span>
					<br>
				<?php 
					include 'koneksi.php';
					$role = mysqli_query($conn, "SELECT * FROM rifki_role");
				 ?>
				<select class="input100" name="rifki_id_role">
					<?php 
						foreach ($role as $key => $role) {
							echo "<option value={$role['rifki_id_role']}>{$role['rifki_nama_role']}</option>";
						}
					 ?>
				</select>
				<br>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="rifki_kd_user" value="<?php echo $kodeUser ?>" required>
				</div>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="rifki_username" placeholder="Username" required>
				</div>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="password" name="rifki_password" placeholder="Password" required>
				</div>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="rifki_nama_user" placeholder="Nama User" required>
				</div>
		
				<input type="submit" name="submit" class="btn btn-primary" value="Registrasi">
			</form>
		</div>
	</div>
</div>
<?php 
include 'koneksi.php';
if (isset($_POST['submit'])) {
	$rifki_id_user = $_POST['rifki_id_user'];
	$rifki_id_role = $_POST['rifki_id_role'];
	$rifki_kd_user = $_POST['rifki_kd_user'];
	$rifki_username = $_POST['rifki_username'];
	$rifki_password = $_POST['rifki_password'];     
	$rifki_nama_user = $_POST['rifki_nama_user'];
	$rifki_password = md5($rifki_password);
 	mysqli_query($conn,"insert into rifki_user values ('$rifki_id_user','$rifki_id_role','$rifki_kd_user','$rifki_username','$rifki_password','$rifki_nama_user')");
	header("location: rifki_data-user.php?pesan=berhasil");
}	

 ?>
</body>
</html>