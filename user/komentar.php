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

// Periksa apakah ada kiriman form dari method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_kuliner = $_POST['id_kuliner'];
    $id_pariwisata = $_POST['id_pariwisata'];
    $username = $_POST['username']; // Tambahan
    $email = $data_user['email'];
    $isi_komentar = $_POST['isi_komentar'];

    // Query untuk menyimpan komentar ke database
    $query = "INSERT INTO komentar (id_kuliner, id_pariwisata, username, email, isi_komentar) VALUES ('$id_kuliner', '$id_pariwisata', '$username', '$email', '$isi_komentar')";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        header("Location: komenuser.php"); // Redirect kembali ke halaman data user
        exit();
    } else {
        echo "Komentar gagal ditambahkan.";
    }
}

// Dapatkan id_kategori_sda dari parameter URL (jika disediakan)
$id_kuliner = isset($_GET['id']) ? $_GET['id'] : 0;

// Query untuk mendapatkan data kategori_sda berdasarkan id_kategori_sda
$query_kuliner = "SELECT * FROM kuliner WHERE id_kuliner = $id_kuliner";
$result_kuliner = mysqli_query($mysqli, $query_kuliner);

// Ambil data kategori_sda
$data_kuliner = mysqli_fetch_assoc($result_kuliner);

// Dapatkan id_kategori_sda dari parameter URL (jika disediakan)
$id_pariwisata = isset($_GET['id']) ? $_GET['id'] : 0;

// Query untuk mendapatkan data kategori_sda berdasarkan id_kategori_sda
$query_pariwisata = "SELECT * FROM pariwisata WHERE id_pariwisata = $id_pariwisata";
$result_pariwisata = mysqli_query($mysqli, $query_pariwisata);

// Ambil data kategori_sda
$data_pariwisata = mysqli_fetch_assoc($result_pariwisata);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Komentar</title>
    <link rel="stylesheet" href="komen.css">
</head>
<body>
    <section class="comment-form">
        <h2>Tambah Komentar</h2>
        <form action="komentar.php" method="post">
            <input type="hidden" name="username" value="<?php echo htmlspecialchars($data_user['username']); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($data_user['email']); ?>">
            <!-- Input tersembunyi untuk id_kuliner dan id_pariwisata -->
            <input type="hidden" id="id_kuliner" name="id_kuliner" value="<?php echo htmlspecialchars($data_kuliner['id_kuliner']); ?>" required>
            <input type="hidden" id="id_pariwisata" name="id_pariwisata" value="<?php echo htmlspecialchars($data_pariwisata['id_pariwisata']); ?>" required>
            <label for="isi_komentar">Komentar:</label>
            <textarea id="isi_komentar" name="isi_komentar" placeholder="Type Your Comment" required></textarea>
            <button type="submit" name="submit">Submit Comment</button>
        </form>
    </section>
</body>
</html>
