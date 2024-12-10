<?php
// Include file koneksi database
include '../../config/db.php'; // Pastikan path ke db.php benar
include '../../includes/auth.php'; // Untuk otentikasi admin

// Query statistik user
$user_result = mysqli_query($conn, "SELECT COUNT(*) AS total_user FROM users WHERE role = 'user'");
$total_user = ($user_result) ? mysqli_fetch_assoc($user_result)['total_user'] : 0;

$admin_result = mysqli_query($conn, "SELECT COUNT(*) AS total_admin FROM users WHERE role = 'admin'");
$total_admin = ($admin_result) ? mysqli_fetch_assoc($admin_result)['total_admin'] : 0;

// Query data pemasukan
$query_infaq = "SELECT * FROM infaq";
$query_sodaqoh = "SELECT * FROM sodaqoh";
$query_zakat = "SELECT * FROM zakat";

$infaq_result = mysqli_query($conn, $query_infaq);
$sodaqoh_result = mysqli_query($conn, $query_sodaqoh);
$zakat_result = mysqli_query($conn, $query_zakat);

// Hitung total pemasukan
$total_infaq = 0;
$total_sodaqoh = 0;
$total_zakat = 0;

// Menghitung total masing-masing kategori
while ($row = mysqli_fetch_assoc($infaq_result)) {
    $total_infaq += $row['amount'];
}

while ($row = mysqli_fetch_assoc($sodaqoh_result)) {
    $total_sodaqoh += $row['amount'];
}

while ($row = mysqli_fetch_assoc($zakat_result)) {
    $total_zakat += $row['amount'];
}

$total_semua = $total_infaq + $total_sodaqoh + $total_zakat;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../../assets/design/styleadmin.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .dashboard-wrapper {
            width: 90%;
            max-width: 1200px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            overflow-y: auto; /* Scroll untuk seluruh elemen */
            height: 90vh; /* Membatasi tinggi dashboard */
        }

        .scrollable-box {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .stats-box {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            height: 100%;
        }

        .stats-row {
            display: flex;
            justify-content: space-between;
        }

        .stats-box-wrapper {
            flex: 1;
            margin-right: 10px;
        }

        .stats-box-wrapper:last-child {
            margin-right: 0;
        }

        /* Warna khusus untuk User dan Admin */
        .user-box {
            background-color: #34A853; /* Hijau */
            color: white;
        }

        .admin-box {
            background-color: #4285F4; /* Biru */
            color: white;
        }

        .chart-container {
            height: 300px;
        }

        h5.text-center {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Dashboard Wrapper -->
    <div class="dashboard-wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <div class="container mt-4">
            <h1 class="text-center mb-5">Admin Dashboard</h1>

            <!-- Statistik Jumlah Pengguna dan Pemasukan -->
            <div class="scrollable-box">
                <h5 class="text-center">Statistik Jumlah Pengguna dan Pemasukan</h5>
                <div class="stats-row">
                    <div class="stats-box-wrapper">
                        <div class="stats-box user-box">
                            <h3>User</h3>
                            <p><?= $total_user; ?></p>
                        </div>
                    </div>
                    <div class="stats-box-wrapper">
                        <div class="stats-box admin-box">
                            <h3>Admin</h3>
                            <p><?= $total_admin; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Diagram Lingkaran Pemasukan -->
            <div class="scrollable-box">
                <h5 class="text-center">Pemasukan Berdasarkan Kategori</h5>
                <div class="chart-container mt-3">
                    <canvas id="incomeChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const infaq = <?= $total_infaq; ?>;
            const sodaqoh = <?= $total_sodaqoh; ?>;
            const zakat = <?= $total_zakat; ?>;

            const ctx = document.getElementById('incomeChart').getContext('2d');
            const incomeChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Infaq', 'Sodaqoh', 'Zakat'],
                    datasets: [{
                        data: [infaq, sodaqoh, zakat],
                        backgroundColor: ['#4285F4', '#FBBC05', '#34A853'],
                        borderColor: '#ffffff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
