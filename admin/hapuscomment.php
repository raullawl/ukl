<?php
include '../koneksi.php';

// Ambil ID user dari parameter URL
$id_comment = $_GET['id'];

// Query untuk menghapus user dari database
$query = "DELETE FROM komentar WHERE id_comment = $id_comment";
$result = mysqli_query($mysqli, $query);

if ($result) {
    // Redirect kembali ke halaman data user jika berhasil menghapus
    header('Location: tabelcomment.php');
} else {
    echo "Gagal menghapus user.";
}
?>  