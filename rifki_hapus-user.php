<?php 
include "koneksi.php";
$rifki_id_user = $_GET['rifki_id_user'];
$conn = mysqli_query($conn,"DELETE FROM rifki_user WHERE rifki_id_user='$rifki_id_user'")or die(mysqli_error());
 
echo "<script>
    alert('Data User Berhasil Dihapus');
    document.location.href = 'rifki_data-user.php';
    </script>"
 ?>