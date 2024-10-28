<?php
// Panggil file koneksi database
include "../config/db.php";

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $role = 'user'; // Default role sebagai 'user' untuk donatur
    $errors = [];

    // Validasi data
    if (empty($name) || empty($email) || empty($password)) {
        $errors[] = "Semua field wajib diisi.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    // Cek apakah email sudah ada di database
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        $errors[] = "Email sudah terdaftar, silakan gunakan email lain.";
    }

    // Jika tidak ada error, simpan data user baru
    if (empty($errors)) {
        // Hash password sebelum disimpan
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk menyimpan data pengguna
        $query = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);

        if ($stmt->execute()) {
            // Redirect ke halaman login dengan pesan sukses
            header("Location: /aplikasi-manajemen-donasi/view/pages/login.php?message=Registrasi Berhasil, Silakan Login");
            exit();
        } else {
            echo "Terjadi kesalahan saat registrasi. Silakan coba lagi.";
        }
    } else {
        // Tampilkan pesan error
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
    }
}
?>
