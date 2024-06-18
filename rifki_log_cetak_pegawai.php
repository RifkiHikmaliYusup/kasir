<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<title>Log Aktifitas | Admin</title>
</head>
<body style="background: black;">
	<div class="card-header col-sm-12 missing">
    	<b style="color: white;">Cetak Data Log Aktifitas</b>
  </div>
	<br>
	<div style="margin-left: 20px;">
        		<a href="rifki_log_pegawai.php" class="btn btn-danger missing"  style="text-decoration:none; font-weight: bold;"  >Kembali</a>
	  	  </div>
	<?php  
	 session_start();
	 if ($_SESSION['status'] != "login") {
	 	header("location: rifki_login.php?pesan=belum-login");
	 }
	 ?>
        <div style="margin-left: 9%;">
        	<a href="rifki_log_cetak_pegawai.php" onclick="window.print();" style="text-decoration:none; font-weight: bold;" class="btn btn-warning missing">Cetak</a>
        </div>
	 	<br>
	
		<div class="container">
     		<table class='table table-striped table-bordered'>
      	<thead>
	 	<tr style="text-align: center;" class="table table-info">
	 		<th>No</th>
	 		<th>Waktu</th>
	 		<th>Nama User</th>
	 		<th>Keterangan</th>

	 	</tr>
	 	</thead>
    	<tbody>
	 <?php 
	 include "koneksi.php";
	 $no = 1;
	 $data = mysqli_query($conn,"SELECT * FROM rifki_log_pegawai INNER JOIN rifki_user ON rifki_user.rifki_id_user = rifki_log_pegawai.rifki_id_user");
	 if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);
            $data = mysqli_query($conn,"SELECT * FROM rifki_log_pegawai INNER JOIN rifki_user ON rifki_user.rifki_id_user = rifki_log_pegawai.rifki_id_user WHERE rifki_nama like '%".$kata_kunci."%'");
           }

         if (mysqli_num_rows($data) > 0) {
	 while($d = mysqli_fetch_array($data)){
	 	?>
	 	<tr style="color: white;">
	 	<td><?php echo $no++; ?></td>
	 	<td><?php echo $d['rifki_waktu']; ?></td>
	 	<td><?php echo $d['rifki_nama'];?></td>
	 	<td><?php echo $d['rifki_ket'];?></td>
	 	</tr>
	 <?php }}else{ ?>
	 	<tr>
	 		<td colspan="4" align="center">Data Kosong</td>
	 	</tr>
	 <?php } ?>
	 </tbody>
	 </table>
	</div>
	<style type="text/css">
  @media print{
  .missing  {
    display: none;

  }
}
</style>
	
</body>
</html>