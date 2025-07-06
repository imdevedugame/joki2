<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<style>
:root {
    --primary-green: #2e7d32;
    --light-green: #4caf50;
    --dark-green: #1b5e20;
    --accent-green: #81c784;
    --bg-light: #f1f8e9;
    --text-dark: #2c3e50;
    --shadow: 0 8px 32px rgba(46, 125, 50, 0.1);
    --shadow-light: 0 4px 16px rgba(46, 125, 50, 0.08);
    --success-green: #28a745;
    --warning-orange: #fd7e14;
    --danger-red: #dc3545;
    --info-blue: #17a2b8;
}

body {
    background: linear-gradient(135deg, var(--bg-light), #e8f5e8);
    min-height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.page-header {
    background: linear-gradient(135deg, var(--primary-green), var(--light-green));
    color: white;
    padding: 50px 0;
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
    font-size: 2.8rem;
    font-weight: 800;
    margin: 0;
    position: relative;
    z-index: 1;
    text-align: center;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.page-title i {
    margin-right: 15px;
    color: rgba(255, 255, 255, 0.9);
}

.page-subtitle {
    font-size: 1.1rem;
    margin-top: 10px;
    opacity: 0.9;
    position: relative;
    z-index: 1;
    text-align: center;
}

.main-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.section-wrapper {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow);
    margin-bottom: 40px;
    position: relative;
    animation: fadeInUp 0.6s ease-out;
}

.section-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-green), var(--light-green));
}

.section-header {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 25px 30px;
    border-bottom: 1px solid #e9ecef;
}

.section-title {
    color: var(--text-dark);
    font-size: 1.4rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
}

.section-title i {
    color: var(--primary-green);
    margin-right: 12px;
    font-size: 1.3rem;
}

.table-container {
    padding: 0;
    overflow-x: auto;
}

.custom-table {
    width: 100%;
    margin: 0;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 0.95rem;
}

.custom-table thead th {
    background: linear-gradient(135deg, var(--primary-green), var(--light-green));
    color: white;
    font-weight: 600;
    padding: 15px 12px;
    text-align: center;
    border: none;
    font-size: 0.9rem;
    white-space: nowrap;
}

.custom-table thead th:first-child {
    border-top-left-radius: 0;
}

.custom-table thead th:last-child {
    border-top-right-radius: 0;
}

.custom-table tbody td {
    padding: 15px 12px;
    border-bottom: 1px solid #e9ecef;
    vertical-align: middle;
    text-align: center;
}

.custom-table tbody tr {
    transition: all 0.3s ease;
}

.custom-table tbody tr:hover {
    background: var(--bg-light);
    transform: scale(1.01);
}

.custom-table tbody tr:last-child td {
    border-bottom: none;
}

/* Status Badges */
.status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    min-width: 120px;
    justify-content: center;
}

.status-badge i {
    font-size: 0.75rem;
}

