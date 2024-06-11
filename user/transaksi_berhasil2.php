<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

// Include file koneksi untuk menghubungkan ke database
include '../koneksi.php';

// Dapatkan username dari session
$username = $_SESSION['username'];

// Query untuk mendapatkan data user berdasarkan username
$query_user = "SELECT * FROM user WHERE username='$username'";
$result_user = mysqli_query($mysqli, $query_user);

// Periksa apakah data user ditemukan
if (mysqli_num_rows($result_user) > 0) {
    // Ambil data dari hasil query
    $user_data = mysqli_fetch_assoc($result_user);
    $id_user = $user_data['id_user'];
} else {
    // Tampilkan pesan jika data user tidak ditemukan
    echo "Data user tidak ditemukan.";
    exit;
}

// Query untuk mendapatkan data transaksi terbaru untuk user ini
$query_transaksi2 = "SELECT * FROM transaksi2 WHERE id_user='$id_user' ORDER BY id_transaksi2 DESC LIMIT 1";
$result_transaksi2 = mysqli_query($mysqli, $query_transaksi2);

// Periksa apakah data transaksi ditemukan
if (mysqli_num_rows($result_transaksi2) > 0) {
    // Ambil data dari hasil query
    $transaksi_data = mysqli_fetch_assoc($result_transaksi2);
    $id_pariwisata = $transaksi_data['id_pariwisata'];
    $jumlah = $transaksi_data['jumlah'];
} else {
    // Tampilkan pesan jika data transaksi tidak ditemukan
    echo "Data transaksi tidak ditemukan.";
    exit;
}

// Query untuk mendapatkan data kuliner berdasarkan id_kuliner
$query_pariwisata = "SELECT * FROM pariwisata WHERE id_pariwisata='$id_pariwisata'";
$result_pariwisata = mysqli_query($mysqli, $query_pariwisata);

// Periksa apakah data kuliner ditemukan
if (mysqli_num_rows($result_pariwisata) > 0) {
    // Ambil data dari hasil query
    $pariwisata_data = mysqli_fetch_assoc($result_pariwisata);
    $nama_pariwisata = $pariwisata_data['nama_pariwisata'];
    $harga_pariwisata = $pariwisata_data['harga_pariwisata'];
} else {
    // Tampilkan pesan jika data kuliner tidak ditemukan
    echo "Data kuliner tidak ditemukan.";
    exit;
}

// Hitung total harga
$total_harga = $harga_pariwisata * $jumlah;

// Query untuk mendapatkan username berdasarkan id_user
$query_user_by_id = "SELECT * FROM user WHERE id_user='$id_user'";
$result_user_by_id = mysqli_query($mysqli, $query_user_by_id);

// Periksa apakah data user berdasarkan id_user ditemukan
if (mysqli_num_rows($result_user_by_id) > 0) {
    // Ambil data dari hasil query
    $user_by_id_data = mysqli_fetch_assoc($result_user_by_id);
    $nama_user = $user_by_id_data['username'];
} else {
    // Tampilkan pesan jika data user tidak ditemukan
    echo "Data user tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Berhasil</title>
    <link rel="stylesheet" href="style14.css">
</head>
<body>

<div class="container">
    <h2>Transaksi Berhasil</h2>
    <div class="transaction-details">
        <p>Nama Pemesan: <?php echo $nama_user; ?></p>
        <p>Nama Pariwisata: <?php echo $nama_pariwisata; ?></p>
        <p>Harga per pcs: Rp <?php echo number_format($harga_pariwisata, 0, ',', '.'); ?></p>
        <p>Jumlah: <?php echo $jumlah; ?></p>
        <p>Total Harga: Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></p>
    </div>
    <a href="index.php" class="button">Kembali ke Beranda</a>
    <a href="riwayat2.php" class="button">Riwayat</a>
</div>

</body>
</html>