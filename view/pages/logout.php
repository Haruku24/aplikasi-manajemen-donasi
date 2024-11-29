<?php
session_start();

// Hapus semua sesi
session_unset();
session_destroy();

// Arahkan pengguna kembali ke halaman utama (index.php)
header("Location: ../../index.php");
exit();
?>
