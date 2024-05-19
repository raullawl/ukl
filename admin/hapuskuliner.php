<?php
include '../koneksi.php';

$id_kuliner = $_GET['id'];


$hapus = mysqli_query($mysqli, "DELETE FROM kuliner WHERE id_kuliner = '$id_kuliner'") or die(mysqli_error($mysqli));

if($hapus) {
 
    header("Location: tabelkuliner.php");
    exit();
} else {
    echo "Gagal menghapus data pariwisata.";
}
?>