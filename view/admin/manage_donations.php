<?php
ob_start(); // Memulai output buffering

// Koneksi ke database
require_once '../../config/db.php';

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_stmt = $conn->prepare("DELETE FROM manage_donations WHERE id = ?");
    $delete_stmt->bind_param("i", $delete_id);
    $delete_stmt->execute();
    header("Location: manage_donations.php");
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $description = $_POST['description'];
    $target_amount = str_replace('.', '', $_POST['target_amount']);
    $target_amount = str_replace('Rp', '', $target_amount);
    $deadline = $_POST['deadline'];
    $status_donation = $_POST['status_donation'];
    $donator_name = $_POST['donator_name']; // Nama donatur

    // Proses upload gambar
    $image = $_FILES['image']['name'];
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($_FILES['image']['size'] <= 3000000 && in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO manage_donations (image, description, target_amount, deadline, status_donation, donator_name) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $image, $description, $target_amount, $deadline, $status_donation, $donator_name);
            $stmt->execute();
            header("Location: manage_donations.php");
            exit();
        }
    } else {
        echo "<script>alert('File tidak valid! Pastikan file gambar maksimal 3MB dan dalam format PNG, JPEG, atau JPG.');</script>";
    }
}

ob_end_flush(); // Mengakhiri output buffering
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Donations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/design/managedonations.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="main-content" id="mainContent">
        <div class="container">
            <h2 class="my-4">Manage Donations</h2>

            <!-- Form Tambah Donasi -->
            <form action="manage_donations.php" method="POST" enctype="multipart/form-data" class="mb-4">
                <div class="form-group">
                    <label for="image">Upload Image (Max 3MB):</label>
                    <input type="file" name="image" id="image" class="form-control-file" required accept="image/png, image/jpeg, image/jpg">
                    <small class="form-text text-muted">Max size: 3MB. Only PNG, JPEG, JPG allowed.</small>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="target_amount">Target Amount:</label>
                    <input type="text" name="target_amount" id="target_amount" class="form-control" placeholder="Rp. 0" required>
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline:</label>
                    <input type="date" name="deadline" id="deadline" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="donator_name">Donator Name:</label>
                    <input type="text" name="donator_name" id="donator_name" class="form-control" placeholder="Enter Donator Name" required>
                </div>
                <div class="form-group">
                    <label for="status_donation">Donation Status:</label>
                    <select name="status_donation" id="status_donation" class="form-control" required>
                        <option value="pilihan">Pilihan</option>
                        <option value="darurat">Darurat</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Donation</button>
            </form>

            <!-- Daftar Donasi -->
            <h3 class="my-4">Donation List</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Target Amount</th>
                            <th>Collected Amount</th>
                            <th>Donator Name</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $conn->query("SELECT * FROM manage_donations ORDER BY id ASC");
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td><img src='../../uploads/{$row['image']}' width='100' class='img-thumbnail'></td>";
                            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                            echo "<td>Rp. " . number_format($row['target_amount'], 0, ',', '.') . "</td>";
                            echo "<td>Rp. " . number_format($row['collected_amount'], 0, ',', '.') . "</td>";
                            echo "<td>" . htmlspecialchars($row['donator_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['deadline']) . "</td>";
                            echo "<td>" . ucfirst(htmlspecialchars($row['status_donation'])) . "</td>";
                            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                            echo "<td>
                                    <a href='edit_donation.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                    <button class='btn btn-danger btn-sm' data-id='{$row['id']}' onclick='confirmDelete({$row['id']})'>Delete</button>
                                 </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#target_amount').mask('000.000.000.000.000', {reverse: true});
        });

        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this donation?")) {
                window.location.href = 'manage_donations.php?delete_id=' + id;
            }
        }
    </script>
</body>
</html>
