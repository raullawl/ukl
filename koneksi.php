<?php
$databaseHost = "localhost";
$databaseName = "pariwisata";
$databaseUsername = "root";
$databasePassword = "";

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if($mysqli){
    //echo "koneksi db berhasil.<br/>";
}else{
    echo "koneksi gagal.<br/>";
}
?>