
<?php 
	session_start();
	session_destroy();
	header("location: rifki_login.php?pesan=berhasil-logout");
 ?>

