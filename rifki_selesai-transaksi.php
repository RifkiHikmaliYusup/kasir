<?php 
include 'koneksi.php';

$rifki_id_transaksi = $_GET['rifki_id_transaksi'];
$rifki_id_meja = $_GET['rifki_id_meja'];
$rifki_meja_selesai = "selesai";
$rifki_selesai = "tersedia";

mysqli_query($conn,"UPDATE rifki_transaksi SET rifki_progres='$rifki_meja_selesai' WHERE rifki_id_transaksi='$rifki_id_transaksi'");
mysqli_query($conn,"UPDATE rifki_meja SET rifki_status='$rifki_selesai' WHERE rifki_id_meja='$rifki_id_meja'");

header("location:rifki_history-transaksi.php");
 ?>