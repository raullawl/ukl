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
        <h1 class="heading">Update Pariwisata</h1>
        <br>
        <?php
        include '../koneksi.php';

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = mysqli_query($mysqli, "SELECT * FROM pariwisata WHERE id_pariwisata='$id'") or die(mysqli_error($mysqli));
            $data = mysqli_fetch_array($query);
        }

        if(isset($_POST['update'])){
            $id = $_POST['id'];
            $nama_pariwisata = $_POST['nama_pariwisata'];
            $deskripsi = $_POST['deskripsi'];
            $harga_pariwisata = $_POST['harga_pariwisata']; // Tambahkan pengambilan nilai harga
            $gambar = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];

            if($gambar){
                move_uploaded_file($tmp_name, "uploaded_img/$gambar");
                $query = "UPDATE pariwisata SET nama_pariwisata='$nama_pariwisata', deskripsi='$deskripsi', gambar='$gambar', harga_pariwisata='$harga_pariwisata' WHERE id_pariwisata='$id'";
            } else {
                $query = "UPDATE pariwisata SET nama_pariwisata='$nama_pariwisata', deskripsi='$deskripsi', harga_pariwisata='$harga_pariwisata' WHERE id_pariwisata='$id'";
            }

            mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
            header("Location: tabelpariwisata.php");
        }
        ?>
        <form action="updatepariwisata.php?id=<?php echo $data['id_pariwisata']; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $data['id_pariwisata']; ?>"><br>
            <label for="nama_pariwisata">Nama Pariwisata</label><br>
            <input type="text" name="nama_pariwisata" id="nama_pariwisata" value="<?php echo $data['nama_pariwisata']; ?>" required><br>
            <label for="deskripsi">Deskripsi</label><br>
            <textarea name="deskripsi" id="deskripsi" required><?php echo $data['deskripsi']; ?></textarea><br>
            <label for="harga_pariwisata">Harga Pariwisata</label><br> <!-- Perbaikan label -->
            <input type="text" name="harga_pariwisata" id="harga_pariwisata" value="<?php echo $data['harga_pariwisata']; ?>" required><br> <!-- Tambahkan value di sini -->
            <label for="gambar">Gambar</label><br>
            <input type="file" name="gambar" id="gambar"><br>
            <br>
            <img src="uploaded_img/<?php echo $data['gambar']; ?>" alt="Gambar Pariwisata" width="100"><br>
            <br>
            <input type="submit" name="update" value="Update" class="btn-update"><br>
        </form>
        <br>
        <a href="tabelpariwisata.php" class="btn">Kembali</a><br>
    </section>

    <script src="main.js"></script>
</body>
</html>
