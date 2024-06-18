
<?php  
if (isset($_SESSION['pesan'])) {
      echo '
              ' . $_SESSION['pesan'] . '
            ';

      unset($_SESSION['pesan']);
    }
    ?>
<?php 
	session_start();
	include 'koneksi.php';

	 if ($_SESSION['status'] != "login") {
	 	header("location: rifki_login.php?pesan=belum-login");
	 }
	 

	if (isset($_POST['simpan_pesanan'])) {
		
		if (isset($_SESSION['cart'])) {

			$session_array_id = array_column($_SESSION['cart'], "rifki_id_menu");

			if (!in_array($_GET['rifki_id_menu'], $session_array_id)) {
				
				$session_array = array(
				'rifki_id_menu' => $_GET['rifki_id_menu'],
				"rifki_id_kategori" => $_POST['rifki_id_kategori'],
				"rifki_nama_menu" => $_POST['rifki_nama_menu'],
				"rifki_harga" => $_POST['rifki_harga'],
				"quantity"	=> $_POST['quantity']	
					);

				$_SESSION['cart'][] = $session_array;
			}
			
		}else{
			$session_array = array(
				'rifki_id_menu' => $_GET['rifki_id_menu'],
				"rifki_id_kategori" => $_POST['rifki_id_kategori'],
				"rifki_nama_menu" => $_POST['rifki_nama_menu'],
				"rifki_harga" => $_POST['rifki_harga'],
				"quantity"	=> $_POST['quantity']	
			);
			$_SESSION['cart'][] = $session_array;
		}
	}
 ?>
  <?php 
   $rifki_username= $_SESSION['rifki_username'];
   $rifki_data = "SELECT * FROM rifki_user where rifki_username='$rifki_username'";
   $rifki_sql = mysqli_query($conn, $rifki_data);

       if (mysqli_num_rows($rifki_sql)>0) {
         $rifki_row = mysqli_fetch_array($rifki_sql);
         $_SESSION['rifki_username']  =$rifki_row["rifki_username"];
         $_SESSION['rifki_id_user']  =$rifki_row["rifki_id_user"];
      }

   ?>
