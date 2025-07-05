<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>

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

.form-wrapper {
    background: white;
    border-radius: 25px;
    overflow: hidden;
    box-shadow: var(--shadow);
    position: relative;
    animation: slideInUp 0.8s ease-out;
}

.form-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 6px;
    background: linear-gradient(90deg, var(--primary-green), var(--light-green));
}

.form-header {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 30px 40px;
    border-bottom: 1px solid #e9ecef;
}

.homestay-info {
    background: linear-gradient(135deg, var(--bg-light), #e8f5e8);
    border-radius: 15px;
    padding: 25px;
    border-left: 5px solid var(--primary-green);
    margin: 0;
}

.homestay-info h4 {
    color: var(--primary-green);
    font-weight: 700;
    margin-bottom: 15px;
    font-size: 1.4rem;
}

.homestay-info h4 i {
    margin-right: 12px;
    font-size: 1.2rem;
}

.homestay-info .info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
    margin-top: 15px;
}

.info-item {
    display: flex;
    align-items: center;
    padding: 10px 0;
}

.info-item i {
    color: var(--primary-green);
    margin-right: 10px;
    width: 20px;
    text-align: center;
}

.form-container {
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

.form-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    margin-bottom: 25px;
}

.form-group {
    display: flex;
    flex-direction: column;
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

.form-control {
    border: 2px solid #e0e0e0;
    border-radius: 12px;
    padding: 14px 18px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #fafafa;
}

.form-control:focus {
    border-color: var(--primary-green);
    box-shadow: 0 0 0 0.2rem rgba(46, 125, 50, 0.15);
    background: white;
    outline: none;
}

.form-control[readonly] {
    background: linear-gradient(135deg, var(--bg-light), #e8f5e8);
    color: var(--text-dark);
    font-weight: 500;
}

.form-control::placeholder {
    color: #999;
    font-style: italic;
}

#total_bayar_display {
    background: linear-gradient(135deg, var(--bg-light), #e8f5e8);
    font-weight: bold;
    color: var(--primary-green);
    font-size: 1.2rem;
    text-align: center;
    border: 2px solid var(--accent-green);
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

.total-section {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border-radius: 15px;
    padding: 25px;
    margin: 30px 0;
    border: 2px solid var(--accent-green);
}

.total-section .section-title {
    margin-bottom: 15px;
    border-bottom: none;
    color: var(--primary-green);
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

.btn-primary {
    background: linear-gradient(135deg, var(--primary-green), var(--light-green));
    color: white;
}

.btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-primary:hover::before {
    left: 100%;
}

.btn-primary:hover {
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
    
    .form-container {
        padding: 25px;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 20px;
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
            <i class="fas fa-bed"></i>Pemesanan Homestay
        </h1>
        <p class="page-subtitle">Lengkapi formulir di bawah untuk melakukan pemesanan homestay</p>
    </div>
</div>

<div class="container my-5">
    <div class="main-container">
        <div class="form-wrapper">
            <!-- Form Header -->
            <div class="form-header">
                <div class="homestay-info">
                    <h4><i class="fas fa-house-user"></i><?= esc($homestay['nama_homestay']) ?></h4>
                    <div class="info-grid">
                        <div class="info-item">
                            <i class="fas fa-money-bill-wave"></i>
                            <span><strong>Harga per Malam:</strong> Rp <?= number_format($homestay['harga_per_malam'], 0, ',', '.') ?></span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-star"></i>
                            <span><strong>Rating:</strong> 4.5/5 (Excellent)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <div class="form-container">
                <form action="<?= base_url('member/simpan-pesanan-homestay') ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_homestay" value="<?= esc($homestay['id_homestay']) ?>">

                    <!-- Informasi Homestay Section -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-info-circle"></i>Informasi Homestay
                        </h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-house-user"></i>Nama Homestay
                                </label>
                                <input type="text" class="form-control" value="<?= esc($homestay['nama_homestay']) ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-money-bill-wave"></i>Harga per Malam
                                </label>
                                <input type="text" id="harga" class="form-control" value="<?= 'Rp ' . number_format($homestay['harga_per_malam'], 0, ',', '.') ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Pemesanan Section -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-calendar-check"></i>Detail Pemesanan
                        </h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="tanggal_checkin" class="form-label">
                                    <i class="fas fa-calendar-alt"></i>Tanggal Check-in<span class="required">*</span>
                                </label>
                                <input type="date" name="tanggal_mulai" id="tanggal_checkin" class="form-control" min="<?= date('Y-m-d') ?>" required>
                                <small class="form-help">
                                    <i class="fas fa-info-circle"></i>Pilih tanggal kedatangan Anda
                                </small>
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-moon"></i>Jumlah Malam<span class="required">*</span>
                                </label>
                                <input type="number" id="malam" name="jumlah_malam" class="form-control" min="1" max="30" placeholder="Contoh: 2" required oninput="hitungTotal()">
                                <small class="form-help">
                                    <i class="fas fa-info-circle"></i>Berapa malam Anda akan menginap?
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-users"></i>Jumlah Orang<span class="required">*</span>
                                </label>
                                <input type="number" name="jumlah_orang" class="form-control" min="1" max="10" placeholder="Contoh: 4" required>
                                <small class="form-help">
                                    <i class="fas fa-info-circle"></i>Total tamu yang akan menginap
                                </small>
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-clock"></i>Estimasi Check-out
                                </label>
                                <input type="text" id="checkout_display" class="form-control" readonly placeholder="Akan dihitung otomatis">
                                <small class="form-help">
                                    <i class="fas fa-info-circle"></i>Berdasarkan check-in + jumlah malam
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Total Pembayaran Section -->
                    <div class="total-section">
                        <h3 class="section-title">
                            <i class="fas fa-calculator"></i>Ringkasan Pembayaran
                        </h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-dollar-sign"></i>Total Bayar
                                </label>
                                <input type="text" id="total_bayar_display" class="form-control" readonly placeholder="Rp 0">
                                <input type="hidden" name="total_bayar" id="total_bayar">
                                <small class="form-help">
                                    <i class="fas fa-lightbulb"></i>Total = Harga per Malam × Jumlah Malam
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Button Section -->
                    <div class="button-section">
                        <div class="btn-group">
                            <button type="submit" class="btn-custom btn-primary">
                                <i class="fas fa-credit-card"></i>Pesan Sekarang
                            </button>
                            <a href="<?= base_url('homestay') ?>" class="btn-custom btn-secondary">
                                <i class="fas fa-arrow-left"></i>Kembali ke Daftar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function hitungTotal() {
    const harga = <?= $homestay['harga_per_malam'] ?>;
    const malam = parseInt(document.getElementById('malam').value) || 0;
    const total = harga * malam;
    
    // Update total bayar
    document.getElementById('total_bayar_display').value = 'Rp ' + total.toLocaleString('id-ID');
    document.getElementById('total_bayar').value = total;
    
    // Update checkout date
    const checkinInput = document.getElementById('tanggal_checkin');
    const checkoutDisplay = document.getElementById('checkout_display');
    
    if (checkinInput.value && malam > 0) {
        const checkinDate = new Date(checkinInput.value);
        const checkoutDate = new Date(checkinDate);
        checkoutDate.setDate(checkoutDate.getDate() + malam);
        
        const options = { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            weekday: 'long'
        };
        checkoutDisplay.value = checkoutDate.toLocaleDateString('id-ID', options);
    }
}

// Update checkout date when check-in date changes
document.getElementById('tanggal_checkin').addEventListener('change', hitungTotal);
</script>

<?= $this->endSection(); ?>
