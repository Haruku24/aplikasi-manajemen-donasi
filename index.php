<?php include '../aplikasi-manajemen-donasi/view/partials/navbar.php';?>

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
     <link href="../aplikasi-manajemen-donasi/assets/design/style.css" rel="stylesheet">
     <link href="../aplikasi-manajemen-donasi/assets/design/navbar.css" rel="stylesheet">
     <link href="../aplikasi-manajemen-donasi/assets/design/hero_section.css" rel="stylesheet">
     <link href="../aplikasi-manajemen-donasi/assets/design/campaig_pasien.css" rel="stylesheet">
     <link href="../aplikasi-manajemen-donasi/assets/design/icon_section.css" rel="stylesheet">
     <link href="../aplikasi-manajemen-donasi/assets/design/footer.css" rel="stylesheet">
</head>

<body>
    <!-- Hero Section -->
    <div>
        <?php include './view/layouts/tampilan/hero_section.php'; ?>
    </div>

    <!-- Icon Section -->
    <div>
        <?php include './view/layouts/tampilan/icon_section.php'; ?>
    </div>

    <!-- Donation Section 1 -->
    <div>
        <?php include './view/layouts/tampilan/campaign_pasien.php'; ?>
    </div>

    <!-- Donation Section 2 -->
    <div>
        <?php include './view/layouts/tampilan/campaign_pilihan.php'; ?>
    </div>

    <!-- About Us Section -->
    <!-- <section class="about-us">
        <div class="container">
            <h2>Tentang Kami</h2>
                <p>Kami adalah platform donasi yang membantu Anda untuk menyalurkan bantuan kepada mereka yang membutuhkan.</p>
            <a href="#" class="btn btn-primary">Pelajari Lebih Lanjut</a>
        </div>
    </section> -->

    <!-- WhatsApp Icon -->
    <a class="whatsapp-icon" href="#">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Footer -->
    <div>
        <?php include './view/layouts/tampilan/footer.php'; ?>
    </div>

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
