<?php
include "koneksi.php";
$rifki_id_meja = $_GET['rifki_id_meja'];
$conn = mysqli_query($conn, "DELETE FROM rifki_meja WHERE rifki_id_meja='$rifki_id_meja'") or die(mysqli_error());

echo "<script>
    alert('Data meja Berhasil Dihapus');
    document.location.href = 'rifki_data-meja.php';
    </script>"