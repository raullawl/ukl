<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah Kuliner</title>
    <link rel="stylesheet" href="../styleregister.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Tambah Kuliner</h1><br>
        <form class="form" action="tambahkuliner.php" method="post">
            <input type="text" name="nama_kuliner" placeholder="nama_kuliner"> 
            <input type="text" name="asal_kuliner" placeholder="asal_kuliner">
            <input type="text" name="harga_kuliner" placeholder="harga_kuliner">
            <button class="button" name="sumbit" type="submit">Tambah</button>
            <?php
            if(isset($_POST['sumbit'])){
                $nama_kuliner= $_POST['nama_kuliner'];
                $asal_kuliner= $_POST['asal_kuliner'];
                $harga_kuliner= $_POST['harga_kuliner'];
                $level='user';

                include_once("../koneksi.php");

                $result = mysqli_query($mysqli,
                "INSERT INTO kuliner(nama_kuliner,asal_kuliner,harga_kuliner) VALUES ('$nama_kuliner','$asal_kuliner','$harga_kuliner')");

                header("location: tabelkuliner.php");
            }
            ?>
        </form>
    
    </div>
</body>
</html>