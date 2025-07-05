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
    max-width: 900px;
    margin: 0 auto;
    padding: 0 20px;
}

.payment-wrapper {
    background: white;
    border-radius: 25px;
    overflow: hidden;
    box-shadow: var(--shadow);
    position: relative;
    animation: slideInUp 0.8s ease-out;
}

.payment-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 6px;
    background: linear-gradient(90deg, var(--primary-green), var(--light-green));
}

.alert-section {
    padding: 20px 40px 0;
}

.alert-danger {
    background: linear-gradient(135deg, #ffebee, #ffcdd2);
    border: 2px solid #f44336;
    border-radius: 12px;
    color: #c62828;
    padding: 15px 20px;
    margin-bottom: 0;
    display: flex;
    align-items: center;
}

.alert-danger i {
    margin-right: 10px;
    font-size: 1.1rem;
}

.payment-header {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 30px 40px;
    border-bottom: 1px solid #e9ecef;
}

.booking-info {
    background: linear-gradient(135deg, var(--bg-light), #e8f5e8);
    border-radius: 15px;
    padding: 25px;
    border-left: 5px solid var(--primary-green);
    margin: 0;
}

.booking-info h4 {
    color: var(--primary-green);
    font-weight: 700;
    margin-bottom: 20px;
    font-size: 1.4rem;
}

.booking-info h4 i {
    margin-right: 12px;
    font-size: 1.2rem;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 15px;
}

.info-item {
    display: flex;
    align-items: flex-start;
    padding: 12px 0;
    border-bottom: 1px solid rgba(46, 125, 50, 0.1);
}

.info-item:last-child {
    border-bottom: none;
}

.info-item i {
    color: var(--primary-green);
    margin-right: 12px;
    width: 20px;
    text-align: center;
    margin-top: 2px;
    flex-shrink: 0;
}

.info-content {
    flex: 1;
}

.info-label {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 2px;
}

.info-value {
    color: #666;
    font-size: 0.95rem;
}

.total-highlight {
    background: linear-gradient(135deg, #fff3e0, #ffe0b2);
    border-radius: 10px;
    padding: 15px;
    margin-top: 10px;
    border: 2px solid #ff9800;
}

.total-highlight .info-value {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--primary-green);
}

.payment-form {
    padding: 40px;
}

.form-section {
    margin-bottom: 35px;
}

.section-title {
    color: var(--text-dark);
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 20px;
    padding-bottom: 8px;
    border-bottom: 2px solid #e9ecef;
    display: flex;
    align-items: center;
}

.section-title i {
    color: var(--primary-green);
    margin-right: 10px;
    font-size: 1.1rem;
}

.form-group {
    margin-bottom: 25px;
}

.form-label {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 10px;
    font-size: 1rem;
    display: flex;
    align-items: center;
}

.form-label i {
    margin-right: 8px;
    color: var(--primary-green);
    font-size: 0.9rem;
}

.form-label .required {
    color: #dc3545;
    margin-left: 4px;
}

.form-control, .form-select {
    border: 2px solid #e0e0e0;
    border-radius: 12px;
    padding: 14px 18px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #fafafa;
    width: 100%;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-green);
    box-shadow: 0 0 0 0.2rem rgba(46, 125, 50, 0.15);
    background: white;
    outline: none;
}

.form-select {
    cursor: pointer;
}

.form-help {
    margin-top: 8px;
    font-size: 0.875rem;
    color: #6c757d;
    display: flex;
    align-items: center;
}

.form-help i {
    margin-right: 6px;
    color: var(--primary-green);
    font-size: 0.8rem;
}

.file-upload-area {
    border: 2px dashed #e0e0e0;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    background: #fafafa;
    transition: all 0.3s ease;
    position: relative;
}

.file-upload-area:hover {
    border-color: var(--primary-green);
    background: #f8f9fa;
}

.file-upload-area.dragover {
    border-color: var(--primary-green);
    background: var(--bg-light);
}

.file-upload-icon {
    font-size: 2rem;
    color: var(--primary-green);
    margin-bottom: 10px;
}

.file-upload-text {
    color: var(--text-dark);
    font-weight: 500;
    margin-bottom: 5px;
}

.file-upload-hint {
    color: #6c757d;
    font-size: 0.875rem;
}

.payment-methods {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-top: 10px;
}

.payment-method {
    border: 2px solid #e0e0e0;
    border-radius: 12px;
    padding: 15px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    background: #fafafa;
}

.payment-method:hover {
    border-color: var(--primary-green);
    background: var(--bg-light);
}

.payment-method.selected {
    border-color: var(--primary-green);
    background: var(--bg-light);
}

.payment-method i {
    font-size: 1.5rem;
    color: var(--primary-green);
    margin-bottom: 8px;
}

.button-section {
    background: #f8f9fa;
    padding: 30px 40px;
    border-top: 1px solid #e9ecef;
    margin: 0 -40px -40px -40px;
}

.btn-group {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
}

.btn-custom {
    padding: 16px 32px;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    border: none;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 50px;
}

.btn-custom i {
    margin-right: 10px;
    font-size: 1rem;
}

.btn-success {
    background: linear-gradient(135deg, var(--primary-green), var(--light-green));
    color: white;
}

.btn-success::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-success:hover::before {
    left: 100%;
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(46, 125, 50, 0.3);
    color: white;
    text-decoration: none;
}

.btn-secondary {
    background: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background: #5a6268;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(108, 117, 125, 0.3);
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

@media (max-width: 768px) {
    .page-title {
        font-size: 2.2rem;
    }
    
    .payment-form {
        padding: 25px;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
    }
    
    .payment-methods {
        grid-template-columns: 1fr;
    }
    
    .btn-group {
        grid-template-columns: 1fr;
    }
    
    .button-section {
        padding: 25px;
        margin: 0 -25px -25px -25px;
    }
}
</style>

<div class="page-header">
    <div class="container">
        <h1 class="page-title">
            <i class="fas fa-credit-card"></i>Pembayaran Homestay
        </h1>
        <p class="page-subtitle">Konfirmasi pembayaran untuk menyelesaikan pemesanan Anda</p>
    </div>
</div>

<div class="container my-5">
    <div class="main-container">
        <div class="payment-wrapper">
            <!-- Alert Section -->
            <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert-section">
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
            </div>
            <?php endif ?>

            <!-- Payment Header -->
            <div class="payment-header">
                <div class="booking-info">
                    <h4><i class="fas fa-clipboard-list"></i>Detail Pemesanan Homestay</h4>
                    <div class="info-grid">
                        <div class="info-item">
                            <i class="fas fa-house-user"></i>
                            <div class="info-content">
                                <div class="info-label">Nama Homestay</div>
                                <div class="info-value"><?= esc($pemesanan['nama_homestay']) ?></div>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-calendar-alt"></i>
                            <div class="info-content">
                                <div class="info-label">Periode Menginap</div>
                                <div class="info-value"><?= esc($pemesanan['tanggal_mulai']) ?> s.d. <?= esc($pemesanan['tanggal_selesai']) ?></div>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-users"></i>
                            <div class="info-content">
                                <div class="info-label">Jumlah Tamu</div>
                                <div class="info-value"><?= esc($pemesanan['jumlah_orang']) ?> Orang</div>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-moon"></i>
                            <div class="info-content">
                                <div class="info-label">Durasi Menginap</div>
                                <div class="info-value">
                                    <?php 
                                    $start = new DateTime($pemesanan['tanggal_mulai']);
                                    $end = new DateTime($pemesanan['tanggal_selesai']);
                                    $diff = $start->diff($end);
                                    echo $diff->days . ' Malam';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="total-highlight">
                        <div class="info-item">
                            <i class="fas fa-dollar-sign"></i>
                            <div class="info-content">
                                <div class="info-label">Total Pembayaran</div>
                                <div class="info-value">Rp <?= number_format($pemesanan['total_bayar'], 0, ',', '.') ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Form -->
            <div class="payment-form">
                <form action="<?= base_url('member/simpan_pembayaran_homestay') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_pemesanan" value="<?= esc($pemesanan['id_pemesanan_homestay']) ?>">

                    <!-- Metode Pembayaran Section -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-credit-card"></i>Pilih Metode Pembayaran
                        </h3>
                        <div class="form-group">
                            <label for="metode" class="form-label">
                                <i class="fas fa-wallet"></i>Metode Pembayaran<span class="required">*</span>
                            </label>
                            <select name="metode" id="metode" class="form-select" required>
                                <option value="">-- Pilih Metode Pembayaran --</option>
                                <option value="Transfer Bank">Transfer Bank</option>
                                <option value="E-Wallet">E-Wallet (OVO, GoPay, DANA)</option>
                            </select>
                            <small class="form-help">
                                <i class="fas fa-info-circle"></i>Pilih metode pembayaran yang Anda inginkan
                            </small>
                        </div>

                        <div class="payment-methods">
                            <div class="payment-method" onclick="selectPayment('Transfer Bank')">
                                <i class="fas fa-university"></i>
                                <div>Transfer Bank</div>
                                <small>BCA, Mandiri, BRI</small>
                            </div>
                            <div class="payment-method" onclick="selectPayment('E-Wallet')">
                                <i class="fas fa-mobile-alt"></i>
                                <div>E-Wallet</div>
                                <small>OVO, GoPay, DANA</small>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Bukti Section -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-upload"></i>Upload Bukti Pembayaran
                        </h3>
                        <div class="form-group">
                            <label for="bukti" class="form-label">
                                <i class="fas fa-file-upload"></i>Bukti Pembayaran<span class="required">*</span>
                            </label>
                            <div class="file-upload-area" onclick="document.getElementById('bukti').click()">
                                <div class="file-upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="file-upload-text">Klik untuk upload bukti pembayaran</div>
                                <div class="file-upload-hint">atau drag & drop file di sini</div>
                            </div>
                            <input type="file" name="bukti" id="bukti" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required style="display: none;">
                            <small class="form-help">
                                <i class="fas fa-info-circle"></i>Format yang didukung: JPG, PNG, atau PDF (Maksimal 2MB)
                            </small>
                        </div>
                    </div>

                    <!-- Button Section -->
                    <div class="button-section">
                        <div class="btn-group">
                            <button type="submit" class="btn-custom btn-success">
                                <i class="fas fa-paper-plane"></i>Kirim Pembayaran
                            </button>
                            <a href="<?= base_url('homestay') ?>" class="btn-custom btn-secondary">
                                <i class="fas fa-arrow-left"></i>Kembali ke Homestay
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function selectPayment(method) {
    document.getElementById('metode').value = method;
    
    // Remove selected class from all payment methods
    document.querySelectorAll('.payment-method').forEach(el => {
        el.classList.remove('selected');
    });
    
    // Add selected class to clicked method
    event.currentTarget.classList.add('selected');
}

// File upload handling
document.getElementById('bukti').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const uploadArea = document.querySelector('.file-upload-area');
    
    if (file) {
        uploadArea.innerHTML = `
            <div class="file-upload-icon">
                <i class="fas fa-check-circle" style="color: var(--primary-green);"></i>
            </div>
            <div class="file-upload-text">File terpilih: ${file.name}</div>
            <div class="file-upload-hint">Klik untuk mengganti file</div>
        `;
    }
});

// Drag and drop functionality
const uploadArea = document.querySelector('.file-upload-area');

uploadArea.addEventListener('dragover', function(e) {
    e.preventDefault();
    this.classList.add('dragover');
});

uploadArea.addEventListener('dragleave', function(e) {
    e.preventDefault();
    this.classList.remove('dragover');
});

uploadArea.addEventListener('drop', function(e) {
    e.preventDefault();
    this.classList.remove('dragover');
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        document.getElementById('bukti').files = files;
        document.getElementById('bukti').dispatchEvent(new Event('change'));
    }
});
</script>

<?= $this->endSection(); ?>
