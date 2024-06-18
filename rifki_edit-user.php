<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/rifki-style-index.css">
	<title>Edit User</title>
</head>
 <?php 
	 session_start();
	 if ($_SESSION['status'] != "login") {
	 	header("location: login.php?pesan=belum-login");
	 }
	  ?>
	  
<?php 
include 'koneksi.php';
	$rifki_id_user = $_GET['rifki_id_user'];
 	$edit = mysqli_query($conn,"SELECT * FROM rifki_user WHERE rifki_id_user = '$rifki_id_user'");
 	$result = mysqli_fetch_array($edit);
?>
<?php 
	include 'koneksi.php';
	if (isset($_POST['submit'])) { 
		$rifki_id_role = $_POST['rifki_id_role'];
		$rifki_id_user = $_POST['rifki_id_user'];
		$rifki_kd_user = $_POST['rifki_kd_user'];
		$rifki_username = $_POST['rifki_username'];    
		$rifki_nama = $_POST['rifki_nama'];
		$sql = mysqli_query($conn,"UPDATE rifki_user SET rifki_username='$rifki_username',rifki_id_role='$rifki_id_role', rifki_nama='$rifki_nama' WHERE rifki_id_user ='$rifki_id_user'");
		if (!$sql) {
			echo "<script>alert('Data Gagal Ditambahkan');document.location.href = rifki_edit-user.php?rifki_id_user={$rifki_id_user}';</script>";
		}else{
		echo "<script>alert('Edit Data Berhasil Ditambahkan');document.location.href = 'rifki_data-user.php';</script>";
		}
	}	

?>
<br>
 <div>
<a href="rifki_data-user.php" class="simpan" style="font-weight: bold; margin-left: 150px; text-decoration: none;">Kembali</a>
</div>
<br>
<h3 style="font-weight: bold; color: white; margin-left: 150px;">Edit Data User :</h3>
<div class="section">
	<div class="container">
		<div class="box">
<body>
<form  method="post" action="" >
	<table >
		<input type="hidden" name="rifki_id_user" value="<?php echo $rifki_id_user?>">
		<tr>
			<td>
			<p class="judul">Level :</p>
				<?php 
					include 'koneksi.php';
					$role = mysqli_query($conn, "SELECT * FROM rifki_role");
				 ?>
				<select  class="input-control" name="rifki_id_role">
					<?php 
						foreach ($role as $key => $role) {
							echo "<option value={$role['rifki_id_role']}>{$role['rifki_nama_role']}</option>";
						}
					 ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
			<p class="judul">Kode User :</p>
				<input type="text"  class="input-control" name="rifki_kd_user" placeholder="Kode User"  value="<?php echo $result['rifki_kd_user']  ?>" readonly>
			</td>
		</tr>
		<tr>
			<td>
			<p class="judul">Username :</p>
				<input type="text"  class="input-control" name="rifki_username" placeholder="Masukan Username"  value="<?php echo $result['rifki_username']  ?>">
			</td>
		</tr>
		<tr>
			<td>
			<p class="judul">Nama Lengkap Pengguna :</p>
				<input type="text"  class="input-control" name="rifki_nama" placeholder="Masukan Nama"  value="<?php echo $result['rifki_nama']  ?>">
			</td>
		</tr>
		<tr>
			<td><input type="submit" class="simpan" name="submit" placeholder="Simpan"></td>
		</tr>
	</table>
</form>
			</div>
		</div>
	</div>	

</body>
</html>