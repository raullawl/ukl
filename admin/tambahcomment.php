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
        <h1 class="title">Tambah Komentar</h1><br>
        <form class="form" action="tambahcomment.php" method="post">
            <input type="text" name="username" placeholder="username"> 
            <input type="text" name="email" placeholder="email">
            <input type="text" name="isi_komentar" placeholder="isi_komentar">
            <button class="button" name="sumbit" type="submit">Tambah</button>
            <?php
            if(isset($_POST['sumbit'])){
                $username= $_POST['username'];
                $email= $_POST['email'];
                $isi_komentar= $_POST['isi_komentar'];

                include_once("../koneksi.php");

                $result = mysqli_query($mysqli,
                "INSERT INTO komentar (username,email,isi_komentar) VALUES ('$username','$email','$isi_komentar')");

                header("location:tabelcomment.php");
            }
            ?>
        </form>
    
    </div>
</body>
</html>