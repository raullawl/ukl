<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

// Include file koneksi untuk menghubungkan ke database
include '../koneksi.php';

// Dapatkan username dari session
$username = $_SESSION['username'];

// Query untuk mendapatkan data user berdasarkan username dari session
$query_user = "SELECT username, email FROM user WHERE username = '$username'";
$result_user = mysqli_query($mysqli, $query_user);
$data_user = mysqli_fetch_assoc($result_user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="style10.css"> <!-- Anda bisa menyesuaikan dengan stylesheet Anda -->
</head>
<body>
<header>
        <a href="#" class="logo"><img src="ASET/Sunrise_and_sunset_at_beach__vector-removebg-preview.png" alt=""></a>

        <ul class="navmenu">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">Kuliner</a></li>
            <li><a href="mai projek.php">Pariwisata</a></li>
            <li><a href="komenuser.php">Komentar</a></li>
            <li><a href="profil.php">profil</a></li>
            <li><a href="riwayat.php">Riwayat</a></li>

        </ul>

        <div class="nav-icon">
            <a href="../login.php" class="btn">Logout</a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>


    
    <section class="profil-container">
    <h1>Profil Pengguna</h1><br>
    <div class="profil-box">
        <div class="profil-info">
            <p>Username: <?php echo $data_user['username']; ?></p>
            <p>Email: <?php echo $data_user['email']; ?></p>
            <!-- Anda dapat menambahkan informasi pengguna lainnya di sini -->
        </div>
    </div>
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

</body>
</html>
