<?= $this->include('layout/header') ?>

<style>
:root {
    --primary-green: #2e7d32;
    --light-green: #4caf50;
    --dark-green: #1b5e20;
    --accent-green: #81c784;
    --bg-light: #f1f8e9;
    --text-dark: #2c3e50;
    --shadow: 0 8px 32px rgba(46, 125, 50, 0.1);
}

.hero-section {
    background: linear-gradient(135deg, var(--bg-light) 0%, #ffffff 100%);
    padding: 80px 20px;
    border-radius: 20px;
    margin: 30px 0;
    position: relative;
    overflow: hidden;
    box-shadow: var(--shadow);
}

.hero-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(76, 175, 80, 0.1) 0%, transparent 70%);
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(5deg); }
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, var(--primary-green), var(--light-green));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1.5rem;
    animation: slideInUp 1s ease-out;
}

.hero-subtitle {
    font-size: 1.3rem;
    color: var(--text-dark);
    line-height: 1.6;
    margin-bottom: 2.5rem;
    animation: slideInUp 1s ease-out 0.2s both;
}

.hero-buttons {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    max-width: 800px;
    margin: 0 auto;
    animation: slideInUp 1s ease-out 0.4s both;
}

.btn-custom {
    padding: 15px 25px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid transparent;
    position: relative;
    overflow: hidden;
}

.btn-custom::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-custom:hover::before {
    left: 100%;
}

.btn-primary-custom {
    background: linear-gradient(135deg, var(--primary-green), var(--light-green));
    color: white;
    box-shadow: 0 4px 15px rgba(46, 125, 50, 0.3);
}

.btn-primary-custom:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(46, 125, 50, 0.4);
    color: white;
}

.btn-outline-custom {
    background: white;
    color: var(--primary-green);
    border: 2px solid var(--primary-green);
}

.btn-outline-custom:hover {
    background: var(--primary-green);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(46, 125, 50, 0.3);
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.alert-custom {
    border-radius: 15px;
    border: none;
    box-shadow: var(--shadow);
    animation: slideInDown 0.5s ease-out;
}

@keyframes slideInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    .hero-subtitle {
        font-size: 1.1rem;
    }
    .hero-buttons {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="container-fluid mt-4 px-0">

    <!-- Alert Messages -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show alert-custom" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show alert-custom" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>
            <?= session()->getFlashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Hero Section -->
    <div class="hero-section text-center">
        <h1 class="hero-title">🌿 Selamat Datang di Desa Wisata Banjaran</h1>
        <p class="hero-subtitle">
            Temukan keindahan alam, budaya, dan keramahan warga Desa Banjaran melalui beragam paket wisata,
            homestay nyaman, serta galeri foto dan video inspiratif yang memukau.
        </p>
        
        <div class="hero-buttons">
            <a href="<?= base_url('/wisata') ?>" class="btn-custom btn-primary-custom">
                <i class="fas fa-mountain me-2"></i>Paket Wisata
            </a>
            <a href="<?= base_url('/homestay') ?>" class="btn-custom btn-outline-custom">
                <i class="fas fa-home me-2"></i>Homestay
            </a>
            <a href="<?= base_url('/riwayat') ?>" class="btn-custom btn-outline-custom">
                <i class="fas fa-history me-2"></i>Riwayat
            </a>
            <a href="<?= base_url('/gallery') ?>" class="btn-custom btn-outline-custom">
                <i class="fas fa-camera me-2"></i>Galeri
            </a>
            <a href="<?= base_url('/berita') ?>" class="btn-custom btn-outline-custom">
                <i class="fas fa-newspaper me-2"></i>Berita
            </a>
            <a href="<?= base_url('/video') ?>" class="btn-custom btn-outline-custom">
                <i class="fas fa-video me-2"></i>Video
            </a>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?>
