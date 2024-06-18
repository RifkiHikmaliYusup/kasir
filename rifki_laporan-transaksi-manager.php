
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/dataTables.bootstrap4.min.js"></script>

	<title>Laporan Transaksi | Manager</title>
</head>
<div>
</div>
<body style="background: black;">
	<div class="card-header col-sm-12">
    <b style="color: white;">Laporan Transaksi</b>
  </div>
	<br>
	  <div style="margin-left: 20px;">
        		<a href="rifki_manager.php" class="btn btn-danger "  style="text-decoration:none; font-weight: bold;">Kembali</a>
        		
	  	  </div>
	  	  <br>
	<?php  
	 session_start();
	 if ($_SESSION['status'] != "login") {
	 	header("location: rifki_login.php?pesan=belum-login");
	 }
	 ?>
	
	 
	 
	  <div class="form-inline" style="margin-left: 9%;"> 
	   <form method="post" >

	  	<div >
	  		<a href="rifki_cetak-transaksi.php" style="text-decoration:none; font-weight: bold;" class="btn btn-warning ">Cetak</a>
    		<input type="date" name="rifki_tgl_transaksi" class="form-control col-md-11">
    	
			<input type="submit" name="filter" value="FILTER" class="btn btn-primary">
    	</div>
    	
    	</form>
    </div>
		 <div class="container">
		 <table class='table table-striped table-bordered' id="datatable">
		 	<thead>
	 	<tr style="text-align: center;" class="table table-warning">
	 		<th>No</th>
	 		<th>Invoice</th>
	 		<th>Nama Kasir</th>
	 		<th>Nama Meja</th>
	 		<th>Nama Menu</th>
	 		<th>Tanggal Transaksi</th>
	 		<th>Bayar</th>
	 		<th>Total Belanja</th>
	 		<th>Kembalian</th>
	 		<th>Pembelian</th>
	 		<th>Status Pembelian</th>
	 		<th>Proses</th>

	 	</tr>
	 	</thead>
	 	<tbody style="color: white;">
	 <?php 
	 include "koneksi.php";
	 $no = 1;
	 $data = mysqli_query($conn,"SELECT * FROM rifki_detail_transaksi INNER JOIN rifki_transaksi ON rifki_transaksi.rifki_id_transaksi = rifki_detail_transaksi.rifki_id_transaksi INNER JOIN rifki_menu_kasir ON rifki_menu_kasir.rifki_id_menu = rifki_detail_transaksi.rifki_id_menu INNER JOIN rifki_meja ON rifki_meja.rifki_id_meja = rifki_transaksi.rifki_id_meja INNER JOIN rifki_user ON rifki_user.rifki_id_user = rifki_transaksi.rifki_id_user ");

	 

	  if (isset($_POST['filter'])) {
	 	$rifki_tgl_transaksi = $_POST['rifki_tgl_transaksi'];

	 	$data = mysqli_query($conn,"SELECT * FROM rifki_detail_transaksi INNER JOIN rifki_transaksi ON rifki_transaksi.rifki_id_transaksi = rifki_detail_transaksi.rifki_id_transaksi INNER JOIN rifki_meja ON rifki_meja.rifki_id_meja = rifki_transaksi.rifki_id_meja INNER JOIN rifki_user ON rifki_user.rifki_id_user = rifki_transaksi.rifki_id_user  WHERE rifki_tgl_transaksi = '$rifki_tgl_transaksi'");
	 }

	 if (mysqli_num_rows($data) > 0) {
	 while($d = mysqli_fetch_array($data)){
	 	?>
	 	<tr>
	 	<td style="text-align: center;"><?php echo $no++; ?></td>
	 	<td ><?php echo $d['rifki_invoice'];?></td>
	 	<td><?php echo $d['rifki_username'];?></td>
	 	<td ><?php echo $d['rifki_nama_meja'];?></td>
	 	<td ><?php echo $d['rifki_nama_menu'];?></td>
	 	<td style="text-align: center;"><?php echo $d['rifki_tgl_transaksi'];?></td>
	 	<td>Rp.<?php echo number_format($d['rifki_bayar']);?></td>
	 	<td>Rp.<?php echo number_format($d['rifki_tot_bayar']);?></td>
	 	<td>Rp.<?php echo number_format($d['rifki_kembali']);?></td>
	 	<td style="text-align: center;"><?php echo $d['qty'];?></td>
	 	<td ><?php echo $d['rifki_status_order'];?></td>
	 	<td ><?php echo $d['rifki_progres'];?></td>
	 	
	 	
	 	</tr>
	 <?php }}else{ ?>
	 	<tr>
	 		<td colspan="7">Data Kosong</td>
	 	</tr>
	 <?php } ?>
	  </tbody>
	 </table>
	</div>
	<script >$(document).ready(function(){
		$('#datatable').DataTable();
	});
	</script>
</body>
</html>
