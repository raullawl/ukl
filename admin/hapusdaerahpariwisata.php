<?php
include '../koneksi.php';

$id_daerah = $_GET['id'];


$hapus = mysqli_query($mysqli, "DELETE FROM daerah_pariwisata WHERE id_daerah = '$id_daerah'") or die(mysqli_error($mysqli));

if($hapus) {
 
    header("Location: tabeldaerahpariwisata.php");
    exit();
} else {
    echo "Gagal menghapus data pariwisata.";
}
?>