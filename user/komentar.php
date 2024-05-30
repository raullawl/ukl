<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Komentar</title>
    <link rel="stylesheet" href="komentar.css">
</head>
<body>
    <header>
        <a href="komenuser.php" class="logo">
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
            <?php
            include '../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM komentar") or die(mysqli_error($mysqli));
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <div class="comment">
                <h3><?php echo $data['username']; ?></h3>
                <p><?php echo $data['isi_komentar']; ?></p>
            </div>
            <?php } ?>
        </div>
    </section>
    <footer>
        <!-- Footer Content -->
    </footer>
</body>
</html>