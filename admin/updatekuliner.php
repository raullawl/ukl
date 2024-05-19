<?php
include '../koneksi.php';

if(isset($_POST['update'])) {
    $id_kuliner = $_POST['id_kuliner'];
    $nama_kuliner = $_POST['nama_kuliner'];
    $asal_kuliner = $_POST['asal_kuliner'];
    $harga_kuliner = $_POST['harga_kuliner'];

    // Lakukan proses update data di database
    $query = "UPDATE kuliner SET nama_kuliner='$nama_kuliner', asal_kuliner='$asal_kuliner', harga_kuliner='$harga_kuliner' WHERE id_kuliner=$id_kuliner";
    $result = mysqli_query($mysqli, $query);

    if($result) {
        echo "Data berhasil diperbarui.";
        header("Location: tabelkuliner.php"); // Redirect kembali ke halaman data kuliner
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($mysqli);
    }
}

// Mendapatkan data kuliner yang akan diupdate
if(isset($_GET['id'])) {
    $id_kuliner = $_GET['id'];
    $query = "SELECT * FROM kuliner WHERE id_kuliner=$id_kuliner";
    $result = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    echo "ID kuliner tidak ditemukan.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update kuliner</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="styleuptade.css">
</head>
<body>
<div class="container">
        <header>
            <h1 class="title">UPTADE DATA kuliner</h1>
        </header>
        <section class="form">
        <form method="POST" action="">
        <input type="hidden" name="id_kuliner" value="<?php echo $data['id_kuliner']; ?>">

        <label for="nama_kuliner">nama_kuliner:</label><br>
        <input type="text" id="nama_kuliner" name="nama_kuliner" value="<?php echo $data['nama_kuliner']; ?>"><br>

        <label for="asal_kuliner">asal_kuliner:</label><br>
        <input type="text" id="asal_kuliner" name="asal_kuliner" value="<?php echo $data['asal_kuliner']; ?>"><br>

        <label for="harga_kuliner">harga_kuliner:</label><br>
        <input type="text" id="harga_kuliner" name="harga_kuliner" value="<?php echo $data['harga_kuliner']; ?>"><br><br>
        <input type="submit" name="update" value="Update" class="button">
    </form>
        </section>
    </div>
    
</body>
</html>