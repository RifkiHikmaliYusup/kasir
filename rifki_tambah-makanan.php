<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/rifki-style-login.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<title>Tambah | Makanan</title>
</head>
 <?php 
	 session_start();
	 if ($_SESSION['status'] != "login") {
	 	header("location: rifki_login.php?pesan=belum-login");
	 }
	  ?>
	  <?php
        include 'koneksi.php';    
        $kategori = mysqli_query($conn, "SELECT * FROM rifki_kategori");

        ?>
        <br>
        <div style="margin-left: 20px;">
        		<a href="rifki_manager.php" class="btn btn-danger "  style="text-decoration:none; font-weight: bold;">Kembali</a>
	  	  </div>
<body style="background: black;">

				<span class="login100-form-title">
<div class="limiter" >
	<div class="container-login100" style="background: black;">
		<div class="wrap-login100">
			<form  method="post" class="login100-form validate-form" action="" enctype="multipart/form-data" >
						<h4>TAMBAH MENU</h4>
					</span>
					<br>
					<input type="hidden" name="rifki_id_kategori">
				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="rifki_nama_menu" placeholder="Nama Menu" required autocomplete="off">
				</div>
				<div class="wrap-input100 validate-input">
					<h4 >IMG Menu :</h4>
					<br>
					<input class="input100" type="file" name="rifki_image"  required autocomplete="off">
				</div>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="number" name="rifki_harga" placeholder="Harga" required autocomplete="off">
				</div>
				<div class="wrap-input100 validate-input">
					<select class="input100" type="text" name="rifki_status_menu"   autocomplete="off">
                        <option value="tersedia">Tersedia</option>
                        <option value="habis">Habis</option>
					</select>
				</div>
				<div class="wrap-input100 validate-input">
					<select class="input100" type="text" name="rifki_id_kategori">
                       <?php
                    foreach ($kategori as $key => $rifki_kategori){
                        echo "<option value={$rifki_kategori['rifki_id_kategori']}>{$rifki_kategori['rifki_nama_kategori']}</option>";
                    }
                ?>
					</select>
				</div>
				<input type="submit" name="submit" value="Tambah" class="btn btn-primary"></
			</form>
		</div>
	</div>
</div>
<?php 
include 'koneksi.php';

   if(isset($_POST['submit'])){
      $rifki_nama_menu = $_POST['rifki_nama_menu'];
      $rifki_harga = $_POST['rifki_harga'];
      $rifki_status_menu = $_POST['rifki_status_menu'];
   	$rifki_id_kategori = $_POST['rifki_id_kategori'];
      $rifki_image = upload();
	if (!$rifki_image) {
		return false;
	}

      mysqli_query($conn,"insert into rifki_menu_kasir values ('','$rifki_id_kategori','$rifki_nama_menu','$rifki_image','$rifki_harga','$rifki_status_menu')");
       header("location: rifki_data-makanan.php?pesan=berhasil");
    
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
</body>
</html>
