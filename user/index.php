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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pariwisata dan Kuliner</title>
    <link rel="stylesheet" href="style10.css">

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
            <li><a href="profil.php">profil</a></li>

        </ul>

        <div class="nav-icon">
            <a href="../login.php" class="btn">Logout</a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>

    <!--home-section-->
    <section class="home">
        <div class="home-text">
            <h4>Kuliner dan Pariwisata</h4>
            <h1>Kuliner<span> dan Pariwisata</span> dari<br>Banyuwangi</h1>

            <div class="main-btn">
                <a href="https://id.wikipedia.org/wiki/Kabupaten_Banyuwangi" class="btn1">Visit Now</a>
            </div>
        </div>

        <div class="home-img">
            <br>
            <br>
            <br>
            <br>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/gCaTo5OXD7o?si=uvlE4mvKti6kyaeC" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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

    <script src="java.js"></script>
    
</body>
</html>