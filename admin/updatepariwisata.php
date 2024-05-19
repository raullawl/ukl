<?php
include '../koneksi.php';

if(isset($_POST['update'])) {
    $id_pariwisata = $_POST['id_pariwisata'];
    $nama_pariwisata = $_POST['nama_pariwisata'];
    $alamat_pariwisata = $_POST['alamat_pariwisata'];
    $harga_tiket_pariwisata = $_POST['harga_tiket_pariwisata'];

    // Lakukan proses update data di database
    $query = "UPDATE pariwisata SET nama_pariwisata='$nama_pariwisata', alamat_pariwisata='$alamat_pariwisata', harga_tiket_pariwisata='$harga_tiket_pariwisata' WHERE id_pariwisata=$id_pariwisata";
    $result = mysqli_query($mysqli, $query);

    if($result) {
        echo "Data berhasil diperbarui.";
        header("Location:tabelpariwisata.php"); // Redirect kembali ke halaman data kuliner
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($mysqli);
    }
}

// Mendapatkan data kuliner yang akan diupdate
if(isset($_GET['id'])) {
    $id_pariwisata = $_GET['id'];
    $query = "SELECT * FROM pariwisata WHERE id_pariwisata=$id_pariwisata";
    $result = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    echo "ID pariwisata tidak ditemukan.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pariwisata</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="styleuptade.css">
</head>
<body>
<div class="container">
        <header>
            <h1 class="title">UPTADE DATA Pariwisata</h1>
        </header>
        <section class="form">
        <form method="POST" action="updatepariwisata.php">
        <input type="hidden" name="id_pariwisata" value="<?php echo $data['id_pariwisata']; ?>">

        <label for="nama_pariwisata">nama_pariwisata:</label><br>
        <input type="text" id="nama_pariwisata" name="nama_pariwisata" value="<?php echo $data['nama_pariwisata']; ?>"><br>

        <label for="alamat_pariwisata">alamat_pariwisata:</label><br>
        <input type="text" id="alamat_pariwisata" name="alamat_pariwisata" value="<?php echo $data['alamat_pariwisata']; ?>"><br>

        <label for="harga_tiket_pariwisata">harga_tiket_pariwisata:</label><br>
        <input type="text" id="harga_tiket_pariwisata" name="harga_tiket_pariwisata" value="<?php echo $data['harga_tiket_pariwisata']; ?>"><br><br>
        <input type="submit" name="update" value="Update" class="button">
    </form>
        </section>
    </div>
    
</body>
</html>