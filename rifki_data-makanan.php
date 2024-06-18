
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/dataTables.bootstrap4.min.js"></script>
	<title>Data Makanan</title>
</head>
<div class="card-header col-sm-12">
    <b style="color: white;">Data Menu</b>
  </div>
<br>
        <div style="margin-left: 20px;">
        		<a href="rifki_manager.php" class="btn btn-danger "  style="text-decoration:none; font-weight: bold;">Kembali</a>
	  	  </div>
	  	  <br>
	  	  <div style="margin-left: 9.4%;">
	  	  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" name="form10" target="_self" class="form-inline">
	  	  	<?php
        $kata_kunci="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
        }
        ?>
	  	  		<div>
        		<a href="rifki_tambah-makanan.php" style="text-decoration:none; font-weight: bold;" class="btn btn-success ">Tamabah Menu</a>
        		<input  class="form-control col-md-6" type="text" name="kata_kunci" autocomplete="" autofocus value="<?php echo $kata_kunci;?>"  placeholder="Cari..." />
        		 <input  class="btn btn-primary" type="submit"  value="Cari" />
        		 </div>
  			</form>
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

	  	if(@$_GET['pesan']=="berhasil"){
            echo 
            '<script type="text/javascript">
                alert("Data Menu Berhasil Disimpan!");
            </script>';
      }

	  ?>
	  
	 <div class="container">
		 <table class='table table-striped table-bordered' id="datatable">
		 	<thead>
	 	<tr style="text-align: center;" class="table table-info">
	 		<th>No</th>
	 		<th>Nama Menu</th>
	 		<th>Nama kategori</th>
	 		<th>Image</th>
	 		<th>Harga</th>
	 		<th>Status</th>
	 		<th>Aksi</th>

	 	</tr>
	 </thead>
	 <tbody>
	 <?php

        include "koneksi.php";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);
            $sql="SELECT * from rifki_menu_kasir INNER JOIN rifki_kategori on rifki_kategori.rifki_id_kategori=rifki_menu_kasir.rifki_id_kategori
            
             where rifki_nama_kategori like '%".$kata_kunci."%' order by rifki_id_menu asc";

        }else {
            $sql="select * from rifki_menu_kasir join rifki_kategori on rifki_kategori.rifki_id_kategori=rifki_menu_kasir.rifki_id_kategori  order by rifki_id_menu asc";
        }


        $hasil=mysqli_query($conn,$sql);
        $no = 1;
        while ($d = mysqli_fetch_array($hasil)) {
           

            ?>
	 	<tr class="table table-default" style="color: white;">
	 	<td style="text-align: center;"><?php echo $no++; ?></td>
	 	<td><?php echo $d['rifki_nama_menu'];?></td>
	 	<td style="text-align: center;"><?php echo $d['rifki_nama_kategori'];?></td>
	 	<td style="text-align: center;"><img src="img-makanan/<?php echo $d['rifki_image'] ?>" width="50px"></td> 	
	 	<td style="text-align: center;">Rp.<?php echo  number_format( $d['rifki_harga'],0,',','.');?></td>
	 	<td><?php echo $d['rifki_status_menu'];?></td>	
	 	<td style="text-align: center;">
	 		<a style="font-weight: bold; text-decoration: none ;" class="btn btn-info" href="rifki_edit-makanan.php?rifki_id_menu=<?php echo $d['rifki_id_menu']; ?> ">Edit</a>
	 		<a style="font-weight: bold; text-decoration: none ;" onClick="return confirm('Apakah anda yakin ingin menghapus?');" class="btn btn-danger" href="rifki_hapus-makanan.php?rifki_id_menu=<?php echo $d['rifki_id_menu']; ?>">Hapus</a>
	 	</td>
	 	</tr>

	 	<tr>
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
