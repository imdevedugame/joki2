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
    margin-bottom: 40px;
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
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="mountains" width="100" height="100" patternUnits="userSpaceOnUse"><polygon points="20,80 40,40 60,80" fill="rgba(255,255,255,0.05)"/><polygon points="40,80 60,30 80,80" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23mountains)"/></svg>');
}

.page-title {
    font-size: 3rem;
    font-weight: 800;
    margin: 0;
    position: relative;
    z-index: 1;
    animation: slideInUp 1s ease-out;
}

.page-title i {
    margin-right: 15px;
    color: rgba(255, 255, 255, 0.9);
}

.video-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.video-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    animation: fadeInUp 0.6s ease-out;
}

.video-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(46, 125, 50, 0.2);
}

.video-card::before {
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

.video-card:hover::before {
    transform: scaleX(1);
}

.video-card-body {
    padding: 25px;
}

.video-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 20px;
}

.video-wrapper {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.video-wrapper iframe {
    border-radius: 15px;
}

.back-btn-container {
    max-width: 300px;
    margin: 50px auto 0;
    text-align: center;
}

.back-btn {
    background: linear-gradient(135deg, var(--primary-green), var(--light-green));
    color: white;
    text-decoration: none;
    padding: 15px 30px;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-block;
    position: relative;
    overflow: hidden;
}

.back-btn i {
    margin-right: 8px;
}

.back-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.back-btn:hover::before {
    left: 100%;
}

.back-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(46, 125, 50, 0.3);
    color: white;
    text-decoration: none;
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
    .video-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}
</style>

<div class="page-header">
    <div class="container text-center">
        <h1 class="page-title">
            <i class="fas fa-video"></i>Galeri Video Desa
        </h1>
    </div>
</div>

<div class="container my-5">
    <div class="video-grid">
        <?php foreach ($videos as $index => $v): ?>
        <div class="video-card" style="animation-delay: <?= $index * 0.1 ?>s">
            <div class="video-card-body">
                <h5 class="video-title"><?= esc($v['judul']) ?></h5>
                <div class="video-wrapper">
                    <div class="ratio ratio-16x9">
                        <iframe 
                            src="<?= esc(str_replace('watch?v=', 'embed/', $v['url'])) ?>"
                            frameborder="0" 
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="back-btn-container">
        <a href="<?= base_url('/') ?>" class="back-btn">
            <i class="fas fa-arrow-left"></i>Kembali ke Home
        </a>
    </div>
</div>

<?= $this->include('layout/footer') ?>
