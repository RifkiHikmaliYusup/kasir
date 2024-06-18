<?php 
include "koneksi.php";
$rifki_id_kategori= $_GET['rifki_id_kategori'];
$conn = mysqli_query($conn,"DELETE FROM rifki_kategori WHERE rifki_id_kategori='$rifki_id_kategori'")or die(mysqli_error());
 
echo "<script>
    alert('Data Kategori Berhasil Dihapus');
    document.location.href = 'rifki_data-kategori.php';
    </script>"
 ?>