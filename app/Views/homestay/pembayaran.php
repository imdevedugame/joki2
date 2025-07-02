<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<style>
    .payment-container {
        background: linear-gradient(to right, #ffffff, #e0f2f1);
        border-radius: 15px;
        padding: 35px;
        max-width: 650px;
        margin: 40px auto;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .form-title {
        text-align: center;
        margin-bottom: 25px;
        color: #00695c;
        font-weight: 700;
    }

    .form-label {
        font-weight: 600;
    }

    .btn-custom {
        font-size: 1.1rem;
        padding: 10px;
        border-radius: 50px;
    }

    .info-payment p {
        margin-bottom: 6px;
    }
</style>

<div class="container my-5">
    <div class="payment-container">
        <h2 class="form-title">💳 Pembayaran Homestay</h2>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif ?>

        <div class="info-payment mb-3">
            <p>🏠 <strong>Homestay:</strong> <?= esc($pemesanan['nama_homestay']) ?></p>
            <p>📅 <strong>Tanggal Menginap:</strong> <?= esc($pemesanan['tanggal_mulai']) ?> s.d. <?= esc($pemesanan['tanggal_selesai']) ?></p>
            <p>👥 <strong>Jumlah Orang:</strong> <?= esc($pemesanan['jumlah_orang']) ?></p>
            <p>💵 <strong>Total Bayar:</strong> Rp <?= number_format($pemesanan['total_bayar'], 0, ',', '.') ?></p>
        </div>

        <form action="<?= base_url('member/simpan_pembayaran_homestay') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="id_pemesanan" value="<?= esc($pemesanan['id_pemesanan_homestay']) ?>">

            <div class="mb-3">
                <label for="metode" class="form-label">Metode Pembayaran</label>
                <select name="metode" id="metode" class="form-select" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="E-Wallet">E-Wallet</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="bukti" class="form-label">Upload Bukti Pembayaran (jpg/png/pdf)</label>
                <input type="file" name="bukti" id="bukti" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-outline-success btn-custom">📤 Kirim Pembayaran</button>
                <a href="<?= base_url('homestay') ?>" class="btn btn-secondary btn-custom">← Kembali ke Homestay</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>