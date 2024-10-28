<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "aplikasi_manajemen_donasi";

// Membuat koneksi
$conn = mysqli_connect($host, $user, $password, $database);

// Mengecek apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
