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

// Query untuk mendapatkan data riwayat transaksi untuk user ini
$query_riwayat2 = "SELECT t.id_transaksi2, t.jumlah, k.nama_pariwisata, k.harga_pariwisata
                  FROM transaksi2 t
                  JOIN pariwisata k ON t.id_pariwisata = k.id_pariwisata
                  WHERE t.id_user='$id_user'
                  ORDER BY t.id_transaksi2 DESC";
$result_riwayat2 = mysqli_query($mysqli, $query_riwayat2);

// Periksa apakah data transaksi ditemukan
if (mysqli_num_rows($result_riwayat2) > 0) {
    $riwayat2 = [];
    while ($row = mysqli_fetch_assoc($result_riwayat2)) {
        $riwayat2[] = $row;
    }
} else {
    $riwayat2 = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <link rel="stylesheet" href="style15.css">
</head>
<body>

<div class="container">
    <h2>Riwayat Transaksi</h2>
    <?php if (!empty($riwayat)): ?>
        <div class="card-container">
            <?php foreach ($riwayat as $item): ?>
                <div class="card">
                    <h3><?php echo htmlspecialchars($item['nama_pariwisata']); ?></h3>
                    <p><strong>Nomer Transaksi:</strong> <?php echo htmlspecialchars($item['id_transaksi2']); ?></p>
                    <p><strong>Harga per pcs:</strong> Rp <?php echo number_format($item['harga_pariwisata'], 0, ',', '.'); ?></p>
                    <p><strong>Jumlah:</strong> <?php echo htmlspecialchars($item['jumlah']); ?></p>
                    <p><strong>Total Harga:</strong> Rp <?php echo number_format($item['harga_pariwisata'] * $item['jumlah'], 0, ',', '.'); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Belum ada riwayat transaksi.</p>
    <?php endif; ?>
    <a href="index.php" class="button">Kembali ke Beranda</a>
</div>

</body>
</html>
