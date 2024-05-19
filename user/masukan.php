<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Masukan</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<header>

        <div class="nav-icon">
            <a href="https://www.instagram.com/ranxieetyy/" class="btn">Contact</a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>

    <h1>Form Masukan</h1>
    <form action="masukan.php" method="post">
        <!-- Nama Lengkap -->
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" required>
        <br><br>

        <label for="kuliner">Kuliner Dan Pariwisata</label>
        <select id="kuliner" name="kuliner">
            <option value="Telur Petis">Telur Petis</option>
            <option value="Sego Tempong">Sego Tempong</option>
            <option value="Pecel Rawon">Pecel Rawon</option>
            <option value="Rujak Soto">Rujak Soto</option>
            <option value="Petulo">Petulo</option>
            <option value="Telur Petis">Gunung Ijen</option>
            <option value="Sego Tempong">Pantai Pulau Merah</option>
            <option value="Pecel Rawon">Pulau Tabuhan</option>
            <option value="Rujak Soto">De Djawatan</option>
            <option value="Petulo">Teluk Hijau</option>
        </select>
        <br><br>

        
        <label for="pesan">Masukan</label>
        <textarea id="pesan" name="pesan" ></textarea>
        <br><br>

        <button name="submit" type="submit">Kirim</button>

        <?php
            if(isset($_POST['submit'])){
                $nama= $_POST['nama'];
                $kuliner= $_POST['kuliner'];
                $pesan= $_POST['pesan'];

                include_once("../koneksi.php");

                $result = mysqli_query($mysqli,
                "INSERT INTO masukan(nama,kuliner,pesan) VALUES ('$nama','$kuliner','$pesan')");

                header("location:about.php");
            }
            ?>

        <!-- Tombol Kirim -->
        
    </form>
</body>
</html>