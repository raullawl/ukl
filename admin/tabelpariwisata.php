<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman data kuliner</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="styleadmin1.css">
</head>
<body>
<div class="navbar">
        <a href="user.php" class="logo">MyWebsite</a>
        <a href="tabelkuliner.php">Tabel Kuliner</a>
        <a href="tabelpariwisata.php">Tabel Pariwisata</a>
        <a href="tabelcomment.php">Tabel Komen</a>
    </div>

    <section class="user">
    <h1 class="heading">Data Pariwisata</h1>
    <br>
        <a href="tambahpariwisata.php" class="btn">Tambah Pariwisata</a>
        <br>
        <br>
        <table border="1" class="table">
            <tr>
                <th>Nomer</th>
                <th>Nama Pariwisata</th>
                <th>Alamat Pariwisata</th>
                <th>Harga tiket Pariwisata</th>
                <th>Kelola</th>
                <th>Kelola</th>


            </tr>
            <?php
            include '../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM pariwisata") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama_pariwisata']; ?></td>
                <td><?php echo $data['alamat_pariwisata']; ?></td>
                <td><?php echo $data['harga_tiket_pariwisata']; ?></td>
                <td><a href="hapuspariwisata.php?id=<?php echo $data['id_pariwisata']; ?>" class="btn-hapus">Hapus</a> <!-- Tombol hapus --></td>
                <td><a href="updatepariwisata.php?id=<?php echo $data['id_pariwisata']; ?>" class="btn-update">Update</a> <!-- Tombol update --></td>
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