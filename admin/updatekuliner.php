<?php
// Include file koneksi, untuk menghubungkan ke database
include "../koneksi.php";

// Fungsi untuk mencegah inputan karakter yang tidak sesuai
function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Mendapatkan id_kuliner dari parameter URL (jika disediakan)
if (isset($_GET['id_kuliner'])) {
    $id_kuliner = $_GET['id_kuliner'];

    // Query untuk mendapatkan data kuliner berdasarkan id_kuliner
    $query_kuliner = "SELECT * FROM kuliner WHERE id_kuliner = $id_kuliner";
    
    // Eksekusi query
    $result = mysqli_query($mysqli, $query_kuliner);

    // Periksa apakah data ditemukan
    if (mysqli_num_rows($result) > 0) {
        // Ambil data dari hasil query
        $data = mysqli_fetch_assoc($result);
    } else {
        // Tampilkan pesan jika data tidak ditemukan
        echo "Data kuliner tidak ditemukan.";
        exit;
    }
} else {
    echo "ID kuliner tidak ditemukan.";
    exit;
}

// Cek apakah ada kiriman form dari method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_kuliner = input($_POST["id_kuliner"]); // Ambil nilai id_kuliner dari form
    $nama_kuliner = input($_POST["nama_kuliner"]);
    $deskripsi = input($_POST["deskripsi"]);
    $harga_kuliner = input($_POST["harga_kuliner"]);

    $Gambar = $_FILES['gambar']['name'];
    $Gambar_tmp_nama = $_FILES['gambar']['tmp_name'];
    $Gambar_folder = 'uploaded_img/' . $Gambar;

    // Validasi file gambar
    $allowed_extensions = array('png', 'jpeg', 'jpg');
    $file_extension = strtolower(pathinfo($Gambar, PATHINFO_EXTENSION));
    if (!in_array($file_extension, $allowed_extensions)) {
        echo "<div class='alert alert-danger'>Hanya file gambar PNG, JPEG, atau JPG yang diperbolehkan.</div>";
    } else {
        // Pindahkan file gambar yang diunggah ke folder tujuan
        move_uploaded_file($Gambar_tmp_nama, $Gambar_folder);

        //Query update data pada tabel kuliner
        $sql = "UPDATE kuliner SET
                nama_kuliner='$nama_kuliner',
                gambar='$Gambar',
                deskripsi='$deskripsi',
                harga_kuliner='$harga_kuliner'
                WHERE id_kuliner='$id_kuliner'";

        //Mengeksekusi atau menjalankan query di atas
        $hasil = mysqli_query($mysqli, $sql);
        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query di atas
        if ($hasil) {
            header("Location:tabelkuliner.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Kuliner</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="styleuptade.css">
</head>
<body>
<div class="container">
    <header>
        <h1 class="title">UPDATE DATA KULINER</h1>
    </header>
    <section class="form">
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="id_kuliner" value="<?php echo $data['id_kuliner']; ?>">

            <label for="nama_kuliner">Nama Kuliner:</label><br>
            <input type="text" id="nama_kuliner" name="nama_kuliner" value="<?php echo $data['nama_kuliner']; ?>" required><br>

            <label for="deskripsi">Deskripsi:</label><br>
            <input type="text" id="deskripsi" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" required><br>

            <label for="harga_kuliner">Harga Kuliner:</label><br>
            <input type="text" id="harga_kuliner" name="harga_kuliner" value="<?php echo $data['harga_kuliner']; ?>" required><br>

            <label for="gambar">Gambar:</label><br>
            <input type="file" id="gambar" name="gambar" accept="image/png, image/jpeg, image/jpg"><br><br>

            <input type="submit" name="update" value="Update" class="button">
        </form>
    </section>
</div>
</body>
</html>
