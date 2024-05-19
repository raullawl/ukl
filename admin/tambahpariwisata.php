<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah Pariwisata</title>
    <link rel="stylesheet" href="../styleregister.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Tambah Pariwisata</h1><br>
        <form class="form" action="tambahpariwisata.php" method="post">
            <input type="text" name="nama_pariwisata" placeholder="nama_pariwisata"> 
            <input type="text" name="alamat_pariwisata" placeholder="alamat_pariwisata">
            <input type="text" name="harga_tiket_pariwisata" placeholder="harga_tiket_pariwisata">
            <button class="button" name="sumbit" type="submit">Tambah</button>
            <?php
            if(isset($_POST['sumbit'])){
                $nama_pariwisata= $_POST['nama_pariwisata'];
                $alamat_pariwisata= $_POST['alamat_pariwisata'];
                $harga_tiket_pariwisata= $_POST['harga_tiket_pariwisata'];

                include_once("../koneksi.php");

                $result = mysqli_query($mysqli,
                "INSERT INTO pariwisata (nama_pariwisata,alamat_pariwisata,harga_tiket_pariwisata) VALUES ('$nama_pariwisata','$alamat_pariwisata','$harga_tiket_pariwisata')");

                header("location:tabelpariwisata.php");
            }
            ?>
        </form>
    
    </div>
</body>
</html>