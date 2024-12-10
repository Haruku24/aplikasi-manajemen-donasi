<!-- Navbar -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="https://via.placeholder.com/40" alt="WeCare.id">
                <span class="ms-2 fw-bold text-primary">WeCare.id</span>
            </a>
            <!-- Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Donasikan -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Donasikan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Campaign Pilihan</a></li>
                            <li><a class="dropdown-item" href="#">Shop & Donate</a></li>
                            <li><a class="dropdown-item" href="#">Donasi Rutin</a></li>
                        </ul>
                    </li>
                    <!-- Tentang Kami -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tentang Kami</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Tentang Kami</a></li>
                            <li><a class="dropdown-item" href="#">FAQ</a></li>
                            <li><a class="dropdown-item" href="#">Kebijakan Privasi</a></li>
                        </ul>
                    </li>
                    <!-- Galang Dana -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Galang Dana</a>
                    </li>
                    <!-- Notifikasi -->
                    <li class="nav-item me-2">
                        <a class="nav-link position-relative" href="#">
                            <i class="fa fa-bell"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">•</span>
                        </a>
                    </li>
                    <!-- User Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-circle" width="30" height="30">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end text-center">
                            <!-- Logo -->
                            <li>
                                <img src="https://via.placeholder.com/60" alt="User Avatar" class="rounded-circle my-2">
                            </li>
                            <!-- Text "Hi, [Name]" -->
                            <li>
                                <p class="mb-0">Hi, <strong>{{UserName}}</strong></p>
                                <p class="text-muted small">{{UserEmail}}</p>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <!-- Profile -->
                            <li>
                                <a class="dropdown-item" href="../partials/edit_profile.php">Profil</a>
                            </li>
                            <!-- Logout -->
                            <li>
                                <a class="dropdown-item" href="../../index.php">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
