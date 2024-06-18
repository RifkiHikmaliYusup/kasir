<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/rifki-style-index.css">
	<title>Edit Menu</title>
</head>
 <?php 
	 session_start();
	 if ($_SESSION['status'] != "login") {
	 	header("location: rifki_login.php?pesan=belum-login");
	 }
	  ?>
	  
<?php 
include 'koneksi.php';
	$rifki_id_menu = $_GET['rifki_id_menu'];
 	$edit = mysqli_query($conn,"SELECT * FROM rifki_menu_kasir WHERE rifki_id_menu = '$rifki_id_menu'");
 	$result = mysqli_fetch_array($edit);
?>
<?php 
	include 'koneksi.php';
	if (isset($_POST['submit'])) { 
		$rifki_id_menu = $_POST['rifki_id_menu'];
		$rifki_nama_menu = $_POST['rifki_nama_menu'];
		$rifki_harga = $_POST['rifki_harga'];     
		$rifki_status_menu = $_POST['rifki_status_menu'];
		$imagelama = $_POST['imagelama'];

		//cek apakah user pilih gambar baru atau tidak
	if ($_FILES['rifki_image']['error'] === 4 ) {
		$rifki_image = $imagelama;
	}else{
		$rifki_image = upload();

	}
		$sql = mysqli_query($conn,"UPDATE rifki_menu_kasir SET rifki_nama_menu='$rifki_nama_menu', rifki_image='$rifki_image', rifki_harga='$rifki_harga', rifki_status_menu='$rifki_status_menu' WHERE rifki_id_menu ='$rifki_id_menu'");
		if (!$sql) {
			echo "<script>alert('Data Gagal Ditambahkan');document.location.href = rifki_edit-makanan.php?rifki_id_menu={$rifki_id_menu}';</script>";
		}else{
		echo "<script>alert('Edit Data Berhasil Ditambahkan');document.location.href = 'rifki_data-makanan.php';</script>";
		}
	}
	function upload(){

	$namaFile = $_FILES['rifki_image']['name'];
	$ukuranFile = $_FILES['rifki_image']['size'];
	$error = $_FILES['rifki_image']['error'];
	$tmpName = $_FILES['rifki_image']['tmp_name'];

//cek apakah tidak ada gambar yang di upload
	if ($error === 4) {
		echo "<script>
				alert('Pilih Gambar Terlebih Dahulu!');
				window.location='rifki_tambah-makanan.php';
			</script>";

			return false;
	}
//cek apakah yang di upload adalah gambar
	$ekstensiImageValid = ['jpg','jpeg','png'];
	$ekstensiImage = explode('.', $namaFile);
	$ekstensiImage = strtolower(end($ekstensiImage));
	if (!in_array($ekstensiImage, $ekstensiImageValid)) {
		echo "<script>
				alert('Yang Anda Upload Bukan Gambar!');
				window.location='rifki_tambah-makanan.php';
			</script>";

			return false;
	}
//cek jika ukurannya terlalu besar 
	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('Ukuran Gambar Terlalu Besar!');
				window.location='rifki_tambah-makanan.php';
			</script>";

			return false;
	}
//lolos pengecekan gambar siap di upload
		$namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiImage;
 
			move_uploaded_file($tmpName, 'img-makanan/'. $namaFileBaru);
        return $namaFileBaru;
        } 

 ?>	
 <br>
 <div>
<a href="rifki_data-makanan.php" class="simpan" style="font-weight: bold; margin-left: 150px; text-decoration: none;">Kembali</a>
</div>
<br>
<h3 style="font-weight: bold; color: white; margin-left: 150px;">Edit Data Menu :</h3>
<body>
	<div class="section">
	<div class="container">
		<div class="box">
<form  method="post" action="" enctype="multipart/form-data">
	<table>
		<input type="hidden" name="rifki_id_menu" value="<?php echo $rifki_id_menu?>">
		<input type="hidden" name="imagelama" value="<?php echo $result['rifki_image'] ?>">
		
		<tr>
			<td>
			<p class="judul">Nama Menu :</p>
				<input type="text" class="input-control" name="rifki_nama_menu" placeholder="Masakan"  value="<?php echo $result['rifki_nama_menu']  ?>">
			</td>
		</tr>
		<tr>
			<td>
			<p class="judul">Image :</p>
				<img style="margin-left: 50px;" src="img-makanan/<?php echo $result['rifki_image'] ?>"width="80px" >
				<br>
				<input type="file" style="margin-left: 50px; margin-bottom: 20px;" name="rifki_image" >
			</td>
		</tr>

		<tr>
			<td>
			<p class="judul">Harga :</p>
				<input type="number" class="input-control" name="rifki_harga" placeholder="Masukan Harga" value="<?php echo $result['rifki_harga'] ?>">
			</td>
		</tr>
		<tr>
			<td>
			<p class="judul">Status :</p>
				<select name="rifki_status_menu" class="input-control" value="<?php echo $result['rifki_status_menu']  ?>">
					<option value="tersedia">Tersedia</option>
					<option value="habis" >Habis</option>
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