<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/rifki-style-index.css">
	<title>Edit Role</title>
</head>
 <?php 
	 session_start();
	 if ($_SESSION['status'] != "login") {
	 	header("location: rifki_login.php?pesan=belum-login");
	 }
	  ?>
	  
<?php 
include 'koneksi.php';
	$rifki_id_role = $_GET['rifki_id_role'];
	$query = mysqli_query($conn, "SELECT * FROM rifki_role WHERE rifki_id_role = '$rifki_id_role'");
 	$result = mysqli_fetch_array($query);
	

 ?>
 <?php 
include 'koneksi.php';
	$rifki_id_role = $_GET['rifki_id_role'];
 	$edit = mysqli_query($conn,"SELECT * FROM rifki_role WHERE rifki_id_role = '$rifki_id_role'");
 	$result = mysqli_fetch_array($edit);
?>
<?php 
	include 'koneksi.php';
	if (isset($_POST['submit'])) { 
		$rifki_id_role = $_POST['rifki_id_role'];
		$rifki_nama_role = $_POST['rifki_nama_role'];
		$sql = mysqli_query($conn,"UPDATE rifki_role SET rifki_nama_role='$rifki_nama_role' WHERE rifki_id_role ='$rifki_id_role'");
		if (!$sql) {
			echo "<script>alert('Data Gagal Ditambahkan');document.location.href = rifki_edit-role.php?rifki_id_role={$rifki_id_role}';</script>";
		}else{
		echo "<script>alert('Edit Data Berhasil Ditambahkan');document.location.href = 'rifki_data-role.php';</script>";
		}
	}	

?>
<br>
 <div>
<a href="rifki_data-role.php" class="simpan" style="font-weight: bold; margin-left: 150px; text-decoration: none;">Kembali</a>
</div>
<br>
<h3 style="font-weight: bold; color: white; margin-left: 150px;">Edit Data Role :</h3>
<div class="section">
	<div class="container">
		<div class="box">
<body>
<form  method="post" action="" >
	<table>
		<input type="hidden" name="rifki_id_role" value="<?php echo $rifki_id_role?>">
		<tr>
			<td>
			<p class="judul">Nama Role</p>
				<input type="text" class="input-control" name="rifki_nama_role" value="<?php echo $result['rifki_nama_role']  ?>">
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

