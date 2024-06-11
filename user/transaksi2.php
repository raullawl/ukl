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

// Periksa apakah id_pariwisata sudah diset di URL
if(isset($_GET['id_pariwisata'])) {
    $id_pariwisata = $_GET['id_pariwisata'];
    $query_pariwisata = "SELECT * FROM pariwisata WHERE id_pariwisata='$id_pariwisata'";
    $result_pariwisata = mysqli_query($mysqli, $query_pariwisata);

    // Periksa apakah data pariwisata ditemukan
    if(mysqli_num_rows($result_pariwisata) > 0) {
        $pariwisata_data = mysqli_fetch_assoc($result_pariwisata);
    } else {
        echo "Data pariwisata tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Pariwisata tidak tersedia.";
    exit;
}

if(isset($_POST['submit'])){
    $jumlah = $_POST['jumlah'];
    $query_insert = "INSERT INTO transaksi2 (id_user, id_pariwisata, jumlah) VALUES ('$id_user', '$id_pariwisata', '$jumlah')";
    if(mysqli_query($mysqli, $query_insert)){
        header("Location: transaksi_berhasil2.php");
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
    <title>Transaksi Pariwisata</title>
    <link rel="stylesheet" href="style13.css">
</head>
<body>

<div class="container">
    <h2>Transaksi Pariwisata</h2>
    <div class="product-details">
        <h3><?php echo $pariwisata_data['nama_pariwisata']; ?></h3>
        <p><?php echo $pariwisata_data['deskripsi']; ?></p>
        <p>Harga: Rp <?php echo number_format($pariwisata_data['harga_pariwisata'], 0, ',', '.'); ?></p>
    </div>
    <div class="purchase-form">
        <form method="post">
            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
            <input type="hidden" name="id_pariwisata" value="<?php echo $id_pariwisata; ?>">
            <label for="jumlah">Jumlah:</label>
            <input type="number" name="jumlah" id="jumlah" required>
            <button type="submit" name="submit" class="button">Konfirmasi Pembelian</button>
        </form>
    </div>
</div>

</body>
</html>
