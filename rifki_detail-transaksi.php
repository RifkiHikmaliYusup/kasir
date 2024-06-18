
<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/rifki-style-login.css">
	<title class="missing">Laporan Transaksi | User</title>
</head> 
<div>
</div>
<body>
	<div class="card-header col-sm-12" >
    <b class="missing">Detail Laporan Transaksi</b>
  </div>
  <center>
  	<h2>CAFE BISA NGOPI</h2>
  	<h4>Komplek Pantai Permata Blok E No. 1-6, Tj. Uma, Batam</h4>
<hr>
  </center>
	  <div style="margin-left: 20px;" class="missing">
        		<a href="rifki_laporan-transaksi-user.php" class="btn btn-danger "  style="text-decoration:none; font-weight: bold;">Kembali</a>
	  	  </div>
	  	  <br>
	  	  <div style="margin-left: 70px;" class="missing">
        		<a href="#" onclick="window.print();" class="btn btn-warning "  style="text-decoration:none; font-weight: bold;">Cetak</a>
	  	  </div>
	  	  <br>
        		
	<?php  
	 session_start();
	 if ($_SESSION['status'] != "login") {
	 	header("location: rifki_login.php?pesan=belum-login");
	 }
	 ?>
	 <?php 
	include 'koneksi.php';
	 $rifki_id_transaksi = $_GET['rifki_id_transaksi'];
		$data = mysqli_query($conn,"SELECT *, rifki_menu_kasir.rifki_nama_menu as rifki_namamenu FROM `rifki_detail_transaksi` INNER JOIN rifki_menu_kasir ON rifki_menu_kasir.rifki_id_menu=rifki_detail_transaksi.rifki_id_menu INNER JOIN rifki_transaksi ON rifki_transaksi.rifki_id_transaksi=rifki_detail_transaksi.rifki_id_transaksi INNER JOIN rifki_user ON rifki_user.rifki_id_user=rifki_transaksi.rifki_id_user INNER JOIN rifki_meja ON rifki_meja.rifki_id_meja=rifki_transaksi.rifki_id_meja WHERE rifki_transaksi.rifki_id_transaksi = '$rifki_id_transaksi'");
 	$d = mysqli_fetch_array($data);
	 ?>
	 <form method="post" class="login100-form validate-form" >
	 		<div class="wrap-input100 validate-input" style="margin-left: 80%;"	>
				<td>Tanggal Transaksi : </td>
					<input type="text" class="input100" value="<?php echo $d['rifki_tgl_transaksi']   ?>" disabled>
		</div>
	 </form>
	
	 
	<?php 
	include 'koneksi.php';
	 $rifki_id_transaksi = $_GET['rifki_id_transaksi'];
		$data = mysqli_query($conn,"SELECT *, rifki_menu_kasir.rifki_nama_menu as rifki_namamenu FROM `rifki_detail_transaksi` INNER JOIN rifki_menu_kasir ON rifki_menu_kasir.rifki_id_menu=rifki_detail_transaksi.rifki_id_menu INNER JOIN rifki_transaksi ON rifki_transaksi.rifki_id_transaksi=rifki_detail_transaksi.rifki_id_transaksi INNER JOIN rifki_user ON rifki_user.rifki_id_user=rifki_transaksi.rifki_id_user INNER JOIN rifki_meja ON rifki_meja.rifki_id_meja=rifki_transaksi.rifki_id_meja WHERE rifki_transaksi.rifki_id_transaksi = '$rifki_id_transaksi'");
 	$d = mysqli_fetch_array($data);
	 ?>
	
	<form method="post" class="login100-form validate-form" style="margin-left: 26%;">
		<style>
