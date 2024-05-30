<?php
include '../koneksi.php';

if(isset($_POST['update'])) {
    $id_comment = $_POST['id_comment'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $isi_komentar = $_POST['isi_komentar'];

    // Lakukan proses update data di database
    $query = "UPDATE komentar SET username='$username', email='$email', isi_komentar='$isi_komentar' WHERE id_comment=$id_comment";
    $result = mysqli_query($mysqli, $query);

    if($result) {
        echo "Data berhasil diperbarui.";
        header("Location: tabelcomment.php"); // Redirect kembali ke halaman data komentar
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($mysqli);
    }
}

// Mendapatkan data komentar yang akan diupdate
if(isset($_GET['id'])) {
    $id_comment = $_GET['id'];
    $query = "SELECT * FROM komentar WHERE id_comment=$id_comment";
    $result = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    echo "ID komentar tidak ditemukan.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Masukan</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="styleuptade.css">
</head>
<body>
<div class="container">
        <header>
            <h1 class="title">Uptade Komentar</h1>
        </header>
        <section class="form">
        <form method="POST" action="updatecomment.php">
        <input type="hidden" name="id_comment" value="<?php echo $data['id_comment']; ?>">

        <input type="text" id="username" name="username" placeholder="Username" value="<?php echo $data['username']; ?>"><br>

        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $data['email']; ?>"><br><br>

        <input type="text" id="isi_komentar" name="isi_komentar" placeholder="isi_komentar" value="<?php echo $data['isi_komentar']; ?>"><br>

        <input type="submit" name="update" value="Update" class="button">
    </form>
        </section>
    </div>
    
</body>
</html>