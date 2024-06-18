<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/rifki-style-login.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<title>Login</title>
</head>

<body>
	<?php
	session_start();

	// Cek apakah pengguna sudah login atau belum
	if (isset($_SESSION['role'])) {
		// Redirect pengguna ke halaman sesuai perannya
		if ($_SESSION['role'] == 'anggota') {
			header("Location: anggota.php");
			exit();
		} elseif ($_SESSION['role'] == 'petugas') {
			header("Location: petugas.php");
			exit();
		} elseif ($_SESSION['role'] == 'kepala_perpus') {
			header("Location: kepala_perpus.php");
			exit();
		}
	}

	?>

	<?php

	if (@$_GET['pesan'] == "gagal") {
		echo
		'<script type="text/javascript">
                alert("Gagal Masuk!");
            </script>';
	}

	?>


	<?php

	if (@$_GET['pesan'] == "berhasil-logout") {
		echo
		'<script type="text/javascript">
                alert("Anda Berhasil Keluar!");
            </script>';
	}

	?>
	<?php

	if (@$_GET['pesan'] == "belum-login") {
		echo
		'<script type="text/javascript">
                alert("Anda Harus Masuk Terlebih Dahulu!");
            </script>';
	}

	?>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="rifki_ceklogin.php" enctype="multipart/form-data">

					<span class="login100-form-title">
						<h1 style="font-weight: bold;">Bisa Ngopi</h1>
					</span>

					<div class="wrap-input100 validate-input">
						<input style="font-weight: bold;" class="input100" type="text" name="rifki_username" placeholder=" Username" required />
					</div>

					<div class="wrap-input100 validate-input">
						<input style="font-weight: bold;" class="input100" type="password" name="rifki_password" placeholder="Password" required />
					</div>

					<input type="submit" name="submit" class="btn btn-info" value="Masuk">
				</form>
			</div>
		</div>
	</div>
</body>

</html>