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

.page-header {
    background: linear-gradient(135deg, var(--primary-green), var(--light-green));
    color: white;
    padding: 60px 0;
    margin-bottom: 50px;
    position: relative;
    overflow: hidden;
}

.page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
}

.page-title {
    font-size: 3rem;
    font-weight: 800;
    margin: 0;
    position: relative;
    z-index: 1;
    animation: slideInUp 1s ease-out;
}

.page-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
    margin-top: 10px;
    position: relative;
    z-index: 1;
    animation: slideInUp 1s ease-out 0.2s both;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.gallery-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    animation: fadeInUp 0.6s ease-out;
}

.gallery-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 40px rgba(46, 125, 50, 0.2);
}

.gallery-img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.gallery-card:hover .gallery-img {
    transform: scale(1.1);
}

.gallery-card-body {
    padding: 25px;
    position: relative;
}

.gallery-card-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-dark);
    margin: 0;
    position: relative;
}

.gallery-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-green), var(--light-green));
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.gallery-card:hover::before {
    transform: scaleX(1);
}

.back-btn-container {
    text-align: center;
    margin-top: 50px;
}

.back-btn {
    display: inline-flex;
    align-items: center;
    padding: 15px 30px;
    background: linear-gradient(135deg, var(--primary-green), var(--light-green));
    color: white;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: var(--shadow);
}

.back-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(46, 125, 50, 0.3);
    color: white;
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

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .page-title {
        font-size: 2.2rem;
    }
    .gallery-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}
</style>

<div class="page-header">
    <div class="container text-center">
        <h1 class="page-title"><i class="fas fa-house-user"></i> Galeri Desa Wisata</h1>
        <p class="page-subtitle">Koleksi foto-foto indah dari berbagai sudut Desa Banjaran</p>
    </div>
</div>

<div class="container">
    <div class="gallery-grid">
        <?php foreach ($galleries as $index => $g): ?>
            <div class="gallery-card" style="animation-delay: <?= $index * 0.1 ?>s">
                <img src="<?= base_url('uploads/gallery/' . $g['gambar']) ?>" 
                     class="gallery-img" 
                     alt="<?= esc($g['judul']) ?>">
                <div class="gallery-card-body">
                    <h5 class="gallery-card-title"><?= esc($g['judul']) ?></h5>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="back-btn-container">
        <a href="<?= base_url('/') ?>" class="back-btn">
            <i class="fas fa-arrow-left me-2"></i>
            Kembali ke Home
        </a>
    </div>
</div>

<?= $this->include('layout/footer') ?>
