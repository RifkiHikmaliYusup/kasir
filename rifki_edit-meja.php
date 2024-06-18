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
	$rifki_id_meja = $_GET['rifki_id_meja'];
 	$edit = mysqli_query($conn,"SELECT * FROM rifki_meja WHERE rifki_id_meja = '$rifki_id_meja'");
 	$result = mysqli_fetch_array($edit);
?>
<?php 
	include 'koneksi.php';
	if (isset($_POST['submit'])) { 
		$rifki_id_meja = $_POST['rifki_id_meja'];
		$rifki_nama_meja = $_POST['rifki_nama_meja'];
		$rifki_status = $_POST['rifki_status'];
		
		$sql = mysqli_query($conn,"UPDATE rifki_meja SET rifki_nama_meja='$rifki_nama_meja',rifki_status='$rifki_status' WHERE rifki_id_meja ='$rifki_id_meja'");
		if (!$sql) {
			echo "<script>alert('Data Gagal Ditambahkan');document.location.href = rifki_edit-meja.php?rifki_id_meja={$rifki_id_meja}';</script>";
		}else{
		echo "<script>alert('Edit Data Berhasil Ditambahkan');document.location.href = 'rifki_data-meja.php';</script>";
		}
	}	

?>
<br>
 <div>
<a href="rifki_data-meja.php" class="simpan" style="font-weight: bold; margin-left: 150px; text-decoration: none;">Kembali</a>
</div>
<br>
<h3 style="font-weight: bold; color: white; margin-left: 150px;">Edit Data User :</h3>
<div class="section">
	<div class="container">
		<div class="box">
<body>
<form  method="post" action="" >
	<table >
		<input type="hidden" name="rifki_id_meja" value="<?php echo $rifki_id_meja?>">
		<tr>
			<td>
			<p class="judul">Nama Meja :</p>
				<input type="text"  class="input-control" name="rifki_nama_meja"   value="<?php echo $result['rifki_nama_meja']  ?>" readonly>
			</td>
		</tr>
		<tr>
			<td>
			<p class="judul">Status :</p>
				
				<select class="input-control" type="text" name="rifki_status" value="<?php echo $result['rifki_status'] ?>" autocomplete="off">
                        <option value="tersedia">Tersedia</option>
                        <option value="terisi">Terisi</option>
					</select>
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