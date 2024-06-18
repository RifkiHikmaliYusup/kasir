<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home | Kasir</title>
	<link rel="stylesheet" type="text/css" href="css/rifki-style-index.css">
	<link href="font/Poppins-BlackItalic.ttf" rel="stylesheet">
</head>
	 <?php 
	 session_start();
	 if ($_SESSION['status'] != "login") {
	 	header("location: rifki_login.php?pesan=belum-login");

	 }
	  if ($_SESSION['rifki_id_role'] != "3") {
	 	header("location: rifki_login.php?pesan=belum-login");
	 }
	  ?>
	   <?php 	

	  	if(@$_GET['pesan']=="belum-logout"){
            echo 
            '<script type="text/javascript">
                alert("Anda Harus Keluar Terlebih Dahulu!");
            </script>';
      }

	  ?>
	   <?php 	

	  	if(@$_GET['pesan']=="berhasil"){
            echo 
            '<script type="text/javascript">
                alert("Masuk Berhasil");
            </script>';
      }

	  ?>
<body>
	<header>
		<a href="#" class="logo">Cafe</a>
			<ul>
				
				<li><a href="rifki_order-makanan.php">Pesan</a></li>
				<li><a href="rifki_data-meja.php">Data Meja</a></li>
				<li><a href="rifki_tambah-meja.php">Isi Meja</a></li>
				<li><a href="rifki_laporan-transaksi-user.php">Laporan Transaksi</a></li>
				<li><a href="#"><?php echo $_SESSION['rifki_username'];?></a></li>
				<li><a href="rifki_logout.php">Keluar</a></li>
			</ul>

</header>
	<div class="isi" >
		<h2>
			<span>Bisa</span>
			<span>Ngopi</span>
		</h2>
	</div>	


<section>
<div class="card">
	<div class="cover">
		<img src="img-background/kopi.jpg">
	</div>
		<div class="details">
		<div>
			<img src="img-background/kopi.jpg" width="200px" height="200px">
			<h3>Kopi</h3>
			<h4>Kopi adalah minuman hasil seduhan biji kopi yang telah disangrai dan dihaluskan menjadi bubuk. Kopi merupakan salah satu komoditas di dunia yang dibudidayakan lebih dari 50 negara. Dua spesies pohon kopi yang dikenal secara umum yaitu Kopi Robusta dan Kopi Arabika.</h4>
		</div>
	</div>
</div>

<div class="card" style="margin-left: 26%;">
	<div class="cover">
		<img src="img-background/biji-kopi.jpg">
	</div>
		<div class="details">
		<div>
			<img src="img-background/biji-kopi.jpg" width="200px" height="200px">
			<h3>Biji Kopi</h3>
			<h4>Biji kopi adalah biji dari tumbuhan kopi dan merupakan sumber dari minuman kopi. Warna bijinya adalah putih dan sebagian besar berupa endosperma. Setiap buah umumnya memiliki dua biji. Buah yang hanya mengandung satu biji disebut dengan peaberry dan dipercaya memiliki rasa yang lebih baik.</h4>
		</div>
	</div>
</div>
</section>
<section style="margin-left: 160px;">
<div class="wadah">
	<div class="kotak">
		<div class="tampilan">
			<h3>Alamat</h3>
			<p>Komplek Pantai Permata Blok E No. 1-6, Tj. Uma, Batam..</p>
			
		</div>
	</div>
</div>
<div class="wadah">
	<div class="kotak">
		<div class="tampilan">
			<h3>Tentang Kami</h3>
			<p>Cafe Bisa Ngopi berada di dekat pantai dengan mengusung tema suasana pantai. Dengan menyediakan live music, para pengunjung cafe akan merasa begitu nyaman dan terhibur dengan suasana cafe yang asyik. 
			Untuk urusan menu makanan, Pantai Cafe ini memiliki variasi makanan mulai dari masakan khas Indonesia hingga menu western yang lengkap dan tersedia juga berbagai jenis kopi yang bisa kalian nikmati saat berkunjung di sana.</p>
			
		</div>
	</div>
</div>
<div class="wadah">
	<div class="kotak">
		<div class="tampilan">
			<h3>Kontak</h3>
			<p>Intagram : rifffkhy_</p>
			  <p> Whatsapp : 083116468062</p>
			
		</div>
	</div>
</div>
</section>
<br>
<script type="text/javascript" src="css/vanilla-tilt.js"></script>
<script type="text/javascript">
	VanillaTilt.init(document.querySelectorAll(".kotak"), {
		max: 25,
		speed: 400,
		glare: true,
		"max-glare": 1,
	});
</script>
<script type="text/javascript">
	window.addEventListener("scroll", function(){
		var header = document.querySelector("header");
		header.classList.toggle("sticky", window.scrollY > 0);
	})
</script>
</body>
<footer>
		<div class="container">
			<small style="color:white; margin-left: 40%">Copyright &copy; 2022 - Bisa Ngopi.</small>
			
		</div>
	</footer>
</html>

