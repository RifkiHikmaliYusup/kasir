<?php
$conn = mysqli_connect("localhost","root","","rifki-kasir-cafe");
if (mysqli_connect_error()) {
 	echo "koneksi database gagal : ". mysqli_connect_error();  
 }
?>