<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman data KOMENTAR</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="styleadmin1.css">
</head>
<body>
      <a href="user.php" class="logo">MyWebsite</a>
        <a href="tabelkuliner.php">Tabel Kuliner</a>
        <a href="tabelpariwisata.php">Tabel Pariwisata</a>
        <a href="tabelcomment.php">Tabel Komen</a>
        <a href="tabeltransaksi.php">Tabel Transaksi</a>
    </div>

    <section class="user">
    <h1 class="heading">Data Komentar</h1>
    <br>
        <br>
        <br>
        <table border="1" class="table">
            <tr>
                <th>Nomer</th>
                <th>Username</th>
                <th>Email</th>
                <th>Komentar</th>
                <th>Kelola</th>
                <th>Kelola</th>
            </tr>
            <?php
            include '../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM komentar") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['isi_komentar']; ?></td>
                <td><a href="hapuscomment.php?id=<?php echo $data['id_comment']; ?>" class="btn-hapus">Hapus</a> <!-- Tombol hapus --></td>
                <td><a href="updatecomment.php?id=<?php echo $data['id_comment']; ?>" class="btn-update">Update</a> <!-- Tombol update --></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
    <a href="../index.php" class="btn">Log Out</a>
    </section>
    
</body>
</html>