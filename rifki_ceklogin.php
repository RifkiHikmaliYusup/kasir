<?php 
	session_start();    
	include 'koneksi.php'; 
	
		$rifki_username = $_POST['rifki_username'];
		$rifki_password = $_POST['rifki_password'];
		$rifki_password = md5($rifki_password);

	$data = mysqli_query($conn,"select * from rifki_user where rifki_username = '$rifki_username' and rifki_password = '$rifki_password'");
 	$cek = mysqli_num_rows($data);

 	if ($cek > 0) {
 		$login = mysqli_fetch_assoc($data);
 		
 		if ($login['rifki_id_role'] == 1) {
 			$_SESSION['rifki_username'] = $rifki_username;
 			$_SESSION['rifki_nama_role'] = $rifki_username;
 			$_SESSION['rifki_id_role'] = '1';
 			$_SESSION['status'] = 'login';
 			header("location: rifki_admin.php?pesan=berhasil");

 		}
  		elseif ($login['rifki_id_role'] == 2) {
			$_SESSION['rifki_username'] = $rifki_username;
 			$_SESSION['rifki_id_role'] = '2';
 			$_SESSION['status'] = 'login';
 			header("location: rifki_manager.php?pesan=berhasil"); 			
 		}
 		elseif ($login['rifki_id_role'] == 3) {
 			$_SESSION['rifki_username'] = $rifki_username;
 			$_SESSION['rifki_nama'] = $rifki_nama;
 			$_SESSION['rifki_id_role'] = '3';
 			$_SESSION['status'] = 'login';
 			header("location: rifki_index.php?pesan=berhasil");
 		}

 	}else{ 
 		header("location: rifki_login.php?pesan=gagal");
 	}

  ?>
  