<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
			<title>Order Masakan</title>
		</head>
		<body style="background: black; color: white;">
			<br>
		<a href="rifki_index.php" class="btn btn-danger "  style="margin-left: 20px; font-weight: bold;">Kembali</a>
		<br>
		<br>
		  <div style="margin-left: 29%;">
	  	  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" name="form10" target="_self" class="form-inline">
	  	  	<?php
        $kata_kunci="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
        }
        ?>
	  	  		<div>
        		<input  class="form-control col-md-10" type="text" name="kata_kunci" autocomplete="" autofocus value="<?php echo $kata_kunci;?>"  placeholder="Cari Kategori..." />
        		 <input  class="btn btn-primary" type="submit"  value="Cari" />
        		 </div>
  			</form>
  		</div>
 
 <br>
	
		 
		<div class="container-fluid">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<h2 class="text-center">Produk</h2>
					
						<div class="col-md-12">
							<div class="row">
								
							
						<?php 
							$query = "SELECT * FROM rifki_menu_kasir INNER JOIN rifki_kategori on rifki_kategori.rifki_id_kategori=rifki_menu_kasir.rifki_id_kategori WHERE rifki_status_menu = 'tersedia' AND rifki_nama_kategori like '%".$kata_kunci."%'";
							$result = mysqli_query($conn,$query);

							if (mysqli_num_rows($result) > 0) {
								
								while ($row = mysqli_fetch_array($result)) {?>
							<div class="col-md-4">
								<form method="post" action="rifki_order-makanan.php?rifki_id_menu=<?=$row['rifki_id_menu'] ?>">
									<img src="img-makanan/<?= $row['rifki_image'] ?>" width="180px" height="140px">
									<h5 class="text-center"><?= $row['rifki_nama_menu'] ?></h5>
									<h5 class="text-center">Rp.<?= number_format($row['rifki_harga']) ?></h5>
									<input type="hidden" name="rifki_nama_kategori" value="<?= $row['rifki_nama_kategori'] ?>">
									<input type="hidden" name="rifki_id_kategori" value="<?= $row['rifki_id_kategori'] ?>">
									<input type="hidden" name="rifki_nama_menu" value="<?= $row['rifki_nama_menu'] ?>">
									<input type="hidden" name="rifki_harga" value="<?= $row['rifki_harga'] ?>">
									<input type="number" name="quantity" value="1" class="form-control">
									<input type="submit" name="simpan_pesanan" value="Tambah" class="btn btn-warning btn-block my-2">
								</form>
							</div>

							<?php }}else{
								echo "Menu Tidak Ada";
							}



						 ?>
						 	</div>
						</div>
					</div>
					<div class="col-md-6" style="color: white;">
						<h2 class="text-center">Pesanan</h2>

						<?php 
						$no = 1;

						$total = 0;

						$output = "";

						$output .= "
							<table class='table table-bordered table-striped' style='color: white;'> 
							<tr>
								<th >No</th>
								<th>Nama Masakan</th>
								<th>Harga</th>
								<th>Quantity</th>
								<th>Total Harga</th>
								<th>Aksi</th>
							</tr>
						";
						
						if (!empty($_SESSION['cart'])) {
							foreach ($_SESSION['cart'] as $key => $value) {
								
								$output .= "
								<tr>
									<td>".$no++."</td>			
									<td>".$value['rifki_nama_menu']."</td>
									<td>".$value['rifki_harga']."</td>
									<td>".$value['quantity']."</td>
									<td>Rp.".number_format($value['rifki_harga'] * $value['quantity'])."</td>
									<td>
										<a class='btn btn-danger btn-block' href='rifki_order-makanan.php?aksi=hapus&rifki_id_menu=".$value['rifki_id_menu']."'>
										Hapus
										</a>
									</td>
								</tr>
								";

								$total = $total + $value['quantity'] * $value['rifki_harga'];
							}
							$output .= "
								<tr>
								 <td colspan='3'></td>
								 <td><b>Total Price</b></td>
								 <td>Rp.".number_format($total,0,',','.')."</td>
								 <td>
								 	<a class='btn btn-warning btn-block' href='rifki_order-makanan.php?aksi=HapusSemua'>
								 	Hapus Semua
								 	</a>
								 </td>
								</tr>
								
								
								
							";
						}

						echo $output;
						 ?>
						</div>
						  <?php
    include 'koneksi.php';
 
    $query = mysqli_query($conn, "SELECT max(rifki_id_transaksi) as kodeTerbesar FROM rifki_transaksi");
    $data = mysqli_fetch_array($query);
    $a = $data['kodeTerbesar'];
 
    $urutan = (int) substr($a, 3, 3);
 
    $urutan++;
  
    $huruf = "TRS";
    $a = $huruf . sprintf("%03s", $urutan);
    ?>
						   <?php
    include 'koneksi.php';
 
    $query = mysqli_query($conn, "SELECT max(rifki_invoice) as kodeTerbesar FROM rifki_transaksi");
    $data = mysqli_fetch_array($query);
    $kodeInvoice = $data['kodeTerbesar'];
 
    $urutan = (int) substr($kodeInvoice, 3, 3);
 
    $urutan++;
  
    $huruf = "IVC";
    $kodeInvoice = $huruf . sprintf("%03s", $urutan);
    ?>
						
						 <form method="post">
						 <table class='table table-bordered table-striped'>
						 <input  type="hidden" name="rifki_id_transaksi" value="<?php echo $a ?>" required>
						 <input type="hidden" name="rifki_id_menu" value="<?php echo $value['rifki_id_menu']?>" >
								<input  type="hidden" name="rifki_invoice" value="<?php echo $kodeInvoice ?>" required>
								<input type="hidden" name="rifki_id_user" value="<?php echo $_SESSION['rifki_id_user']?>" >

								<?php 
									include 'koneksi.php';
									$query = mysqli_query($conn, "SELECT * FROM rifki_user");
		
								 ?>
								<input  type="hidden" name="rifki_id_user" >
						
						 	<tr>
						 		<tr>
								 	<th style="color: white;">Pilih Nomer Meja</th>
								</tr>
								<tr>
									<td>
										<?php 
					include 'koneksi.php';
					$meja = mysqli_query($conn, "SELECT * FROM rifki_meja WHERE rifki_status = 'tersedia'");
				 ?>
										<select name="rifki_id_meja" class='form-control'>
											<?php 
						foreach ($meja as $key => $meja) {
							echo "<option value={$meja['rifki_id_meja']}>{$meja['rifki_nama_meja']}</option>";
						}
					 ?>
										</select>
									</td>
								</tr>
								<tr>
								 	<th style="color: white;">Bayar</th>
								</tr>
								<tr>
									<td>
										<input type="number" name="rifki_bayar" class="form-control">
									</td>
								</tr>
								<tr>
								 	<th style="color: white;">Keterangan</th>
								</tr>
								<tr>
									<td>
										<input type="text" name="rifki_keterangan" class="form-control">
									</td>
								</tr>
									<th>
     								 <button name="bayar" class='btn btn-danger btn-xs'>Pesan</button>
     								 </th>
								</tr>

							</table>
						 </form>

						 <?php 
						 	if (isset($_POST['bayar'])) {
				 					$rifki_id_transaksi = $_POST['rifki_id_transaksi'];
									$rifki_invoice = $_POST['rifki_invoice'];
						 			$rifki_id_user = $_SESSION['rifki_id_user'];
						 			$rifki_id_meja = $_POST['rifki_id_meja'];
      								$rifki_tgl_transaksi = @$_POST['rifki_tgl_transaksi'];
      								$rifki_keterangan = @$_POST['rifki_keterangan'];
      								$rifki_bayar = @$_POST['rifki_bayar'];
      								$rifki_tot_bayar = @$_POST['rifki_tot_bayar'];
      								$rifki_status_order = "Sudah Bayar";
      								$rifki_kembali = @$_POST['rifki_kembali'];
      								$rifki_id_detail_trans = $_POST['rifki_id_detail_trans'];
      								$rifki_id_menu = $_POST['rifki_id_menu'];
      								$rifki_mejaterisi = "terisi";
      								$rifki_belum_selesai = "belum selesai";
      								$qty = $_POST['qty'];

      								$cart = unserialize(serialize($_SESSION['cart']));
      								
									$rifki_tot_bayar = 0;

									foreach ($cart as $a) {
  									$rifki_tot_bayar += $a['quantity']* $a['rifki_harga'];
  										
  								}
  									$rifki_kembali = $rifki_bayar - $rifki_tot_bayar;

  									mysqli_query($conn,"INSERT INTO rifki_transaksi (rifki_id_transaksi, rifki_invoice, rifki_id_user, rifki_id_meja, rifki_tgl_transaksi, rifki_keterangan, rifki_bayar, rifki_tot_bayar, rifki_status_order, rifki_kembali, rifki_progres) VALUES('$rifki_id_transaksi','$rifki_invoice','$rifki_id_user','$rifki_id_meja','" . date('Y-m-d') . "','$rifki_keterangan','$rifki_bayar','$rifki_tot_bayar','$rifki_status_order','$rifki_kembali','$rifki_belum_selesai')"); 

  									$rifki_id_transaksi = mysqli_query($conn,"SELECT rifki_id_transaksi FROM rifki_transaksi WHERE rifki_invoice = '$rifki_invoice'");
									$order = mysqli_fetch_array($rifki_id_transaksi);
									$rifki_id = $order['rifki_id_transaksi'];

									foreach($cart as $b){
									$rifki_menu = $b['rifki_id_menu'];
									$rifki_pembelian = $b['quantity'];

  									mysqli_query($conn,"INSERT INTO rifki_detail_transaksi VALUES('$rifki_id_detail_trans','$rifki_id','$rifki_menu','$rifki_pembelian')");
  									}
  									 mysqli_query($conn, "UPDATE rifki_meja SET rifki_status='$rifki_mejaterisi' WHERE rifki_id_meja='$rifki_id_meja'");


  									unset($_SESSION['cart']);
  									$_SESSION['pesan'];

  									echo "<script>alert('Terimakasih Telah Melakukan Pembelian Di Toko Masakan Kami');
  									document.location.href = 'rifki_laporan-transaksi-user.php';
  									</script>";

								}
						  ?>
					</div>
					
				</div>
			</div>	
		</div>	
	

		<?php 

			if (isset($_GET['aksi'])) {
				if ($_GET['aksi'] == "HapusSemua") {
					unset($_SESSION['cart']);
				}
				if ($_GET['aksi'] == "hapus") {
					
					foreach ($_SESSION['cart'] as $key => $value) {

						if ($value['rifki_id_menu'] == $_GET['rifki_id_menu']) {
							unset($_SESSION['cart'][$key]);
						}
					}
				}
			}
		 ?>	
		</body>
		</html>		
