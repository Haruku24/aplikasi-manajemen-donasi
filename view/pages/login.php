<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://i.pinimg.com/originals/d6/ea/d8/d6ead845a268039ded198afcccfb8547.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            overflow: hidden;
        }
        .left-container {
            width: 40%;
            padding: 40px;
            color: #ffffff;
            position: absolute;
            bottom: 40px;
            left: 40px;
            animation: slideInLeft 1s ease-out;
        }
        .left-container h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .left-container p {
            font-size: 1rem;
            color: #cccccc;
            margin-bottom: 20px;
        }
        .social-icons {
            display: flex;
            gap: 15px;
            animation: fadeIn 1.5s ease-in-out;
        }
        .social-icons a {
            color: #ffffff;
            font-size: 1.2rem;
            text-decoration: none;
            opacity: 0;
            animation: fadeIn 1s ease forwards;
        }
        .social-icons a:nth-child(1) { animation-delay: 0.5s; }
        .social-icons a:nth-child(2) { animation-delay: 0.7s; }
        .social-icons a:nth-child(3) { animation-delay: 0.9s; }
        .social-icons a:nth-child(4) { animation-delay: 1.1s; }
        .login-container {
            width: 40%;
            padding: 40px;
            background-color: rgba(0, 0, 0, 0.5);
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            opacity: 0; /* Awal opacity 0 untuk animasi */
            transition: opacity 0.5s ease; /* Transisi untuk opacity */
        }
        h2 {
            color: #ffffff;
            margin-bottom: 30px;
            font-size: 2rem;
            animation: fadeInDown 1s ease;
        }
        .form-group label {
            color: #cccccc;
            font-size: 0.9rem;
        }
        .form-control {
            background-color: transparent !important;
            border: none;
            border-bottom: 1px solid #555;
            color: #ffffff;
            border-radius: 0;
            outline: none;
        }
        .form-control::placeholder {
            color: #aaaaaa;
        }
        .form-control:focus {
            border-color: #ff0050;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #ff0050;
            border: none;
            width: 100%; /* Default lebar tombol 100% */
            font-weight: bold;
            padding: 10px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #ff3366;
            transform: scale(1.05);
        }
        .text-center a {
            color: #00D4FF;
        }
        .text-center a:hover {
            text-decoration: underline;
        }
        .terms {
            font-size: 0.8rem;
            color: #aaaaaa;
        }
        .password-container {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 60%;
            transform: translateY(-50%);
            color: #aaaaaa;
            cursor: pointer;
        }

        /* Responsif untuk layar dengan lebar kurang dari 768px (mobile) */
        @media (max-width: 768px) {
            body {
                justify-content: center;
            }
            .left-container {
                display: none; /* Sembunyikan bagian kiri pada mobile */
            }
            .login-container {
                width: 100%; /* Perlebar form login untuk menutupi seluruh layar */
                height: 100vh; /* Penuhi seluruh tinggi layar */
                padding: 20px;
                background-color: rgba(0, 0, 0, 0.7); /* Tambah kontras */
            }
            h2 {
                font-size: 1.8rem;
            }
            .btn-primary {
                width: auto; /* Ubah lebar tombol di mobile menjadi auto */
            }
            .form-group {
                display: flex;
                flex-direction: column; /* Atur ke kolom untuk mobile */
            }
            .login-btn-container {
                display: flex; /* Menjadikan container fleksibel */
                justify-content: flex-end; /* Pindahkan tombol ke kanan */
            }
        }

        /* Keyframes for Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }
    </style>
</head>
<body>
    <div class="left-container">
        <h1>Already have an account?</h1>
        <p>Log in to access all the features of our service.<br>Manage your business in one place.</p>
        <div class="social-icons">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-google"></i></a>
        </div>
    </div>

    <div class="login-container">
    <h2>Login</h2>
        <form action="../../public/login_process.php" method="POST">
            <div class="form-group mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="form-group mb-4 password-container">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                <i class="bi bi-eye toggle-password" onclick="togglePassword()"></i>
            </div>
            <div class="login-btn-container">
                <button type="submit" name="login" class="btn btn-primary">Log in</button>
            </div>
        </form>
        <p class="text-center mt-3">Don't have an account? <a href="register.php">Sign up</a></p>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icon CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">

    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const toggleIcon = document.querySelector(".toggle-password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.replace("bi-eye", "bi-eye-slash");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.replace("bi-eye-slash", "bi-eye");
            }
        }

        // Fungsi untuk animasi saat halaman dimuat
        window.onload = function() {
            const loginContainer = document.querySelector('.login-container');
            loginContainer.style.opacity = '1'; // Ubah opacity ke 1 untuk menampilkan elemen
        };
    </script>
</body>
</html>
