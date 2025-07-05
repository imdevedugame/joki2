<nav class="navbar navbar-expand-lg navbar-dark" style="background: #00796b;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= base_url('/') ?>">
            <i class="fas fa-house"></i> Desa Banjaran
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/') ?>"><i class="fas fa-home me-1"></i>Beranda</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/wisata') ?>"><i class="fas fa-person-hiking me-1"></i>Wisata</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/homestay') ?>"><i class="fas fa-house-user me-1"></i>Homestay</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/gallery') ?>"><i class="fas fa-image me-1"></i>Galeri</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/video') ?>"><i class="fas fa-video me-1"></i>Video</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/berita') ?>"><i class="fas fa-newspaper me-1"></i>Berita</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/login') ?>"><i class="fas fa-key me-1"></i>Login</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/admin/login') ?>"><i class="fas fa-tools me-1"></i>Admin</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/logout') ?>"><i class="fas fa-sign-out-alt me-1"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
