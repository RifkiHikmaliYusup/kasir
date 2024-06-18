
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<title>Data Role</title>
</head>

<body style="background: black;">
	<div class="card-header col-sm-12">
    	<b style="color: white;">Data Role</b>
  </div>
	<br>
	<div style="margin-left: 20px;">
        		<a href="rifki_admin.php" class="btn btn-danger "  style="text-decoration:none; font-weight: bold;">Kembali</a>
	  	  </div>
	  	  <br>
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
                alert("Data Role Berhasil Disimpan!");
            </script>';
      }

	  ?>
	   <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" name="form10" target="_self" class="form-inline"  style="margin-left: 31.1%;" >
	  	  	<?php
        $kata_kunci="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
        }
        ?>
        <a href="rifki_tambah-role.php" style="text-decoration:none; font-weight: bold;" class="btn btn-success ">Tambah Role</a>
        <div>
        <input style="margin-left: 20px;" class="form-control col-md-11" type="text" name="kata_kunci" autocomplete="" autofocus value="<?php echo $kata_kunci;?>"  placeholder="Cari.." />
        		 <input  class="btn btn-primary" type="submit"  value="Cari" />
        		 </div>
  			</form>
  			<br>
		 
		  <div class="table-reponsive col-md-5" style="margin-left: 30%;">
		 <table class='table table-bordered table-condensed table-hover ' >
	 	<tr style="text-align: center;" class="table table-info">
	 		<th>No</th>
	 		<th>Nama Role</th>
	 		<th>Aksi</th>

	 	</tr>
	 <?php 
	 include "koneksi.php";
	 $no = 1;
	 $data = mysqli_query($conn,"SELECT * FROM rifki_role");
	  if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);
            $data = mysqli_query($conn,"SELECT * FROM rifki_role WHERE rifki_nama_role like '%".$kata_kunci."%'");
         }
         if (mysqli_num_rows($data) > 0) {
	 while($d = mysqli_fetch_array($data)){
	 	?>
	 	<tr style="color: white;">
	 	<td style="text-align: center;"><?php echo $no++; ?></td>
	 	<td><?php echo $d['rifki_nama_role'];?></td>
	 	<td style="text-align: center;">
	 		<a style="font-weight: bold; text-decoration: none ;" class="btn btn-info" href="rifki_edit-role.php?rifki_id_role=<?php echo $d['rifki_id_role']; ?> ">Edit</a>
	 		<a style="font-weight: bold; text-decoration: none ;" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus?');"  href="rifki_hapus-role.php?rifki_id_role=<?php echo $d['rifki_id_role']; ?>">Hapus</a>
	 	</td>
	 	</tr>
	 <?php }}else{ ?>
	 	<tr>
	 		<td colspan="3" align="center">Data Kosong</td>
	 	</tr>
	 <?php } ?>
	 </table>
</body>
</html>
