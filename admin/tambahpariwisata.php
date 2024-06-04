<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pariwisata</title>
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
        <h1 class="heading">Tambah Pariwisata</h1>
        <br>
        <?php
        include '../koneksi.php';

        if(isset($_POST['submit'])){
            $nama_pariwisata = $_POST['nama_pariwisata'];
            $deskripsi = $_POST['deskripsi'];
            $gambar = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];
            $harga_pariwisata = $_POST['harga_pariwisata'];

            if($gambar){
                move_uploaded_file($tmp_name, "uploaded_img/$gambar");
                $query = "INSERT INTO pariwisata (nama_pariwisata, deskripsi, gambar, harga_pariwisata) VALUES ('$nama_pariwisata', '$deskripsi', '$gambar', '$harga_pariwisata')";
            } else {
                $query = "INSERT INTO pariwisata (nama_pariwisata, deskripsi, harga_pariwisata) VALUES ('$nama_pariwisata', '$deskripsi', '$harga_pariwisata')";
            }

            mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
            header("Location: tabelpariwisata.php");
        }
        ?>
        <form action="tambahpariwisata.php" method="post" enctype="multipart/form-data">
            <label for="nama_pariwisata">Nama Pariwisata</label><br>
            <input type="text" name="nama_pariwisata" id="nama_pariwisata" required><br>
            <label for="deskripsi">Deskripsi</label><br>
            <textarea name="deskripsi" id="deskripsi" required></textarea><br>
            <label for="harga_pariwisata">Harga Pariwisata</label><br>
            <input type="text" name="harga_pariwisata" id="harga_pariwisata" required><br>
            <label for="gambar">Gambar</label><br>
            <input type="file" name="gambar" id="gambar"><br>
            <br>
            <input type="submit" name="submit" value="Tambah" class="btn-submit"><br>
        </form>
        <br>
        <a href="tabelpariwisata.php" class="btn">Kembali</a><br>
    </section>

    <script src="main.js"></script>
</body>
</html>
