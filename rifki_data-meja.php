<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Data Meja</title>
  <link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
  <script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.js"></script>
  <script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="bootstrap-4.5.3-dist/js/dataTables.bootstrap4.min.js"></script>
</head>
<body style="background: black;">
    <div class="card-header col-sm-12">
        <b style="color: white;">Data Meja</b>
  </div>
  <br>
   <div style="margin-left: 20px;">
            <a href="rifki_index.php" class="btn btn-danger "  style="text-decoration:none; font-weight: bold;">Kembali</a>
       </div>
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
    <br>
    <div style="margin-left: 9%;" >
          <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" name="form10" target="_self" class="form-inline" >
            <?php
        $kata_kunci="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
        }
        ?>
                <div>
                 <a href="rifki_tambah-meja.php" style="text-decoration:none; font-weight: bold;" class="btn btn-success ">Tambah meja</a>
                <input  class="form-control col-md-6" type="text" name="kata_kunci" autocomplete="" autofocus value="<?php echo $kata_kunci;?>"  placeholder="Cari..." />
                 <input  class="btn btn-primary" type="submit"  value="Cari" />
                 </div>
            </form>
        </div>
    
    <div class="container">
         <table class='table table-striped table-bordered' id="datatable">
            <thead>
    <tr style="text-align: center;" class="table table-info">
      <th>No</th>
      <th>Nama Meja</th>
      <th>Status Meja</th>
      <th>Aksi</th>

    </tr>
        </thead>
        <tbody style="color: white;">
   <?php 
   include "koneksi.php";
   $no = 1;
   $data = mysqli_query($conn,"SELECT * FROM rifki_meja ");
     if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);
            $data = mysqli_query($conn,"SELECT * FROM rifki_meja WHERE rifki_status like '%".$kata_kunci."%'");

        }
        if (mysqli_num_rows($data) > 0) {
   while($d = mysqli_fetch_array($data)){
    ?>
    <tr>
    <td style="text-align: center;"><?php echo $no++; ?></td>
    <td><?php echo $d['rifki_nama_meja'];?></td>
    <td style="text-align: center;"><?php echo $d['rifki_status'];?></td>
    <td style="text-align: center;">
      <a style="font-weight: bold; text-decoration: none ;" class="btn btn-info" href="rifki_edit-meja.php?rifki_id_meja=<?php echo $d['rifki_id_meja']; ?> ">Edit</a>
      <a style="font-weight: bold; text-decoration: none ;" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus?');"  href="rifki_hapus-meja.php?rifki_id_meja=<?php echo $d['rifki_id_meja']; ?>">Hapus</a>
    </td>
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