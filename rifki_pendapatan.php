  
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
  <script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.js"></script>
  <script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="bootstrap-4.5.3-dist/js/dataTables.bootstrap4.min.js"></script>
	<title>Data Masakan</title>
</head>
<div class="card-header col-sm-12">
    <b style="color: white;">Pendapatan</b>
  </div>
<br>
        <div style="margin-left: 20px;">
        		<a href="rifki_manager.php" class="btn btn-danger "  style="text-decoration:none; font-weight: bold;">Kembali</a>

        </div>
        <br>
	  
<body style="background: black;">
	<?php  
	 session_start();
	 if ($_SESSION['status'] != "login") {
	 	header("location: rifki_login.php?pesan=belum-login");
	 }
	 ?>


  <?php
  include 'koneksi.php';
$sql  = mysqli_query($conn, "SELECT rifki_tot_bayar,  sum(rifki_tot_bayar) as rifki_jml1, rifki_tgl_transaksi FROM rifki_transaksi WHERE rifki_tgl_transaksi=date(NOW())") or die(mysqli_error($conn));
while($data = mysqli_fetch_array($sql)) {?>	  	
<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body" style="background: black;">
        <h5 class="card-title" style="color: white;">Transaksi Hari Ini : </h5>
        <p class="card-text" style="color: white;"><?php echo "Rp. ".number_format($data['rifki_jml1'])." ,-"; ?></p>
      </div>
    </div>
  </div>
  <?php } ?>
   <?php
  include 'koneksi.php';
$sql  = mysqli_query($conn, "SELECT rifki_tot_bayar,  sum(rifki_tot_bayar) as rifki_jml2, rifki_tgl_transaksi FROM rifki_transaksi WHERE YEARWEEK(rifki_tgl_transaksi)") or die(mysqli_error($conn));
while($data = mysqli_fetch_array($sql)) {?>	 
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body" style="background: black;">
        <h5 class="card-title" style="color: white;">Transaksi Minggu Ini : </h5>
        <p class="card-text" style="color: white;"><?php echo "Rp. ".number_format($data['rifki_jml2'])." ,-"; ?></p>
      </div>
    </div>  
  </div>
<?php } ?>
<br>
<?php
$sql  = mysqli_query($conn, "SELECT  rifki_tot_bayar,  sum( rifki_tot_bayar) as rifki_jml3, rifki_tgl_transaksi FROM rifki_transaksi WHERE MONTH(rifki_tgl_transaksi)") or die(mysqli_error($conn));
while($data = mysqli_fetch_array($sql)) {?>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body" style="background: black;">
        <h5 class="card-title" style="color: white;">Transaksi Bulan Ini :</h5>
        <p class="card-text" style="color: white;"><?php echo "Rp. ".number_format($data['rifki_jml3'])." ,-"; ?></p>
      </div>
    </div>
  </div>
</div>
<?php } ?>
	
  <br>
      <div style="margin-left: 9%;">
        <a href="rifki_cetak_pendapatan.php" style="text-decoration:none; font-weight: bold;" class="btn btn-warning ">Cetak</a>
      </div>
      
   <div class="container">
     <table class='table table-striped table-bordered' id="datatable">
      <thead>
    <tr style="text-align: center;" class="table table-info">
      <th>No</th>
      <th>Tanggal Pembelian</th>
      <th>Total Pendapatan</th>

    </tr>
    </thead>
    <tbody style="color: white;">
   <?php 
   include "koneksi.php";
   $total = 0;
   $no = 1;
   $data = mysqli_query($conn,"SELECT * FROM rifki_transaksi");

   if (mysqli_num_rows($data) > 0) {
   while($d = mysqli_fetch_array($data)){
    $total += $d['rifki_tot_bayar'];
    ?>
    <tr>
    <td style="text-align: center;" ><?php echo $no++; ?></td>
    <td style="text-align: center;"><?php echo $d['rifki_tgl_transaksi'];?></td>
    <td style="text-align: center;">Rp.<?php echo  number_format( $d['rifki_tot_bayar'],0,',','.');?></td>
    </tr>
   <?php }}else{ ?>
    <tr>
      <td colspan="7">Data Kosong</td>
    </tr>
   <?php } ?>
   </tbody>
   </table>
   <h4 style="color: white;">Total Pendapatan : Rp.<?php echo number_format($total) ?></h4>
   </div>
  <script >$(document).ready(function(){
    $('#datatable').DataTable();
  });
  </script>

</body>
</html>
