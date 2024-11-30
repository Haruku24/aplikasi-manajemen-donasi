<?php
// Cek apakah pengguna sudah login
session_start();

// Mengambil data dari session jika ada
$is_logged_in = isset($_SESSION['user_id']);  // Asumsi 'user_id' disimpan di session setelah login

// Koneksi ke database dan query kampanye tetap berjalan
require_once '../../config/db.php';

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
        src="../../uploads/<?php echo htmlspecialchars($campaign['image']); ?>"
        width="600"
      />
      <!-- Tombol Back dengan kondisi login -->
      <a class="back-button" href="<?php echo $is_logged_in ? '../user/dashboard.php' : '../../index.php'; ?>">
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
        <?php if (!$is_logged_in): ?>
          <!-- Jika belum login, arahkan ke halaman login -->
          <a href="../pages/login.php" class="btn btn-primary btn-lg me-2">
            <i class="fas fa-donate"></i> Donasikan
          </a>
        <?php else: ?>
          <!-- Jika sudah login, arahkan ke halaman pembayaran -->
          <a href="../layouts/pembayaran/pembayaran.php?id=<?php echo $campaign['id']; ?>" class="btn btn-primary btn-lg me-2">
            <i class="fas fa-donate"></i> Donasikan
          </a>
        <?php endif; ?>
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
