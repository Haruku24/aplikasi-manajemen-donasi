<?php
// Sertakan koneksi database
require_once '../../config/db.php';

// Query untuk kategori darurat
$query_darurat = "SELECT * FROM manage_donations WHERE status_donation = 'darurat' ORDER BY created_at DESC LIMIT 6";
$result_darurat = $conn->query($query_darurat);

// Query untuk kategori pilihan
$query_pilihan = "SELECT * FROM manage_donations WHERE status_donation = 'pilihan' ORDER BY created_at DESC LIMIT 6";
$result_pilihan = $conn->query($query_pilihan);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKRT! Donations</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="../../assets/design/style.css" rel="stylesheet">
    <link href="../../assets/partials_css/navbar.css" rel="stylesheet">
    <link href="../../assets/layouts_css/tampilan_css/hero_section.css" rel="stylesheet">
    <link href="../../assets/layouts_css/tampilan_css/icon_section.css" rel="stylesheet">
    <link href="../../assets/layouts_css/tampilan_css/footer.css" rel="stylesheet">
    <link href="../../assets/design/navbar.css" rel="stylesheet">
    <link href="../../assets/design/hero_section.css" rel="stylesheet">
    <link href="../../assets/design/icon_section.css" rel="stylesheet">
    <link href="../../assets/design/campaig_pasien.css" rel="stylesheet">
    <link href="../../assets/design/footer.css" rel="stylesheet">
</head>
<style>
    .card-img-top {
    width: 100%; /* Memastikan gambar memenuhi lebar kartu */
    height: 200px; /* Atur tinggi gambar */
    object-fit: cover; /* Memotong gambar secara proporsional */
    border-radius: 4px; /* Opsional: Tambahkan efek melengkung */
}

</style>

<body>
    <!-- Sertakan Navbar -->
    <?php include '../partials/navbardashboard.php'; ?>

    <!-- Hero Section -->
    <div>
        <?php include '../layouts/tampilan/hero_section.php'; ?>
    </div>

    <!-- Icon Section -->
    <div>
        <?php include '../layouts/tampilan/icon_section.php'; ?>
    </div>

    <!-- Donation Section 1: Campaign Pasien Mendesak -->
    <div class="container mt-4">
        <div class="card p-3">
            <h3>Campaign Darurat</h3>
            <div class="row">
            <?php while ($row = $result_darurat->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <!-- Tambahkan tautan di seluruh card -->
                    <a href="./detil_donation.php?id=<?php echo $row['id']; ?>" class="text-decoration-none text-dark">
                        <div class="card">
                            <img alt="Campaign Image" class="card-img-top" src="../../uploads/<?php echo htmlspecialchars($row['image']); ?>" />
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['description']); ?></h5>
                                <p class="card-text"><i class="fas fa-user"></i> <?php echo htmlspecialchars($row['donator_name'] ?? 'Tidak diketahui'); ?></p>
                                <p class="card-text">Dana terkumpul:</p>
                                <div class="progress mb-2">
                                    <?php 
                                        $target = max($row['target_amount'] ?? 1, 1);
                                        $collected = $row['collected_amount'] ?? 0;
                                        $percentage = ($collected / $target) * 100;
                                    ?>
                                    <div class="progress-bar" role="progressbar" 
                                        style="width: <?php echo number_format($percentage, 2); ?>%;" 
                                        aria-valuenow="<?php echo $collected; ?>" 
                                        aria-valuemin="0" 
                                        aria-valuemax="<?php echo $target; ?>">
                                    </div>
                                </div>
                                <p class="mt-2">Rp. <?php echo number_format($collected, 0, ',', '.'); ?> / Rp. <?php echo number_format($target, 0, ',', '.'); ?></p>
                                <p class="card-text"><?php echo $row['total_donors'] ?? 0; ?> Donatur</p>
                                <p class="card-text text-end">
                                    <?php
                                        $deadline = new DateTime($row['deadline']);
                                        $today = new DateTime();
                                        $interval = $today->diff($deadline);

                                        if ($interval->invert) {
                                            echo "Campaign telah berakhir";
                                        } else {
                                            echo $interval->days . " hari lagi";
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </div>

    <!-- Donation Section 2: Campaign Pilihan -->
    <div class="container mt-4">
        <div class="card p-3">
            <h3>Campaign Pilihan</h3>
            <div class="row">
            <?php while ($row = $result_pilihan->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <!-- Tambahkan tautan di seluruh card -->
                    <a href="./detil_donation.php?id=<?php echo $row['id']; ?>" class="text-decoration-none text-dark">
                        <div class="card">
                            <img alt="Campaign Image" class="card-img-top" src="../../uploads/<?php echo htmlspecialchars($row['image']); ?>" />
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['description']); ?></h5>
                                <p class="card-text"><i class="fas fa-user"></i> <?php echo htmlspecialchars($row['donator_name'] ?? 'Tidak diketahui'); ?></p>
                                <p class="card-text">Dana terkumpul:</p>
                                <div class="progress mb-2">
                                    <?php 
                                        $target = max($row['target_amount'] ?? 1, 1);
                                        $collected = $row['collected_amount'] ?? 0;
                                        $percentage = ($collected / $target) * 100;
                                    ?>
                                    <div class="progress-bar" role="progressbar" 
                                        style="width: <?php echo number_format($percentage, 2); ?>%;" 
                                        aria-valuenow="<?php echo $collected; ?>" 
                                        aria-valuemin="0" 
                                        aria-valuemax="<?php echo $target; ?>">
                                    </div>
                                </div>
                                <p class="mt-2">Rp. <?php echo number_format($collected, 0, ',', '.'); ?> / Rp. <?php echo number_format($target, 0, ',', '.'); ?></p>
                                <p class="card-text"><?php echo $row['total_donors'] ?? 0; ?> Donatur</p>
                                <p class="card-text text-end">
                                    <?php
                                        $deadline = new DateTime($row['deadline']);
                                        $today = new DateTime();
                                        $interval = $today->diff($deadline);

                                        if ($interval->invert) {
                                            echo "Campaign telah berakhir";
                                        } else {
                                            echo $interval->days . " hari lagi";
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div>
        <?php include '../layouts/tampilan/footer.php'; ?>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript Language -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const params = new URLSearchParams(window.location.search);
            const lang = params.get('lang') || localStorage.getItem('language') || 'id';
            localStorage.setItem('language', lang);

            // Ganti teks sesuai bahasa
            if (lang === 'id') {
                const btnLogin = document.querySelector('.btn-outline-secondary');
                const btnRegister = document.querySelector('.btn-danger');
                if (btnLogin) btnLogin.innerText = 'Masuk';
                if (btnRegister) btnRegister.innerText = 'Daftar';
            } else if (lang === 'en') {
                const btnLogin = document.querySelector('.btn-outline-secondary');
                const btnRegister = document.querySelector('.btn-danger');
                if (btnLogin) btnLogin.innerText = 'Login';
                if (btnRegister) btnRegister.innerText = 'Register';
            }
        });
    </script>
</body>
</html>