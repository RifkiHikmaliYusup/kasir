
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/dataTables.bootstrap4.min.js"></script>
	<title>Laporan Transaksi | User</title>
</head>
<div>
</div>
<body style="background: black;">
	<div class="card-header col-sm-12">
    <b style="color: white;">Laporan Transaksi</b>
  </div>
	<br>
	  <div style="margin-left: 20px;">
        		<a href="rifki_index.php" class="btn btn-danger "  style="text-decoration:none; font-weight: bold;">Kembali</a>
	  	  </div>
	  	  <br>
	  	 
	  	  	<form method="post" class="form-inline" >
	  	<div style="margin-left: 9%;" >
        		<a href="rifki_order-makanan.php" class="btn btn-success " style="text-decoration:none; font-weight: bold;">Tambah Menu</a>
        		<a href="rifki_history-transaksi.php" class="btn btn-info " style="text-decoration:none; font-weight: bold;">Riwayat Transaksi</a>
    		<input type="date" name="rifki_tgl_transaksi" class="form-control col-md-11">
			<input type="submit" name="filter" value="Cari" class="btn btn-primary">
    	</div>
    	
    	
    	</form>
    	<br>
        		
	<?php  
	 session_start();
	 if ($_SESSION['status'] != "login") {
	 	header("location: rifki_login.php?pesan=belum-login");
	 }
	 ?>
	
	 
		<div class="container">
		 <table class="table table-striped table-bordered" id="datatable">
		 	<thead>
	 	<tr style="text-align: center;" class="table table-warning">
	 		<th>No</th>
	 		<th>invoice</th>
	 		<th>Nama Kasir</th>
	 		<th>Nama Meja</th>
	 		<th>Tanggal Transaksi</th>
	 		<th>Bayar</th>
	 		<th>Total Belanja</th>
	 		<th>Kembalian</th>
	 		<th>Keterangan</th>
	 		<th>Status Bayar</th>
	 		<th>Proses</th>
	 		<th>Aksi</th>

	 	</tr>
	 	</thead>
	 	<tbody style="color: white;">
	 <?php 
	 include "koneksi.php";
	
	 $no = 1;
	
	 $data = mysqli_query($conn,"SELECT * FROM rifki_transaksi INNER JOIN rifki_meja ON rifki_meja.rifki_id_meja = rifki_transaksi.rifki_id_meja INNER JOIN rifki_user ON rifki_user.rifki_id_user = rifki_transaksi.rifki_id_user WHERE rifki_progres='belum selesai' AND rifki_username = '$_SESSION[rifki_username]'");
	 if (isset($_POST['filter'])) {
	 	$rifki_tgl_transaksi = $_POST['rifki_tgl_transaksi'];

	 	$data = mysqli_query($conn,"SELECT * FROM rifki_transaksi INNER JOIN rifki_meja ON rifki_meja.rifki_id_meja = rifki_transaksi.rifki_id_meja INNER JOIN rifki_user ON rifki_user.rifki_id_user = rifki_transaksi.rifki_id_user WHERE rifki_tgl_transaksi = '$rifki_tgl_transaksi' AND rifki_progres='belum selesai' ");
	 }
	
	 if (mysqli_num_rows($data) > 0) {
	 while($d = mysqli_fetch_array($data)){
	 	
	 	?>
	 	<tr>
	 	<td style="text-align: center;"><?php echo $no++; ?></td>
	 	<td><?php echo $d['rifki_invoice'];?></td>
	 	<td><?php echo $d['rifki_username'];?></td>
	 	<td><?php echo $d['rifki_nama_meja'];?></td>
	 	<td style="text-align: center;"><?php echo $d['rifki_tgl_transaksi'];?></td>
	 	<td>Rp.<?php echo number_format($d['rifki_bayar']);?></td>
	 	<td>Rp.<?php echo number_format($d['rifki_tot_bayar']);?></td>
	 	<td>Rp.<?php echo number_format($d['rifki_kembali']);?></td>
	 	<td><?php echo $d['rifki_keterangan'];?></td>
	 	<td><?php echo $d['rifki_status_order'];?></td>	
	 	<td><?php echo $d['rifki_progres'];?></td>
	 	<td>
	 		<div style="text-align: center;">
	 		<a href="rifki_detail-transaksi.php?rifki_id_transaksi=<?php echo $d['rifki_id_transaksi']; ?>" class="btn btn-primary " style="text-decoration:none; font-weight: bold;">Struk</a>
	 		<br>
	 		<br>
	 		 <a href="rifki_selesai-transaksi.php?rifki_id_transaksi=<?php echo $d['rifki_id_transaksi']; ?>&rifki_id_meja=<?php echo $d['rifki_id_meja']; ?>" class="btn btn-info" style="text-decoration:none; font-weight: bold;" >Selesai</a>
	 		 </div>
	 	</td>
	 	</tr>
	 <?php }}else{ ?>
	 	<tr>
	 		<td colspan="12" align="center">Data Kosong</td>
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
