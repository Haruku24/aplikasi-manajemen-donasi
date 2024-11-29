<?php
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $conn = new mysqli('localhost', 'root', '', 'aplikasi_manajemen_donasi');
    if ($conn->connect_error) {
        die('Could not connect to the database');
    }

    // Verifikasi kode dengan pengecekan waktu reset dalam 1 hari
    $verifyQuery = $conn->prepare("SELECT * FROM users WHERE code = ? AND updated_time >= NOW() - INTERVAL 1 DAY");
    $verifyQuery->bind_param("s", $code); // Pastikan kode di-bind dengan benar
    $verifyQuery->execute();
    $result = $verifyQuery->get_result();

    if ($result->num_rows == 0) {
        header("Location: /aplikasi-manajemen-donasi/view/pages/reset_password.php");
        exit();
    }

    if (isset($_POST['change'])) {
        $email = $_POST['email'];
        $new_password = $_POST['new_password'];

        // Hash password sebelum disimpan ke database
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Pastikan email dan kode valid
        $changeQuery = $conn->prepare("UPDATE users SET password = ? WHERE email = ? AND code = ? AND updated_time >= NOW() - INTERVAL 1 DAY");
        $changeQuery->bind_param("sss", $hashed_password, $email, $code);
        $changeQuery->execute();

        if ($changeQuery->affected_rows > 0) {
            header("Location: /aplikasi-manajemen-donasi/view/pages/success.php");
            exit();
        } else {
            echo "Gagal mengubah password. Pastikan email dan kode benar.";
        }
    }
} else {
    header("Location: /aplikasi-manajemen-donasi/view/pages/reset_password.php");
    exit();
}
?>
