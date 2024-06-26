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
$query = "SELECT * FROM user WHERE username='$username'";
$result = mysqli_query($mysqli, $query);

// Periksa apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    // Ambil data dari hasil query
    $user_data = mysqli_fetch_assoc($result);
    $id_user = $user_data['id_user'];
} else {
    // Tampilkan pesan jika data tidak ditemukan
    echo "Data user tidak ditemukan.";
    exit;
}

// Periksa apakah id_kuliner sudah diset di URL
if(isset($_GET['id_kuliner'])) {
    $id_kuliner = $_GET['id_kuliner'];
    $query_kuliner = "SELECT * FROM kuliner WHERE id_kuliner='$id_kuliner'";
    $result_kuliner = mysqli_query($mysqli, $query_kuliner);

    // Periksa apakah data kuliner ditemukan
    if(mysqli_num_rows($result_kuliner) > 0) {
        $kuliner_data = mysqli_fetch_assoc($result_kuliner);
    } else {
        echo "Data kuliner tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Kuliner tidak tersedia.";
    exit;
}

if(isset($_POST['submit'])){
    $jumlah = $_POST['jumlah'];
    $query_insert = "INSERT INTO transaksi (id_user, id_kuliner, jumlah) VALUES ('$id_user', '$id_kuliner', '$jumlah')";
    if(mysqli_query($mysqli, $query_insert)){
        header("Location: transaksi_berhasil.php");
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Kuliner</title>
    <link rel="stylesheet" href="style13.css">
</head>
<body>

<div class="container">
    <h2>Transaksi Kuliner</h2>
    <div class="product-details">
        <h3><?php echo $kuliner_data['nama_kuliner']; ?></h3>
        <p><?php echo $kuliner_data['deskripsi']; ?></p>
        <p>Harga: Rp <?php echo number_format($kuliner_data['harga_kuliner'], 0, ',', '.'); ?></p>
    </div>
    <div class="purchase-form">
        <form method="post">
            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
            <input type="hidden" name="id_kuliner" value="<?php echo $id_kuliner; ?>">
            <label for="jumlah">Jumlah:</label>
            <input type="number" name="jumlah" id="jumlah" required>
            <button type="submit" name="submit" class="button">Konfirmasi Pembelian</button>
        </form>
    </div>
</div>

</body>
</html>
