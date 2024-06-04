<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Kuliner</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="styleadmin2.css">
</head>
<body>
    <div class="navbar">
        <a href="user.php" class="logo">MyWebsite</a>
        <a href="tabelkuliner.php">Tabel Kuliner</a>
        <a href="tabelpariwisata.php">Tabel Pariwisata</a>
        <a href="tabelcomment.php">Tabel Komen</a>
    </div>

    <section class="user">
        <h1 class="heading">Update Kuliner</h1>
        <br>
        <?php
        include '../koneksi.php';

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = mysqli_query($mysqli, "SELECT * FROM kuliner WHERE id_kuliner='$id'") or die(mysqli_error($mysqli));
            $data = mysqli_fetch_array($query);
        }

        if(isset($_POST['update'])){
            $id = $_POST['id'];
            $nama_kuliner = $_POST['nama_kuliner'];
            $deskripsi = $_POST['deskripsi'];
            $harga_kuliner = $_POST['harga_kuliner']; // Perbaiki di sini
            $gambar = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];

            if($gambar){
                move_uploaded_file($tmp_name, "uploaded_img/$gambar");
                $query = "UPDATE kuliner SET nama_kuliner='$nama_kuliner', deskripsi='$deskripsi', gambar='$gambar', harga_kuliner='$harga_kuliner' WHERE id_kuliner='$id'";
            } else {
                $query = "UPDATE kuliner SET nama_kuliner='$nama_kuliner', deskripsi='$deskripsi', harga_kuliner='$harga_kuliner' WHERE id_kuliner='$id'";
            }

            mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
            header("Location: tabelkuliner.php");
        }
        ?>
        <form action="updatekuliner.php?id=<?php echo $data['id_kuliner']; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $data['id_kuliner']; ?>"><br>
            <label for="nama_kuliner">Nama Kuliner</label><br>
            <input type="text" name="nama_kuliner" id="nama_kuliner" value="<?php echo $data['nama_kuliner']; ?>" required><br>
            <label for="deskripsi">Deskripsi</label><br>
            <textarea name="deskripsi" id="deskripsi" required><?php echo $data['deskripsi']; ?></textarea><br>
            <label for="harga_kuliner">Harga Kuliner</label><br>
            <input type="text" name="harga_kuliner" id="harga_kuliner" value="<?php echo $data['harga_kuliner']; ?>" required><br> <!-- Tambahkan value di sini -->
            <label for="gambar">Gambar</label><br>
            <input type="file" name="gambar" id="gambar"><br>
            <br>
            <img src="uploaded_img/<?php echo $data['gambar']; ?>" alt="Gambar Kuliner" width="100"><br>
            <br>
            <input type="submit" name="update" value="Update" class="btn-update"><br>
        </form>
        <br>
        <a href="tabelkuliner.php" class="btn">Kembali</a><br>
    </section>

    <script src="main.js"></script>
</body>
</html>
