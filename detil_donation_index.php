<?php

// Sertakan koneksi database
require_once '../aplikasi-manajemen-donasi/config/db.php';

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
    <link href="../aplikasi-manajemen-donasi/assets/design/style.css" rel="stylesheet">
    <link href="../aplikasi-manajemen-donasi/assets/design/navbar.css" rel="stylesheet">
    <link href="../aplikasi-manajemen-donasi/assets/design/hero_section.css" rel="stylesheet">
    <link href="../aplikasi-manajemen-donasi/assets/design/campaig_pasien.css" rel="stylesheet">
    <link href="../aplikasi-manajemen-donasi/assets/design/icon_section.css" rel="stylesheet">
    <link href="../aplikasi-manajemen-donasi/assets/design/footer.css" rel="stylesheet">
    <link href="../../../assets/user_css/detail_donation.css" rel="stylesheet"/>
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
    <?php include '../aplikasi-manajemen-donasi/view/partials/navbar.php'; ?>

    <!-- Hero Section -->
    <div>
        <?php include './view/layouts/tampilan/hero_section.php'; ?>
    </div>

    <!-- Icon Section -->
    <div>
        <?php include './view/layouts/tampilan/icon_section.php'; ?>
    </div>

    <!-- Donation Section 1: Campaign Pasien Mendesak -->
    <div class="container mt-4">
        <div class="card p-3">
            <h3>Campaign Darurat</h3>
            <div class="row">
            <?php while ($row = $result_darurat->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <!-- Tambahkan tautan di seluruh card -->
                    <a href="./detil_donation_index.php?id=<?php echo $row['id']; ?>" class="text-decoration-none text-dark">
                        <div class="card">
                            <img alt="Campaign Image" class="card-img-top" src="../aplikasi-manajemen-donasi/uploads/<?php echo htmlspecialchars($row['image']); ?>" />
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
                    <a href="./detil_donation_index.php?id=<?php echo $row['id']; ?>" class="text-decoration-none text-dark">
                        <div class="card">
                            <img alt="Campaign Image" class="card-img-top" src="../aplikasi-manajemen-donasi/uploads/<?php echo htmlspecialchars($row['image']); ?>" />
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
=======
// Cek apakah pengguna sudah login
session_start();

// Koneksi ke database dan query kampanye tetap berjalan
require_once './config/db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID tidak ditemukan.");
}

$query = "SELECT * FROM manage_donations WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$campaign = $result->fetch_assoc();

if (!$campaign) {
    die("Data kampanye tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Donation Campaign</title>
  <link
    crossorigin="anonymous"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    rel="stylesheet"
  />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <link
    href="./../../../../../aplikasi-manajemen-donasi/assets/donation_section/campaign_pasien/cp.css"
    rel="stylesheet"
  />
</head>
<body>
  <div class="campaign-container">
    <div class="campaign-header">
      <img
        alt="Gambar Kampanye"
        height="300"
        src="./uploads/<?php echo htmlspecialchars($campaign['image']); ?>"
        width="600"
      />
      <!-- Tombol Back -->
      <a class="back-button" href="./index.php">
        <i class="fas fa-arrow-left"></i>
      </a>
      <div class="user-info">
        <img
          alt="User profile picture"
          height="30"
          src="https://storage.googleapis.com/a1aa/image/NLl68wKJ95riIxAiHaod78KDlOJhK1yKEdRz05uogOTE9S9E.jpg"
          width="30"
        />
        <span><?php echo htmlspecialchars($campaign['donator_name'] ?? 'Anonymous'); ?></span>
      </div>
      <div class="language-selector">
        <img
          alt="Indonesian flag"
          height="20"
          src="https://storage.googleapis.com/a1aa/image/4UnLEyFpCPYIJhyhGT2o2GiV5UYVPgQpshtcBwVYsgGF9S9E.jpg"
          width="20"
        />
        <span>ID</span>
        <i class="fas fa-chevron-down"></i>
      </div>
    </div>
    <div class="campaign-body">
      <div class="verified">
        <i class="fas fa-check-circle"></i>
        <span>Campaign ini sudah terverifikasi</span>
      </div>
      <div class="title">
        <?php echo htmlspecialchars($campaign['description']); ?>
      </div>
      <div class="author">
        <?php echo htmlspecialchars($campaign['donator_name'] ?? 'Tidak diketahui'); ?>
      </div>
      <div class="stats">
        <div>
          <i class="fas fa-users"></i>
          71 Donatur
        </div>
        <div>
          <i class="fas fa-clock"></i>
          <?php 
          $deadline = new DateTime($campaign['deadline']);
          $now = new DateTime();
          $days_left = $deadline > $now ? $deadline->diff($now)->days : 0;
          echo $days_left . " hari lagi";
          ?>
        </div>
      </div>
      <div class="progress">
        <div
          aria-valuemax="100"
          aria-valuemin="0"
          aria-valuenow="<?php echo ($campaign['collected_amount'] / $campaign['target_amount']) * 100; ?>"
          class="progress-bar"
          role="progressbar"
          style="width: <?php echo ($campaign['collected_amount'] / $campaign['target_amount']) * 100; ?>%;"
        ></div>
      </div>
      <div class="amounts">
        <div>Rp <?php echo number_format($campaign['collected_amount'], 0, ',', '.'); ?> Terdanai</div>
        <div>Rp <?php echo number_format($campaign['target_amount'] - $campaign['collected_amount'], 0, ',', '.'); ?> Kekurangan</div>
      </div>

      <!-- Tombol Donasikan dan Bagikan -->
      <div class="action-buttons text-center mt-4">
        <a href="./view/pages/login.php?id=<?php echo $campaign['id']; ?>" class="btn btn-primary btn-lg me-2">
          <i class="fas fa-donate"></i> Donasikan
        </a>
        <a href="#" class="btn btn-secondary btn-lg">
          <i class="fas fa-share"></i> Bagikan
        </a>
      </div>
      <!-- Akhir Tombol -->

      <div class="donor-list">
        <h5>Para Donatur (71)</h5>
        <div class="donor-item">
          <div class="donor-avatar">
            <img
              alt="Anonymous avatar"
              height="30"
              src="https://storage.googleapis.com/a1aa/image/fU8gi7exM8seppYZpYmbK3uMTaoQ4P2GgShzeFr9vFJsc7UPB.jpg"
              width="30"
            />
          </div>
          <div class="donor-info">
            <div class="donor-name">Anonymous</div>
            <div class="donor-time">5 jam yang lalu</div>
            <div class="donor-amount">Donasi Rp 10.000</div>
          </div>
        </div>
        <div class="load-more">
          <button>Lihat Lebih Banyak</button>
        </div>
      </div>
      <div class="report-container">
        <p>Ada masalah dengan campaign ini?</p>
        <a class="report-button" href="#">
          <i class="fas fa-flag"></i> Laporkan Campaign Ini
        </a>
      </div>
    </div>
  </div>
</body>
</html>