/* Status Colors */
.status-confirmed {
    background: linear-gradient(135deg, var(--success-green), #20c997);
    color: white;
}

.status-pending {
    background: linear-gradient(135deg, var(--warning-orange), #ffc107);
    color: white;
}

.status-waiting-payment {
    background: linear-gradient(135deg, var(--info-blue), #6f42c1);
    color: white;
}

.status-cancelled {
    background: linear-gradient(135deg, var(--danger-red), #e83e8c);
    color: white;
}

.status-completed {
    background: linear-gradient(135deg, var(--success-green), var(--light-green));
    color: white;
}

/* Payment Status */
.payment-badge {
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.75rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

.payment-verified {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.payment-pending {
    background: #fff3cd;
    color: #856404;
    border: 1px solid #ffeaa7;
}

.payment-none {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

/* Action Buttons */
.btn-action {
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    border: none;
    cursor: pointer;
}

.btn-pay {
    background: linear-gradient(135deg, var(--success-green), var(--light-green));
    color: white;
}

.btn-pay:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(40, 167, 69, 0.3);
    color: white;
    text-decoration: none;
}

.btn-view {
    background: linear-gradient(135deg, var(--info-blue), #20c997);
    color: white;
}

.btn-view:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(23, 162, 184, 0.3);
    color: white;
    text-decoration: none;
}

.completed-icon {
    color: var(--success-green);
    font-size: 1.2rem;
}

/* Price Formatting */
.price-cell {
    font-weight: 700;
    color: var(--primary-green);
    font-size: 1rem;
}

/* Navigation Buttons */
.navigation-section {
    background: white;
    border-radius: 15px;
    padding: 25px;
    box-shadow: var(--shadow-light);
    text-align: center;
    margin-top: 30px;
}

.nav-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-nav {
    background: linear-gradient(135deg, var(--primary-green), var(--light-green));
    color: white;
    text-decoration: none;
    padding: 12px 25px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    position: relative;
    overflow: hidden;
}

.btn-nav.secondary {
    background: #6c757d;
}

.btn-nav.secondary:hover {
    background: #5a6268;
}

.btn-nav::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-nav:hover::before {
    left: 100%;
}

.btn-nav:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(46, 125, 50, 0.3);
    color: white;
    text-decoration: none;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px 30px;
    color: #6c757d;
}

.empty-state i {
    font-size: 4rem;
    color: var(--accent-green);
    margin-bottom: 20px;
}

.empty-state h4 {
    color: var(--text-dark);
    margin-bottom: 10px;
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
    
    .custom-table {
        font-size: 0.8rem;
    }
    
    .custom-table thead th,
    .custom-table tbody td {
        padding: 10px 8px;
    }
    
    .nav-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-nav {
        width: 100%;
        max-width: 250px;
        justify-content: center;
    }
}
</style>

<div class="page-header">
    <div class="container">
        <h1 class="page-title">
            <i class="fas fa-history"></i>Riwayat Pemesanan
        </h1>
        <p class="page-subtitle">Kelola dan pantau semua pemesanan wisata dan homestay Anda</p>
    </div>
</div>

<div class="container my-5">
    <div class="main-container">
        
        <!-- Riwayat Paket Wisata -->
        <div class="section-wrapper">
            <div class="section-header">
                <h3 class="section-title">
                    <i class="fas fa-map-marked-alt"></i>Riwayat Pemesanan Paket Wisata
                </h3>
            </div>
            <div class="table-container">
                <?php if (!empty($riwayat)): ?>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-box"></i> Paket</th>
                            <th><i class="fas fa-calendar-alt"></i> Tanggal</th>
                            <th><i class="fas fa-users"></i> Peserta</th>
                            <th><i class="fas fa-money-bill-wave"></i> Total</th>
                            <th><i class="fas fa-clipboard-check"></i> Status</th>
                            <th><i class="fas fa-credit-card"></i> Pembayaran</th>
                            <th><i class="fas fa-wallet"></i> Metode</th>
                            <th><i class="fas fa-receipt"></i> Bukti</th>
                            <th><i class="fas fa-cogs"></i> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($riwayat as $row) : ?>
                        <tr>
                            <td style="text-align: left; font-weight: 600;">
                                <?= esc($row['nama_paket']) ?>
                            </td>
                            <td>
                                <?php 
                                $date = new DateTime($row['tanggal']);
                                echo $date->format('d M Y');
                                ?>
                            </td>
                            <td>
                                <i class="fas fa-user"></i> <?= esc($row['jumlah_orang']) ?>
                            </td>
                            <td class="price-cell">
                                Rp <?= number_format($row['total_bayar'], 0, ',', '.') ?>
                            </td>
                            <td>
                                <?php 
                                $status = $row['status'];
                                $statusClass = '';
                                $statusIcon = '';
                                
                                if ($status == 'Dikonfirmasi' || $status == 'Selesai') {
                                    $statusClass = 'status-confirmed';
                                    $statusIcon = 'fas fa-check-circle';
                                } elseif ($status == 'Menunggu Pembayaran') {
                                    $statusClass = 'status-waiting-payment';
                                    $statusIcon = 'fas fa-clock';
                                } elseif ($status == 'Pending') {
                                    $statusClass = 'status-pending';
                                    $statusIcon = 'fas fa-hourglass-half';
                                } else {
                                    $statusClass = 'status-cancelled';
                                    $statusIcon = 'fas fa-times-circle';
                                }
                                ?>
                                <span class="status-badge <?= $statusClass ?>">
                                    <i class="<?= $statusIcon ?>"></i>
                                    <?= esc($status) ?>
                                </span>
                            </td>
                            <td>
                                <?php 
                                $paymentStatus = $row['status_bayar'] ?? 'Belum Bayar';
                                $paymentClass = '';
                                $paymentIcon = '';
                                
                                if ($paymentStatus == 'Terverifikasi') {
                                    $paymentClass = 'payment-verified';
                                    $paymentIcon = 'fas fa-check-circle';
                                } elseif ($paymentStatus == 'Menunggu Verifikasi') {
                                    $paymentClass = 'payment-pending';
                                    $paymentIcon = 'fas fa-clock';
                                } else {
                                    $paymentClass = 'payment-none';
                                    $paymentIcon = 'fas fa-times-circle';
                                }
                                ?>
                                <span class="payment-badge <?= $paymentClass ?>">
                                    <i class="<?= $paymentIcon ?>"></i>
                                    <?= esc($paymentStatus) ?>
                                </span>
                            </td>
                            <td>
                                <?php if (!empty($row['metode'])): ?>
                                    <i class="fas fa-credit-card"></i> <?= esc($row['metode']) ?>
                                <?php else: ?>
                                    <span style="color: #6c757d;">
                                        <i class="fas fa-minus"></i> Belum dipilih
                                    </span>
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if (!empty($row['bukti'])): ?>
                                    <a href="<?= base_url('uploads/bukti/' . $row['bukti']) ?>" 
                                       target="_blank" class="btn-action btn-view">
                                        <i class="fas fa-eye"></i>Lihat
                                    </a>
                                <?php else: ?>
                                    <span style="color: #6c757d;">
                                        <i class="fas fa-minus"></i>
                                    </span>
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if ($row['status'] == 'Menunggu Pembayaran') : ?>
                                    <a href="<?= base_url('member/pembayaran/' . $row['id_pemesanan']) ?>" 
                                       class="btn-action btn-pay">
                                        <i class="fas fa-credit-card"></i>Bayar
                                    </a>
                                <?php else : ?>
                                    <i class="completed-icon fas fa-check-circle" title="Selesai"></i>
                                <?php endif ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-map-marked-alt"></i>
                    <h4>Belum Ada Pemesanan Paket Wisata</h4>
                    <p>Anda belum melakukan pemesanan paket wisata. Jelajahi paket wisata menarik kami!</p>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Riwayat Homestay -->
        <div class="section-wrapper">
            <div class="section-header">
                <h3 class="section-title">
                    <i class="fas fa-home"></i>Riwayat Pemesanan Homestay
                </h3>
            </div>
            <div class="table-container">
                <?php if (!empty($homestay)): ?>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-home"></i> Homestay</th>
                            <th><i class="fas fa-calendar-check"></i> Check-in</th>
                            <th><i class="fas fa-moon"></i> Malam</th>
                            <th><i class="fas fa-users"></i> Tamu</th>
                            <th><i class="fas fa-money-bill-wave"></i> Total</th>
                            <th><i class="fas fa-clipboard-check"></i> Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($homestay as $row): ?>
                        <tr>
                            <td style="text-align: left; font-weight: 600;">
                                <?= esc($row['nama_homestay']) ?>
                            </td>
                            <td>
                                <?php 
                                $date = new DateTime($row['tanggal']);
                                echo $date->format('d M Y');
                                ?>
                            </td>
                            <td>
                                <i class="fas fa-bed"></i> <?= esc($row['jumlah_malam']) ?>
                            </td>
                            <td>
                                <i class="fas fa-user"></i> <?= esc($row['jumlah_orang']) ?>
                            </td>
                            <td class="price-cell">
                                Rp <?= number_format($row['total_bayar'], 0, ',', '.') ?>
                            </td>
                            <td>
                                <?php 
                                $status = $row['status'];
                                $statusClass = '';
                                $statusIcon = '';
                                
                                if ($status == 'Dikonfirmasi' || $status == 'Selesai') {
                                    $statusClass = 'status-confirmed';
                                    $statusIcon = 'fas fa-check-circle';
                                } elseif ($status == 'Menunggu Pembayaran') {
                                    $statusClass = 'status-waiting-payment';
                                    $statusIcon = 'fas fa-clock';
                                } elseif ($status == 'Pending') {
                                    $statusClass = 'status-pending';
                                    $statusIcon = 'fas fa-hourglass-half';
                                } else {
                                    $statusClass = 'status-cancelled';
                                    $statusIcon = 'fas fa-times-circle';
                                }
                                ?>
                                <span class="status-badge <?= $statusClass ?>">
                                    <i class="<?= $statusIcon ?>"></i>
                                    <?= esc($status) ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-home"></i>
                    <h4>Belum Ada Pemesanan Homestay</h4>
                    <p>Anda belum melakukan pemesanan homestay. Temukan homestay nyaman untuk menginap!</p>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Navigation -->
        <div class="navigation-section">
            <div class="nav-buttons">
                <a href="<?= base_url('/') ?>" class="btn-nav secondary">
                    <i class="fas fa-home"></i>Kembali ke Home
                </a>
                <a href="<?= base_url('wisata') ?>" class="btn-nav">
                    <i class="fas fa-map-marked-alt"></i>Lihat Paket Wisata
                </a>
                <a href="<?= base_url('homestay') ?>" class="btn-nav">
                    <i class="fas fa-bed"></i>Lihat Homestay
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
