<?php include '../partials/navbardashboard.php';?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Style css -->
     <link href="../../assets/desain/style.css" rel="stylesheet">
     <link href="../../assets/desain/navbar.css" rel="stylesheet">
     <link href="../../assets/desain/hero_section.css" rel="stylesheet">
     <link href="../../assets/desain/campaig_pasien.css" rel="stylesheet">
     <link href="../../assets/desain/icon_section.css" rel="stylesheet">
</head>

<body>
    <!-- Hero Section -->
    <div class="hero-section mt-3">
        <div class="container">
            <h1>Bersama Kita Bisa Membantu</h1>
            <p>Ayo berdonasi untuk mereka yang membutuhkan uluran tangan Anda.</p>
            <button class="btn btn-danger">Donasi Sekarang</button>
        </div>
    </div>

<!-- Icon Section -->
<div class="container icon-section mt-4">
    <div class="row justify-content-center">
        <div class="col-6 col-md-2 icon-box text-center">
            <div class="icon-wrapper">
                <img src="path/to/donation-icon.png" alt="Donasi">
            </div>
            <p>Donasi</p>
        </div>
        <div class="col-6 col-md-2 icon-box text-center">
            <div class="icon-wrapper">
                <img src="path/to/zakat-icon.png" alt="Zakat">
            </div>
            <p>Zakat</p>
        </div>
        <div class="col-6 col-md-2 icon-box text-center">
            <div class="icon-wrapper">
                <img src="path/to/sedekah-icon.png" alt="Sedekah">
            </div>
            <p>Sedekah</p>
        </div>
        <div class="col-6 col-md-2 icon-box text-center">
            <div class="icon-wrapper">
                <img src="path/to/infaq-icon.png" alt="Infaq">
            </div>
            <p>Infaq</p>
        </div>
        <div class="col-6 col-md-2 icon-box text-center">
            <div class="icon-wrapper">
                <img src="path/to/health-icon.png" alt="Kesehatan">
            </div>
            <p>Kesehatan</p>
        </div>
    </div>
</div>




<!-- Donation Section 1 -->


    <!-- About Us Section -->
    <section class="about-us">
        <div class="container">
            <h2>Tentang Kami</h2>
                <p>Kami adalah platform donasi yang membantu Anda untuk menyalurkan bantuan kepada mereka yang membutuhkan.</p>
            <a href="#" class="btn btn-primary">Pelajari Lebih Lanjut</a>
        </div>
    </section>

    <!-- WhatsApp Icon -->
    <a class="whatsapp-icon" href="#">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white text-center">
        <p>&copy; 2024 WeCare.id. Semua Hak Dilindungi.</p>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- java scrip leangue -->
    <script>
        ('DOMContentLoaded', function () {
    const params = new URLSearchParams(window.location.search);
    const lang = params.get('lang') || localStorage.getItem('language') || 'id';
    localStorage.setItem('language', lang);

    // Ganti teks sesuai bahasa
    if (lang === 'id') {
        document.querySelector('.btn-outline-secondary').innerText = 'Masuk';
        document.querySelector('.btn-danger').innerText = 'Daftar';
    } else if (lang === 'en') {
        document.querySelector('.btn-outline-secondary').innerText = 'Login';
        document.querySelector('.btn-danger').innerText = 'Register';
    }
});
    </script>
</body>
</html>
