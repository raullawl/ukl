<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kuliner</title>
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
        <h1 class="heading">Tambah Kuliner</h1>
        <br>
        <?php
        include '../koneksi.php';

        if(isset($_POST['submit'])){
            $nama_kuliner = $_POST['nama_kuliner'];
            $deskripsi = $_POST['deskripsi'];
            $gambar = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];
            $harga = $_POST['harga_kuliner'];

            if($gambar){
                move_uploaded_file($tmp_name, "uploaded_img/$gambar");
                $query = "INSERT INTO kuliner (nama_kuliner, deskripsi, gambar, harga_kuliner) VALUES ('$nama_kuliner', '$deskripsi', '$gambar', '$harga')";
            } else {
                $query = "INSERT INTO kuliner (nama_kuliner, deskripsi, harga_kuliner) VALUES ('$nama_kuliner', '$deskripsi', '$harga')";
            }

            mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
            header("Location: tabelkuliner.php");
        }
        ?>
        <form action="tambahkuliner.php" method="post" enctype="multipart/form-data">
            <label for="nama_kuliner">Nama Kuliner</label><br>
            <input type="text" name="nama_kuliner" id="nama_kuliner" required><br>
            <label for="deskripsi">Deskripsi</label><br>
            <textarea name="deskripsi" id="deskripsi" required></textarea><br>
            <label for="harga_kuliner">Harga Kuliner</label><br>
            <input type="text" name="harga_kuliner" id="harga_kuliner" required><br>
            <label for="gambar">Gambar</label><br>
            <input type="file" name="gambar" id="gambar"><br>
            <br>
            <input type="submit" name="submit" value="Tambah" class="btn-submit"><br>
        </form>
        <br>
        <a href="tabelkuliner.php" class="btn">Kembali</a><br>
    </section>

    <script src="main.js"></script>
</body>
</html>
