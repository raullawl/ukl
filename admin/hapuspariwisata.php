<?php
include '../koneksi.php';

$id_pariwisata = $_GET['id'];


$hapus = mysqli_query($mysqli, "DELETE FROM pariwisata WHERE id_pariwisata = '$id_pariwisata'") or die(mysqli_error($mysqli));

if($hapus) {
 
    header("Location: tabelpariwisata.php");
    exit();
} else {
    echo "Gagal menghapus data pariwisata.";
}
?>