<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Reports</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/design/reports.css">
    
    <!-- Font Awesome for Search Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* General body and layout styles */
    body, html {
        margin: 0;
        padding: 0;
        font-family: 'Courier New', Courier, monospace;
        background-color: #f0f0f0;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    .main-content {
        width: 100%;
        max-width: 1200px;
        padding: 40px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow-y: auto; /* Allows scrolling if content exceeds viewport */
        height: 90vh; /* Ensures content height is scrollable */
        box-sizing: border-box;
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    /* Search bar styles */
    .form-group {
        margin-bottom: 20px;
    }

    .input-group {
        max-width: 500px;
        margin: 0 auto;
    }

    .input-group .form-control {
        border-radius: 20px;
    }

    .input-group-append .btn {
        border-radius: 20px;
    }

    /* Table container with horizontal scrolling */
    .table-container {
        overflow-x: auto; /* Allows horizontal scrolling */
        margin-top: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        text-align: center;
        padding: 12px;
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #007bff;
        color: white;
    }

    .table td {
        background-color: #f9f9f9;
    }

    .table img {
        width: 100px;
        height: auto;
        border-radius: 5px;
    }

    /* Responsive adjustments for mobile */
    @media (max-width: 768px) {
        .main-content {
            padding: 20px;
        }

        h2 {
            font-size: 24px; /* Make heading size smaller on mobile */
        }

        .input-group {
            width: 100%; /* Make search bar full width on mobile */
        }

        .table th, .table td {
            font-size: 12px; /* Smaller font size on mobile */
            padding: 8px;
        }

        .table-container {
            margin-top: 15px;
        }
    }

    @media (max-width: 576px) {
        .input-group .form-control, .input-group-append .btn {
            padding: 8px; /* Smaller padding for input and button */
        }

        .table th, .table td {
            font-size: 10px; /* Further reduce font size */
            padding: 6px;
        }
    }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Main Content for Reports -->
    <div class="main-content" id="mainContent">
        <div class="container-fluid">
            <h2 class="my-4 text-center">Donation Reports</h2>

            <!-- Search form with button icon -->
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search by ID, User Name, Description, or Amount">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button" onclick="searchTable()">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Report Table Container for Centered Table -->
            <div class="table-container">
                <table class="table table-striped text-center" id="reportsTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Donation Amount</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../../config/db.php';

                        $query = "SELECT donations.id, users.name AS user_name, donations.description, donations.amount, donations.created_at AS donation_date
                                  FROM donations
                                  JOIN users ON donations.user_id = users.id
                                  ORDER BY donations.id ASC";
                        $result = $conn->query($query);

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['user_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                            echo "<td>Rp. " . number_format($row['amount'], 0, ',', '.') . "</td>";
                            echo "<td>" . htmlspecialchars($row['donation_date']) . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Search feature for the table triggered by button click
        function searchTable() {
            var value = $('#searchInput').val().toLowerCase();
            $('#reportsTable tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        }

        // Also enable search on input keyup
        $(document).ready(function() {
            $('#searchInput').on('keyup', searchTable);
        });
    </script>
</body>
</html>
