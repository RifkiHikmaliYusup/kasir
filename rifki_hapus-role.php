<?php 
include "koneksi.php";
$rifki_id_role = $_GET['rifki_id_role'];
$conn = mysqli_query($conn,"DELETE FROM rifki_role WHERE rifki_id_role='$rifki_id_role'")or die(mysqli_error());
 
echo "<script>
    alert('Data Role Berhasil Dihapus');
    document.location.href = 'rifki_data-role.php';
    </script>"
 ?>