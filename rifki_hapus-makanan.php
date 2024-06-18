<?php 
include "koneksi.php";
$rifki_id_menu = $_GET['rifki_id_menu'];
$conn = mysqli_query($conn,"DELETE FROM rifki_menu_kasir WHERE rifki_id_menu='$rifki_id_menu'")or die(mysqli_error());
 
echo "<script>
    alert('Data Masakan Berhasil Dihapus');
    document.location.href = 'rifki_data-makanan.php';
    </script>"
 ?>