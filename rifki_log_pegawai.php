<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.js"></script>
 	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.dataTables.min.js"></script>
  	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/dataTables.bootstrap4.min.js"></script>
	<title>Log Aktifitas | Admin</title>
</head>
<body style="background: black;">
	<div class="card-header col-sm-12">
    	<b style="color: white;">Data Log Aktifitas</b>
  </div>
	<br>
	<div style="margin-left: 20px;">
        		<a href="rifki_admin.php" class="btn btn-danger "  style="text-decoration:none; font-weight: bold;">Kembali</a>
	  	  </div>
	<?php  
	 session_start();
	 if ($_SESSION['status'] != "login") {
	 	header("location: rifki_login.php?pesan=belum-login");
	 }
	 ?>
        <div style="margin-left: 9%;">
        	<a href="rifki_log_cetak_pegawai.php" style="text-decoration:none; font-weight: bold;" class="btn btn-warning ">Cetak</a>
        </div>
	 
	
		<div class="container">
     		<table class='table table-striped table-bordered' id="datatable">
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
	<script >$(document).ready(function(){
		$('#datatable').DataTable();
	});
	</script>
</body>
</html>