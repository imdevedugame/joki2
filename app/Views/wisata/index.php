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

.search-container {
    max-width: 600px;
    margin: 30px auto 0;
    position: relative;
    z-index: 1;
    animation: slideInUp 1s ease-out 0.2s both;
}

.search-form {
    display: flex;
    background: white;
    border-radius: 50px;
    padding: 5px;
    box-shadow: var(--shadow);
    transition: all 0.3s ease;
}

.search-form:focus-within {
    box-shadow: 0 12px 40px rgba(46, 125, 50, 0.2);
    transform: translateY(-2px);
}

.search-input {
    flex: 1;
    border: none;
    padding: 15px 25px;
    border-radius: 50px;
    font-size: 1.1rem;
    outline: none;
    background: transparent;
}

.search-btn {
    background: linear-gradient(135deg, var(--primary-green), var(--light-green));
    color: white;
    border: none;
    padding: 15px 30px;
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.search-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(46, 125, 50, 0.3);
}

.wisata-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.wisata-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    animation: fadeInUp 0.6s ease-out;
}

.wisata-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(46, 125, 50, 0.2);
}

.wisata-img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.wisata-card:hover .wisata-img {
    transform: scale(1.1);
}

.wisata-card-body {
    padding: 25px;
    display: flex;
    flex-direction: column;
    height: calc(100% - 220px);
}

.wisata-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 15px;
}

.wisata-description {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
    flex-grow: 1;
}

.wisata-price {
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--primary-green);
    margin-bottom: 20px;
}

.wisata-btn {
    background: linear-gradient(135deg, var(--primary-green), var(--light-green));
    color: white;
    text-decoration: none;
    padding: 15px 25px;
    border-radius: 50px;
    font-weight: 600;
    text-align: center;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.wisata-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.wisata-btn:hover::before {
    left: 100%;
}

.wisata-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(46, 125, 50, 0.3);
    color: white;
}

.wisata-card::before {
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

.wisata-card:hover::before {
    transform: scaleX(1);
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
    .wisata-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}
</style>

<div class="page-header">
    <div class="container text-center">
        <h1 class="page-title"> <i class="fas fa-compass"></i>Daftar Paket Wisata</h1>
        
        <div class="search-container">
            <form action="<?= base_url('wisata/search') ?>" method="get" class="search-form">
                <input type="text" name="q" class="search-input" placeholder="Cari paket wisata impian Anda..." required>
                <button type="submit" class="search-btn">
                    <i class="fas fa-search me-2"></i>Cari
                </button>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="wisata-grid">
        <?php foreach ($pakets as $index => $paket): ?>
            <div class="wisata-card" style="animation-delay: <?= $index * 0.1 ?>s">
                <img src="<?= base_url('uploads/paket/' . $paket['gambar']) ?>" 
                     class="wisata-img" 
                     alt="<?= esc($paket['nama_paket']) ?>">
                
                <div class="wisata-card-body">
                    <h5 class="wisata-title"><?= esc($paket['nama_paket']) ?></h5>
                    <p class="wisata-description">
                        <?= character_limiter(strip_tags($paket['deskripsi']), 120) ?>
                    </p>
                    <div class="wisata-price">
                        <i class="fas fa-tag me-2"></i>
                        Rp <?= number_format($paket['harga'], 0, ',', '.') ?>
                    </div>
                    <a href="<?= session()->get('logged_in') ? base_url('member/pesan/wisata/' . $paket['id_paket']) : base_url('login') ?>" 
                       class="wisata-btn">
                        <i class="fas fa-calendar-check me-2"></i>
                        Pesan Sekarang
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->include('layout/footer') ?>
