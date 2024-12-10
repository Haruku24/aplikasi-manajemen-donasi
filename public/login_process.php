<?php
session_start();
require "../config/db.php";

$email = "";
$password = "";
$err = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == '' || $password == '') {
        $err .= "<li>Silakan masukkan email dan password</li>";
    }

    if (empty($err)) {
        // Query untuk mengambil data pengguna berdasarkan email
        $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $sql);

        if ($query) {  // Memastikan query berhasil dijalankan
            $user = mysqli_fetch_assoc($query);

            if ($user) {
                // Verifikasi password menggunakan password_verify
                if (password_verify($password, $user['password'])) {
                    // Menyimpan data user dan role ke session
                    $_SESSION['user'] = $user;
                    $_SESSION['role'] = $user['role'];

                    // Redirect berdasarkan role
                    if ($user['role'] == 'admin') {
                        header("Location: /aplikasi-manajemen-donasi/view/admin/dashboard.php");
                    } else if ($user['role'] == 'user') {
                        header("Location: /aplikasi-manajemen-donasi/view/user/dashboard.php");
                    }
                    exit;
                } else {
                    echo "Password salah!";
                }
            } else {
                echo "Email atau password salah!";
            }
        } else {
            echo "Kesalahan dalam eksekusi query.";
        }
    } else {
        echo "<ul>$err</ul>";
    }
}
?>
