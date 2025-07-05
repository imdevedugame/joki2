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

.search-container {
    max-width: 800px;
    margin: 30px auto 0;
    position: relative;
    z-index: 1;
    animation: slideInUp 1s ease-out 0.2s both;
}

.search-form {
    background: white;
    border-radius: 20px;
    padding: 20px;
    box-shadow: var(--shadow);
    transition: all 0.3s ease;
}

.search-form:focus-within {
    box-shadow: 0 12px 40px rgba(46, 125, 50, 0.2);
    transform: translateY(-2px);
}

.search-form .form-control {
    border: 2px solid #e0e0e0;
    border-radius: 12px;
    padding: 12px 16px;
    transition: all 0.3s ease;
}

.search-form .form-control:focus {
    border-color: var(--primary-green);
    box-shadow: 0 0 0 0.2rem rgba(46, 125, 50, 0.25);
}

.search-btn {
    background: linear-gradient(135deg, var(--primary-green), var(--light-green));
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.search-btn i {
    margin-right: 8px;
}

.search-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(46, 125, 50, 0.3);
}

.homestay-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.homestay-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    animation: fadeInUp 0.6s ease-out;
}

.homestay-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(46, 125, 50, 0.2);
}

.homestay-card::before {
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

.homestay-card:hover::before {
    transform: scaleX(1);
}

.homestay-img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.homestay-card:hover .homestay-img {
    transform: scale(1.1);
}

.homestay-card-body {
    padding: 25px;
    display: flex;
    flex-direction: column;
    height: calc(100% - 220px);
}

.homestay-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 15px;
}

.homestay-description {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
    flex-grow: 1;
}

.homestay-price {
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--primary-green);
    margin-bottom: 20px;
}

.homestay-price i {
    margin-right: 8px;
}

.homestay-btn {
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

.homestay-btn i {
    margin-right: 8px;
}

.homestay-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.homestay-btn:hover::before {
    left: 100%;
}

.homestay-btn:hover {
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
    .homestay-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}
</style>

<div class="page-header">
    <div class="container text-center">
        <h1 class="page-title">
            <i class="fas fa-home"></i>Daftar Homestay
        </h1>
        
        <div class="search-container">
            <form action="<?= base_url('homestay/search') ?>" method="get" class="search-form">
                <div class="row g-3">
                    <div class="col-md-5">
                        <input type="number" name="harga_min" class="form-control" placeholder="Harga Minimum">
                    </div>
                    <div class="col-md-5">
                        <input type="number" name="harga_max" class="form-control" placeholder="Harga Maksimum">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="search-btn w-100">
                            <i class="fas fa-search"></i>Cari
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="homestay-grid">
        <?php foreach ($homestays as $index => $h): ?>
        <div class="homestay-card" style="animation-delay: <?= $index * 0.1 ?>s">
            <img src="<?= base_url('assets/images/' . $h['gambar']) ?>" 
                 class="homestay-img" 
                 alt="<?= esc($h['nama_homestay']) ?>">
            
            <div class="homestay-card-body">
                <h5 class="homestay-title"><?= esc($h['nama_homestay']) ?></h5>
                <p class="homestay-description">
                    <?= character_limiter(strip_tags($h['deskripsi']), 120) ?>
                </p>
                <div class="homestay-price">
                    <i class="fas fa-money-bill-wave"></i>Rp <?= number_format($h['harga_per_malam'], 0, ',', '.') ?> / malam
                </div>
                <a href="<?= session()->get('logged_in') ? base_url('member/pesan/homestay/' . $h['id_homestay']) : base_url('login') ?>" 
                   class="homestay-btn">
                    <i class="fas fa-bed"></i>Pesan Homestay
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->include('layout/footer') ?>
