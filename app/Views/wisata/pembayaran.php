<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<style>
    .payment-container {
        background: linear-gradient(to right, #ffffff, #e0f7fa);
        border-radius: 15px;
        padding: 35px;
        max-width: 650px;
        margin: 40px auto;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
    }

    .form-label {
        font-weight: 600;
    }

    .info-payment p {
        margin-bottom: 6px;
    }

    .btn-kirim {
        font-size: 1.1rem;
        padding: 12px;
        border-radius: 50px;
    }
</style>

<div class="container">
    <div class="payment-container">
        <h3 class="text-center text-primary mb-4">💰 Konfirmasi Pembayaran</h3>

        <div class="info-payment mb-3">
            <p>📦 <strong>Nama Paket:</strong> <?= esc($pemesanan['nama_paket']) ?></p>
            <p>📅 <strong>Tanggal Kunjungan:</strong> <?= esc($pemesanan['tanggal']) ?></p>
            <p>💵 <strong>Total Bayar:</strong> Rp <?= number_format($pemesanan['total_bayar'], 0, ',', '.') ?></p>
        </div>

        <form action="<?= base_url('member/simpan-pembayaran') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="id_pemesanan" value="<?= $pemesanan['id_pemesanan'] ?>">

            <div class="mb-3">
                <label for="metode" class="form-label">Metode Pembayaran</label>
                <select name="metode" class="form-select" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="QRIS">QRIS</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="bukti" class="form-label">Upload Bukti Pembayaran (jpg/png/pdf)</label>
                <input type="file" name="bukti" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-outline-success btn-kirim w-100">📤 Kirim Bukti Pembayaran</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>