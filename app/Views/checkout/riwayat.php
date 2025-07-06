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
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="history" width="50" height="50" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="2" fill="rgba(255,255,255,0.1)"/><path d="M15,25 Q25,15 35,25 Q25,35 15,25" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23history)"/></svg>');
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

.table-container {
    background: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: var(--shadow);
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
    animation: fadeInUp 0.6s ease-out;
}

.table-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-green), var(--light-green));
}

.section-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--primary-green);
    margin-bottom: 30px;
    display: flex;
    align-items: center;
    gap: 15px;
}

.section-title::after {
    content: '';
    flex: 1;
    height: 2px;
    background: linear-gradient(90deg, var(--accent-green), transparent);
}

.table-modern {
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(46, 125, 50, 0.1);
}

.table-modern thead {
    background: linear-gradient(135deg, var(--bg-light), #ffffff);
}

.table-modern th {
    padding: 20px 15px;
    font-weight: 700;
    color: var(--primary-green);
    border: none;
    position: relative;
}

.table-modern th::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--primary-green), var(--light-green));
}

.table-modern td {
    padding: 20px 15px;
    border: none;
    border-bottom: 1px solid #f0f0f0;
    vertical-align: middle;
    transition: all 0.3s ease;
}

.table-modern tbody tr {
    transition: all 0.3s ease;
}

.table-modern tbody tr:hover {
    background: var(--bg-light);
    transform: scale(1.01);
}

.table-modern tbody tr:last-child td {
    border-bottom: none;
}

.status-badge {
    padding: 8px 16px;
    border-radius: 25px;
    font-weight: 600;
    font-size: 0.9rem;
    text-align: center;
    display: inline-block;
    min-width: 80px;
    position: relative;
    overflow: hidden;
}

.status-badge::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.5s;
}

.status-badge:hover::before {
    left: 100%;
}

.status-belum {
    background: linear-gradient(135deg, #ffebee, #ffcdd2);
    color: #c62828;
    border: 1px solid #ffcdd2;
}

.status-lunas {
    background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
    color: #2e7d32;
    border: 1px solid #c8e6c9;
}

.status-proses {
    background: linear-gradient(135deg, #fffde7, #fff9c4);
    color: #f9a825;
    border: 1px solid #fff9c4;
}

.price-text {
    font-weight: 700;
    color: var(--primary-green);
    font-size: 1.1rem;
}

.date-text {
    color: var(--text-dark);
    font-weight: 500;
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #666;
}

.empty-state i {
    font-size: 4rem;
    color: var(--accent-green);
    margin-bottom: 20px;
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
    .table-container {
        padding: 20px;
        margin: 0 -15px 30px;
        border-radius: 0;
    }
    .table-modern {
        font-size: 0.9rem;
    }
    .table-modern th,
    .table-modern td {
        padding: 12px 8px;
    }
}
</style>

<div class="page-header">
    <div class="container text-center">
        <h1 class="page-title">📋 Riwayat Pemesanan</h1>
        <p class="page-subtitle">Pantau semua aktivitas pemesanan wisata dan homestay Anda</p>
    </div>
</div>

<div class="container">
    <!-- Riwayat Wisata -->
    <div class="table-container" style="animation-delay: 0.1s">
        <h3 class="section-title">
            <i class="fas fa-mountain"></i>
            Riwayat Pemesanan Wisata
        </h3>
        
        <?php if (!empty($wisata)): ?>
            <div class="table-responsive">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th><i class="fas fa-tag me-2"></i>Paket Wisata</th>
                            <th><i class="fas fa-calendar me-2"></i>Tanggal</th>
                            <th><i class="fas fa-users me-2"></i>Jumlah Orang</th>
                            <th><i class="fas fa-money-bill me-2"></i>Total Bayar</th>
                        
                            <th><i class="fas fa-credit-card me-2"></i>Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($wisata as $w): ?>
                            <tr>
                                <td class="fw-bold"><?= esc($w['nama_paket']) ?></td>
                                <td class="date-text"><?= date('d M Y', strtotime($w['tanggal'])) ?></td>
                                <td><?= esc($w['jumlah_orang']) ?> orang</td>
                                <td class="price-text">Rp <?= number_format($w['total_bayar'], 0, ',', '.') ?></td>
                              
                                <td>
                                    <span class="status-badge <?= ($w['status_bayar'] ?? '') == 'Dikonfirmasi' ? 'status-lunas' : 'status-belum' ?>">
                                        <?= esc($w['status_bayar'] ?? 'Belum Bayar') ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <i class="fas fa-mountain"></i>
                <h4>Belum Ada Pemesanan Wisata</h4>
                <p>Anda belum melakukan pemesanan paket wisata apapun.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Riwayat Homestay -->
    <div class="table-container" style="animation-delay: 0.2s">
        <h3 class="section-title">
            <i class="fas fa-home"></i>
            Riwayat Pemesanan Homestay
        </h3>
        
        <?php if (!empty($homestay)): ?>
            <div class="table-responsive">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th><i class="fas fa-home me-2"></i>Homestay</th>
                            <th><i class="fas fa-calendar-alt me-2"></i>Periode</th>
                            <th><i class="fas fa-users me-2"></i>Jumlah Orang</th>
                            <th><i class="fas fa-money-bill me-2"></i>Total Bayar</th>
                      
                            <th><i class="fas fa-credit-card me-2"></i>Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($homestay as $h): ?>
                            <tr>
                                <td class="fw-bold"><?= esc($h['nama_homestay']) ?></td>
                                <td class="date-text">
                                    <?= date('d M', strtotime($h['tanggal_mulai'])) ?> - 
                                    <?= date('d M Y', strtotime($h['tanggal_selesai'])) ?>
                                </td>
                                <td><?= esc($h['jumlah_orang']) ?> orang</td>
                                <td class="price-text">Rp <?= number_format($h['total_bayar'], 0, ',', '.') ?></td>
                               
                                <td>
                                    <span class="status-badge <?= ($h['status_bayar'] ?? '') == 'Diterima' ? 'status-lunas' : 'status-belum' ?>">
                                        <?= esc($h['status_bayar'] ?? 'Belum Bayar') ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <i class="fas fa-home"></i>
                <h4>Belum Ada Pemesanan Homestay</h4>
                <p>Anda belum melakukan pemesanan homestay apapun.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->include('layout/footer') ?>