.border 
{ 
	border: 5px dotted red;
	border: 10; 
	border color: ;
}
</style>
		<div class="border" style="width: 47.9%;">
			<th>
				<td>Invoice : </td>
					<input type="text" value="<?php echo $d['rifki_invoice']   ?>" disabled>
			</th>
			<th>
				<td>Id Transaksi : </td>
					<input type="text"  value="<?php echo $d['rifki_id_transaksi']   ?>" disabled>
			</th>
		</div>
		<div class="border" style="width: 47.9%;">
			<th>
				<td>Nama Kasir : </td>
					<input type="text"  value="<?php echo $d['rifki_username']   ?>" disabled>
			</th>
		</div>
		<div class="border" style="width: 47.9%;">
			<th>
				<td>Nomer Meja : </td>
					<input type="text"  value="<?php echo $d['rifki_nama_meja']   ?>" disabled>
			</th>
		</div>
		<div class="border" class="border" style="width: 47.9%;">
			<th>
				<td>Keterangan Pembelian : </td>
					<input type="text"  value="<?php echo $d['rifki_keterangan']   ?>" disabled>
			</th>
		</div>
		</form>

		<div class="border" style="width: 47.9%; margin-left: 26%;">
		 	<td >Pembelian :</td>
		</div>
		 <div class="table-reponsive col-md-6" style="margin-left: 25%;" >
		 <table class='table table-bordered table-striped '>
	 	<tr style="text-align: center;" class="table table-info">
	 		<th>No</th>
	 		<th>Nama Menu</th>
	 		<th>Total Item</th>
	 		<th>Harga Menu</th>

	 	</tr>
	 <?php 
	 include "koneksi.php";
	 $rifki_id_transaksi = $_GET['rifki_id_transaksi'];
	
	 $no = 1;
	
	 $data = mysqli_query($conn,"SELECT *, rifki_menu_kasir.rifki_nama_menu as rifki_namamenu FROM `rifki_detail_transaksi` INNER JOIN rifki_menu_kasir ON rifki_menu_kasir.rifki_id_menu=rifki_detail_transaksi.rifki_id_menu INNER JOIN rifki_transaksi ON rifki_transaksi.rifki_id_transaksi=rifki_detail_transaksi.rifki_id_transaksi INNER JOIN rifki_user ON rifki_user.rifki_id_user=rifki_transaksi.rifki_id_user INNER JOIN rifki_meja ON rifki_meja.rifki_id_meja=rifki_transaksi.rifki_id_meja WHERE rifki_transaksi.rifki_id_transaksi = '$rifki_id_transaksi'");
	 if (mysqli_num_rows($data) > 0) {
	 while($d = mysqli_fetch_array($data)){

	 	?>
	 	<tr class="table table-default">
	 	<td style="text-align: center;"><?php echo $no++; ?></td>
	 	<td><?php echo $d['rifki_namamenu'];?></td>
	 	<td><?php echo $d['qty'];?></td>
	 	<td>Rp.<?php echo number_format($d['rifki_harga']);?></td>
	 	</tr>
	 <?php }}else{ ?>
	 	<tr>
	 		<td colspan="12" align="center">Data Kosong</td>
	 	</tr>
	 <?php } ?>
	 <?php 
	include 'koneksi.php';
	 $rifki_id_transaksi = $_GET['rifki_id_transaksi'];
		$data = mysqli_query($conn,"SELECT *, rifki_menu_kasir.rifki_nama_menu as rifki_namamenu FROM `rifki_detail_transaksi` INNER JOIN rifki_menu_kasir ON rifki_menu_kasir.rifki_id_menu=rifki_detail_transaksi.rifki_id_menu INNER JOIN rifki_transaksi ON rifki_transaksi.rifki_id_transaksi=rifki_detail_transaksi.rifki_id_transaksi INNER JOIN rifki_user ON rifki_user.rifki_id_user=rifki_transaksi.rifki_id_user INNER JOIN rifki_meja ON rifki_meja.rifki_id_meja=rifki_transaksi.rifki_id_meja WHERE rifki_transaksi.rifki_id_transaksi = '$rifki_id_transaksi'");
 	$d = mysqli_fetch_array($data);
	 ?>
	 	<tr>
	 		<td colspan="2"></td>
	 		<td>Total Harga</td>
	 		<td>Rp.<?php echo number_format($d['rifki_tot_bayar']);?></td>
	 	</tr>
	 	<tr>
	 		<td colspan="2"></td>
	 		<td>Total Bayar</td>
	 		<td>Rp.<?php echo number_format($d['rifki_bayar']);?></td>
	 	</tr>
	 	<tr>
	 		<td colspan="2"></td>
	 		<td>Kembalian</td>
	 		<td>Rp.<?php echo number_format($d['rifki_kembali']);?></td>
	 	</tr>
	 </table>
	</div>
	
<h3 style="margin-left: 45%;">Terima Kasih</h3>
	<style type="text/css">
  @media print{
  .missing{
    display: none;

  		}
	}

</style>
</body>
</html>
