<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

// Include file koneksi untuk menghubungkan ke database
include '../koneksi.php';

// Dapatkan username dari session
$username = $_SESSION['username'];

// Query untuk mendapatkan data user berdasarkan username
$query = "SELECT * FROM user WHERE username='$username'";
$result = mysqli_query($mysqli, $query);

// Periksa apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    // Ambil data dari hasil query
    $data = mysqli_fetch_assoc($result);
} else {
    // Tampilkan pesan jika data tidak ditemukan
    echo "Data user tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pariwisata dan Kuliner</title>
    <link rel="stylesheet" href="style11.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <a href="#" class="logo"><img src="ASET/Sunrise_and_sunset_at_beach__vector-removebg-preview.png" alt=""></a>

        <ul class="navmenu">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">Kuliner</a></li>
            <li><a href="mai projek.php">Pariwisata</a></li>
            <li><a href="komenuser.php">Komentar</a></li>
            <li><a href="profil.php">Profil</a></li>
        </ul>

        <div class="nav-icon">
            <a href="../login.php" class="btn">Logout</a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>

    <!--home-section-->
    <section class="home">
        <?php
        include '../koneksi.php';
        $query_mysql = mysqli_query($mysqli, "SELECT * FROM kuliner") or die(mysqli_error($mysqli));
        while($data = mysqli_fetch_array($query_mysql)) {
        ?>
        <div class="artikel">
            <h1><?php echo $data['nama_kuliner'] ?></h1>
            <p><?php echo $data['deskripsi'] ?></p>
            <p>Harga: Rp <?php echo number_format($data['harga_kuliner'], 0, ',', '.') ?></p>
            <img src="../admin/uploaded_img/<?php echo $data['gambar'] ?>" alt="Gambar" width="200">
            <a href="komentar.php?id=<?php echo $data['id_kuliner']; ?>" class="btn">Tambah Komentar</a>
            <a href="transaksi.php" class="btn">Beli</a>
        </div>
        <?php } ?>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-about">
                    <h3>About Us</h3>
                    <p>Discover the best culinary delights and travel destinations. Experience the finest local and international cuisines with us.</p>
                </div>
                <div class="footer-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">Kuliner</a></li>
                        <li><a href="mai projek.php">Pariwisata</a></li>
                        <li><a href="komenuser.php">Komentar</a></li>
                    </ul>
                </div>
                <div class="footer-social">
                    <h3>Follow Us</h3>
                    <div class="social-links">
                        <a href="https://www.instagram.com/explore_banyuwangi?igsh=OHp6amVzY21tNHk1"><img src="ASET/instagram.png.png" alt="Instagram"></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Pariwisata dan Kuliner. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="java.js"></script>
</body>
</html>
