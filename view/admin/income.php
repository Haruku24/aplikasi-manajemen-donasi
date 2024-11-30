<?php
// Include file koneksi database
include '../../config/db.php';
include '../../includes/auth.php'; // Untuk otentikasi admin

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

// Menghitung total masing-masing
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
    <title>Laporan Pemasukan</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/design/income.css"> <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa; /* Background light gray */
        }

        .main-content {
            width: 90%;
            margin: 2rem auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table {
            font-size: 14px;
            text-align: center;
        }

        .table thead {
            background-color: #343a40; /* Dark theme */
            color: #ffffff;
        }

        .table img {
            width: 100px;
            height: auto;
            border-radius: 8px;
        }

        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <div class="container">
            <h2 class="my-4 text-center">Laporan Pemasukan</h2>

            <!-- Tabel Informasi Pemasukan -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Kategori</th>
                            <th scope="col">Jumlah Pemasukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Infaq</td>
                            <td>Rp<?= number_format($total_infaq, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td>Sodaqoh</td>
                            <td>Rp<?= number_format($total_sodaqoh, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td>Zakat</td>
                            <td>Rp<?= number_format($total_zakat, 0, ',', '.'); ?></td>
                        </tr>
                        <tr class="table-success">
                            <td>Total Pemasukan</td>
                            <td>Rp<?= number_format($total_semua, 0, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
