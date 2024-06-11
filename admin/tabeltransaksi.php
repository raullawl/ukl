<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

// Include file koneksi untuk menghubungkan ke database
include '../koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Data Transaksi</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="styleadmin1.css">
</head>
<body>
<div class="navbar">
    <a href="user.php" class="logo">MyWebsite</a>
    <a href="tabelkuliner.php">Tabel Kuliner</a>
    <a href="tabelpariwisata.php">Tabel Pariwisata</a>
    <a href="tabelcomment.php">Tabel Komen</a>
    <a href="tabeltransaksi.php">Tabel Transaksi</a>
</div>

<section class="transaksi">
    <h1 class="heading">Data Transaksi</h1>
    <br>
    <table border="1" class="table">
        <tr>
            <th>Nomer</th>
            <th>Nama User</th>
            <th>Nama Kuliner</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Action</th>
            <th>Action</th>
        </tr>
        <?php
        // Query untuk mendapatkan data transaksi, user, dan kuliner
        $query_mysql = mysqli_query($mysqli, 
            "SELECT transaksi.id_transaksi, user.username, kuliner.nama_kuliner, transaksi.jumlah, (kuliner.harga_kuliner * transaksi.jumlah) AS total_harga 
            FROM transaksi 
            JOIN user ON transaksi.id_user = user.id_user 
            JOIN kuliner ON transaksi.id_kuliner = kuliner.id_kuliner") or die(mysqli_error($mysqli));
        
        $nomor = 1;
        while($data = mysqli_fetch_array($query_mysql)) {
        ?>
        <tr>
            <td><?php echo $nomor++; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['nama_kuliner']; ?></td>
            <td><?php echo $data['jumlah']; ?></td>
            <td>Rp <?php echo number_format($data['total_harga'], 0, ',', '.'); ?></td>
            <td><a href="hapustransaksi.php?id=<?php echo $data['id_transaksi']; ?>" class="btn-hapus">Hapus</a></td>
            <td><a href="updatetransaksi.php?id=<?php echo $data['id_transaksi']; ?>" class="btn-update">Update</a></td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <br>
    <a href="../index.php" class="btn">Log Out</a>
</section>

<script src="main.js"></script>
</body>
</html>
