<?php
$conn = mysqli_connect("localhost","root","","project-kasir");
if (mysqli_connect_error()) {
 	echo "koneksi database gagal : ". mysqli_connect_error();  
 }
?>