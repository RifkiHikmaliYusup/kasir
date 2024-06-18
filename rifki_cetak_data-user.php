<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Data User</title>
</head>

<body>
	<?php  
	 session_start();
	 if ($_SESSION['status'] != "login") {
	 	header("location: rifki_login.php?pesan=belum-login");
	 }
	 ?>
	
	 
	 <?php 	

	  	if(@$_GET['pesan']=="berhasil"){
            echo 
            '<script type="text/javascript">
                alert("Data User Berhasil Disimpan!");
            </script>';
      }

	  ?>
	  <h2>Data User</h2>
		 <table border="2" align="center">
	 	<tr>
	 		<th>ID</th>
	 		<th>Kode User</th>
	 		<th>Nama Role</th>
	 		<th>Username</th>
	 		<th>Nama User</th>

	 	</tr>
	 <?php 
	 include "koneksi.php";
	 $no = 1;
	 $data = mysqli_query($conn,"SELECT * FROM rifki_user INNER JOIN rifki_role ON rifki_role.rifki_id_role=rifki_user.rifki_id_role");
	 while($d = mysqli_fetch_array($data)){
	 	?>
	 	<tr>
	 	<td><?php echo $no++; ?></td>
	 	<td><?php echo $d['rifki_kd_user'] ?></td>
	 	<td><?php echo $d['rifki_nama_role'];?></td>
	 	<td><?php echo $d['rifki_username'];?></td>
	 	<td><?php echo $d['rifki_nama_user'];?></td>
	 	</tr>
	 <?php } ?>
	 </table>
	 <div>
    <a href="" onclick="window.print();" style="font-weight: bold; text-decoration: none;" class="no-print">Cetak</a>
  <style type="text/css">
  @media print{
  .no-print{
    display: none;

  }
}
</style>
</div>
	 <a href="rifki_admin.php" class="no-print">Back</a>
</body>
</html>