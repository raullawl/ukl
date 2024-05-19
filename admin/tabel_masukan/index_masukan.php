<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman data masukan</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>
    <section class="user">
    <h1 class="heading">Data Masukan</h1>
    <br>
        <a href="../register.php" class="btn">Tambah Masukan</a>
        <br>
        <br>
        <table border="1" class="table">
            <tr>
                <th>Nomer</th>
                <th>idmasukan</th>
                <th>Nama User</th>
                <th>Pesan</th>
                <th>kuliner</th> <!-- Menambah kolom aksi -->
            </tr>
            <?php
            include '../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM masukan") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['idmasukan']; ?></td>
                <td><?php echo $data['id_user']; ?></td>
                <td><?php echo $data['pesan']; ?></td>
                <td><?php echo $data['kuliner']; ?></td>
                <td><a href="hapusmasukan.php?id=<?php echo $data['idmasukan']; ?>" class="btn-hapus">Hapus</a> <!-- Tombol hapus --></td>
                <td><a href="updatemasukan.php?id=<?php echo $data['idmasukan']; ?>" class="btn-update">Update</a> <!-- Tombol update --></td>
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