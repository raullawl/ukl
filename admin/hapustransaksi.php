<?php
include '../koneksi.php';

$id_transaksi = $_GET['id'];


$hapus = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'") or die(mysqli_error($mysqli));

if($hapus) {
 
    header("Location: tabeltransaksi.php");
    exit();
} else {
    echo "Gagal menghapus data pariwisata.";
}
?>