<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Sidebar Styles */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            transform: translateX(-100%);
        }

        .sidebar.visible {
            transform: translateX(0);
        }

        .sidebar h2 {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center; /* Menambahkan ini untuk menengahkan teks secara horizontal */
            display: flex;
            justify-content: center; /* Mengatur untuk menengahkan konten secara horizontal */
            align-items: center; /* Menjaga agar tetap berada di tengah secara vertikal */
            height: 50px; /* Sesuaikan dengan tinggi yang sesuai jika diperlukan */
         }


        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #007bff;
        }

        /* Sidebar Toggle Button */
        .open-sidebar {
            background-color: #343a40;
            color: white;
            border: none;
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 22px;
            cursor: pointer;
            z-index: 1000;
        }

        .close-sidebar {
            background-color: transparent;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 22px;
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body>

    <!-- Button to Open Sidebar -->
    <button class="open-sidebar" id="openSidebar">☰</button>

    <!-- Sidebar Menu -->
    <div class="sidebar" id="sidebar">
        <button class="close-sidebar" id="closeSidebar">✖</button>
        <h2>Admin</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="manage_donations.php">Manage Donations</a>
        <a href="reports.php">Laporan Donasi</a>
        <a href="income.php">Laporan Pemasukan</a>
        <a href="zakat.php">Zakat</a>
        <a href="#">Penarikan Dana</a>
        <a href="../pages/logout.php">Logout</a>
    </div>

    <script>
        // JavaScript for Sidebar Toggle
        const openSidebarButton = document.getElementById('openSidebar');
        const closeSidebarButton = document.getElementById('closeSidebar');
        const sidebar = document.getElementById('sidebar');

        // Show Sidebar
        openSidebarButton.addEventListener('click', () => {
            sidebar.classList.add('visible');
            openSidebarButton.style.display = 'none'; // Hide the open button
        });

        // Hide Sidebar
        closeSidebarButton.addEventListener('click', () => {
            sidebar.classList.remove('visible');
            openSidebarButton.style.display = 'block'; // Show the open button again
        });
    </script>

</body>
</html>
