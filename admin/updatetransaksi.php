<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

// Include file koneksi untuk menghubungkan ke database
include '../koneksi.php';

if(isset($_GET['id'])){
    $id_transaksi = $_GET['id'];

    // Query untuk mendapatkan data transaksi berdasarkan id_transaksi
    $query = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($mysqli));
    $data = mysqli_fetch_array($query);

    // Query untuk mendapatkan data user dan kuliner
    $id_user = $data['id_user'];
    $id_kuliner = $data['id_kuliner'];
    $query_user = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user='$id_user'") or die(mysqli_error($mysqli));
    $query_kuliner = mysqli_query($mysqli, "SELECT * FROM kuliner WHERE id_kuliner='$id_kuliner'") or die(mysqli_error($mysqli));
    $user_data = mysqli_fetch_array($query_user);
    $kuliner_data = mysqli_fetch_array($query_kuliner);
}

if(isset($_POST['update'])){
    $id_transaksi = $_POST['id_transaksi'];
    $jumlah = $_POST['jumlah'];

    // Query untuk update data transaksi
    $query_update = "UPDATE transaksi SET jumlah='$jumlah' WHERE id_transaksi='$id_transaksi'";
    mysqli_query($mysqli, $query_update) or die(mysqli_error($mysqli));
    header("Location: tabeltransaksi.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Transaksi</title>
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

    <section class="user">
        <h1 class="heading">Update Transaksi</h1>
        <br>
        <form action="updatetransaksi.php?id=<?php echo $data['id_transaksi']; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi']; ?>"><br>
            <label for="username">Nama User</label><br>
            <input type="text" name="username" id="username" value="<?php echo $user_data['username']; ?>" readonly><br>
            <label for="nama_kuliner">Nama Kuliner</label><br>
            <input type="text" name="nama_kuliner" id="nama_kuliner" value="<?php echo $kuliner_data['nama_kuliner']; ?>" readonly><br>
            <label for="jumlah">Jumlah</label><br>
            <input type="number" name="jumlah" id="jumlah" value="<?php echo $data['jumlah']; ?>" required><br>
            <label for="total_harga">Total Harga</label><br>
            <input type="text" name="total_harga" id="total_harga" value="Rp <?php echo number_format($kuliner_data['harga_kuliner'] * $data['jumlah'], 0, ',', '.'); ?>" readonly><br>
            <br>
            <input type="submit" name="update" value="Update" class="btn-update"><br>
        </form>
        <br>
        <a href="tabeltransaksi.php" class="btn">Kembali</a><br>
    </section>

    <script src="main.js"></script>
</body>
</html>

