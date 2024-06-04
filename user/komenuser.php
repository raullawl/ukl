<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

// Include file koneksi untuk menghubungkan ke database
include '../koneksi.php';

// Query untuk mengambil data komentar bersama dengan nama kuliner dan pariwisata
$query_mysql = mysqli_query($mysqli, "
    SELECT komentar.username, komentar.isi_komentar, 
           kuliner.nama_kuliner, pariwisata.nama_pariwisata
    FROM komentar
    LEFT JOIN kuliner ON komentar.id_kuliner = kuliner.id_kuliner
    LEFT JOIN pariwisata ON komentar.id_pariwisata = pariwisata.id_pariwisata
") or die(mysqli_error($mysqli));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Komentar</title>
    <link rel="stylesheet" href="komentar2.css">
</head>
<body>
    <header>
        <a href="komentar.php" class="logo">
            <button>Berikan Komentar</button>
        </a>
        <i class='bx bx-menu' id="menu-icon"></i>
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
        </ul>
    </header>
    <section class="comments">
        <h1 class="heading">Komentar Pengguna</h1>
        <div class="comment-list">
            <?php while($data = mysqli_fetch_array($query_mysql)) { ?>
            <div class="comment">
                <h3><?php echo htmlspecialchars($data['username']); ?></h3>
                <p><?php echo htmlspecialchars($data['isi_komentar']); ?></p>
                <?php if (!empty($data['nama_kuliner'])): ?>
                    <p><strong>Kuliner:</strong> <?php echo htmlspecialchars($data['nama_kuliner']); ?></p>
                <?php endif; ?>
                <?php if (!empty($data['nama_pariwisata'])): ?>
                    <p><strong>Pariwisata:</strong> <?php echo htmlspecialchars($data['nama_pariwisata']); ?></p>
                <?php endif; ?>
            </div>
            <?php } ?>
        </div>
    </section>
    <footer>
        <!-- Footer Content -->
    </footer>
</body>
</html>
