<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare.id Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Navbar Styles */
        .navbar {
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .navbar-brand img {
            height: 35px;
        }

        /* Efek Fade-In pada Navbar */
        .navbar {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Custom Dropdown Animation */
        .dropdown-menu {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease, transform 0.5s ease;
            transform: translateY(-10px);
        }

        .dropdown-menu.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        /* Mobile Styles */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                position: absolute;
                top: 56px;
                left: 0;
                width: 100%;
                background-color: #fff;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                z-index: 999;
                padding: 10px;
            }

            .navbar-nav {
                flex-direction: column;
            }

            .nav-item {
                margin-bottom: 10px;
                border-bottom: 1px solid #ddd;
                padding-bottom: 10px;
            }

            .nav-link {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .dropdown-menu {
                position: static;
                float: none;
                width: 100%;
                margin-top: 0;
                box-shadow: none;
                background-color: #f8f9fa;
                border-radius: 0;
                padding: 10px;
            }

            .dropdown-item {
                padding: 10px 20px;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }

            .dropdown-item:hover {
                background-color: #e9ecef;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="https://via.placeholder.com/40" alt="WeCare.id">
                    <span class="ms-2">WeCare.id</span>
                </a>
                <button class="navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="toggleNavbar()">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" onclick="toggleDropdown(event)">Donasikan </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./../../../aplikasi-manajemen-donasi/view/layouts/pilihan_lainnya/pilihan_lainnya.php">Campaign Pilihan</a></li>
                                <li><a class="dropdown-item" href="#">Shop & Donate</a></li>
                                <li><a class="dropdown-item" href="#">Donasi Rutin</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" onclick="toggleDropdown(event)">Tentang Kami</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Tentang Kami</a></li>
                                <li><a class="dropdown-item" href="#">FAQ</a></li>
                                <li><a class="dropdown-item" href="#">Kebijakan Privasi</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="d-flex ms-6">
                        <a href="../aplikasi-manajemen-donasi/view/pages/login.php" class="btn btn-outline-secondary me-2">
                            <i class="fa fa-sign-in-alt"></i> Masuk
                        </a>
                        <a href="../aplikasi-manajemen-donasi/view/pages/register.php" class="btn btn-danger">
                            <i class="fa fa-user-plus"></i> Daftar
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <script>
        function toggleNavbar() {
            const navbarNav = document.getElementById('navbarNav');
            if (navbarNav.classList.contains('show')) {
                navbarNav.classList.remove('show');
            } else {
                navbarNav.classList.add('show');
            }
        }

        function toggleDropdown(event) {
            event.preventDefault();
            const dropdownMenu = event.target.nextElementSibling;
            if (dropdownMenu.classList.contains('show')) {
                dropdownMenu.classList.remove('show');
            } else {
                dropdownMenu.classList.add('show');
            }
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const dropdowns = document.querySelectorAll('.dropdown-menu');
            dropdowns.forEach(dropdown => {
                if (!dropdown.contains(event.target) && !dropdown.previousElementSibling.contains(event.target)) {
                    dropdown.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>