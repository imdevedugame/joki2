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
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="news" width="40" height="40" patternUnits="userSpaceOnUse"><rect x="10" y="10" width="20" height="15" fill="rgba(255,255,255,0.05)" rx="2"/><line x1="12" y1="15" x2="28" y2="15" stroke="rgba(255,255,255,0.03)" stroke-width="1"/><line x1="12" y1="18" x2="25" y2="18" stroke="rgba(255,255,255,0.03)" stroke-width="1"/><line x1="12" y1="21" x2="28" y2="21" stroke="rgba(255,255,255,0.03)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23news)"/></svg>');
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

.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.news-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    animation: fadeInUp 0.6s ease-out;
    display: flex;
    flex-direction: column;
}

.news-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(46, 125, 50, 0.2);
}

.news-img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.news-card:hover .news-img {
    transform: scale(1.1);
}

.news-card-body {
    padding: 30px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.news-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 15px;
    line-height: 1.4;
}

.news-excerpt {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
    flex-grow: 1;
}

.news-meta {
    display: flex;
    align-items: center;
    gap: 15px;
    color: var(--primary-green);
    font-weight: 600;
    margin-top: auto;
    padding-top: 20px;
    border-top: 2px solid var(--bg-light);
}

.news-date {
    display: flex;
    align-items: center;
    gap: 8px;
}

.news-card::before {
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

.news-card:hover::before {
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

.empty-state {
    text-align: center;
    padding: 80px 20px;
    color: #666;
}

.empty-state i {
    font-size: 5rem;
    color: var(--accent-green);
    margin-bottom: 30px;
}

.empty-state h3 {
    color: var(--primary-green);
    margin-bottom: 15px;
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
    .news-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .news-card-body {
        padding: 20px;
    }
}
</style>

<div class="page-header">
    <div class="container text-center">
        <h1 class="page-title"><i class="fas fa-clipboard-list"></i> Berita Desa</h1>
        <p class="page-subtitle">Informasi terkini seputar kegiatan dan perkembangan Desa Banjaran</p>
    </div>
</div>

<div class="container">
    <?php if (!empty($beritas)): ?>
        <div class="news-grid">
            <?php foreach ($beritas as $index => $b): ?>
                <article class="news-card" style="animation-delay: <?= $index * 0.1 ?>s">
                    <img src="<?= base_url('uploads/berita/' . $b['gambar']) ?>" 
                         class="news-img" 
                         alt="<?= esc($b['judul']) ?>">
                    
                    <div class="news-card-body">
                        <h2 class="news-title"><?= esc($b['judul']) ?></h2>
                        <p class="news-excerpt">
                            <?= character_limiter(strip_tags($b['isi']), 180) ?>
                        </p>
                        <div class="news-meta">
                            <div class="news-date">
                                <i class="fas fa-calendar-alt"></i>
                                <?= date('d M Y', strtotime($b['created_at'])) ?>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="empty-state">
            <i class="fas fa-newspaper"></i>
            <h3>Belum Ada Berita</h3>
            <p>Saat ini belum ada berita yang tersedia. Silakan kembali lagi nanti.</p>
        </div>
    <?php endif; ?>

    <div class="back-btn-container">
        <a href="<?= base_url('/') ?>" class="back-btn">
            <i class="fas fa-arrow-left me-2"></i>
            Kembali ke Home
        </a>
    </div>
</div>

<?= $this->include('layout/footer') ?>
