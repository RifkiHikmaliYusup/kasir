<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Data Kategori</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
</head>
<body style="background: black;">
	<div class="card-header col-sm-12">
    	<b style="color: white;">Data Kategori</b>
  </div>
<br>
	<br>
	 <div style="margin-left: 20px;">
        		<a href="rifki_manager.php" class="btn btn-danger "  style="text-decoration:none; font-weight: bold;">Kembali</a>
       </div>
       <div style="margin-left: 21%;">
        		<a href="rifki_tambah-kategori.php" style="text-decoration:none; font-weight: bold;" class="btn btn-success ">Tambah Kategori</a>
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
                alert("Data Kategori Berhasil Disimpan!");
            </script>';
      }

	  ?>
	   <div class="table-reponsive col-md-7" style="margin-left: 20%;">
		 <table class='table table-bordered table-condensed table-hover '>
	 	<tr style="text-align: center;" class="table table-info">
	 		<th>No</th>
	 		<th>Nama Kategori</th>
	 		<th>Aksi</th>

	 	</tr>
	 <?php 
	 include "koneksi.php";
	 $no = 1;
	 $data = mysqli_query($conn,"SELECT * FROM rifki_kategori ");
	 while($d = mysqli_fetch_array($data)){
	 	?>
	 	<tr style="color: white;">
	 	<td style="text-align: center;"><?php echo $no++; ?></td>
	 	<td><?php echo $d['rifki_nama_kategori'];?></td>
	 	<td style="text-align: center;">
	 		<a style="font-weight: bold; text-decoration: none ;" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus?');"  href="rifki_hapus-kategori.php?rifki_id_kategori=<?php echo $d['rifki_id_kategori']; ?>">Hapus</a>
	 	</td>
	 	</tr>
	 <?php } ?>
	 </table>
	</div>
	 
</body>
</html>