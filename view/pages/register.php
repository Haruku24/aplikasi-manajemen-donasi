<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Donatur</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Register Donatur</h2>
                <form action="./../../public/register_process.php" method="POST">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
                <p class="text-center mt-3">Sudah punya akun? <a href="./../../view/pages/login.php">Login</a></p>
            </div>
        </div>
    </div>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
