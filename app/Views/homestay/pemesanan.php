<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>

<style>
    .form-container {
        background: linear-gradient(to right, #ffffff, #e0f2f1);
        border-radius: 15px;
        padding: 35px;
        max-width: 700px;
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

    #total_bayar_display {
        background-color: #f0f4f7;
        font-weight: bold;
        color: #2e7d32;
    }

    .btn-custom {
        font-size: 1.1rem;
        padding: 10px;
        border-radius: 50px;
    }
</style>

<div class="container my-5">
    <div class="form-container">
        <h2 class="form-title">🛌 Pemesanan Homestay: <?= esc($homestay['nama_homestay']) ?></h2>

        <form action="<?= base_url('member/simpan-pesanan-homestay') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="id_homestay" value="<?= esc($homestay['id_homestay']) ?>">

            <div class="mb-3">
                <label class="form-label">Nama Homestay</label>
                <input type="text" class="form-control" value="<?= esc($homestay['nama_homestay']) ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga per Malam</label>
                <input type="text" id="harga" class="form-control" value="<?= 'Rp ' . number_format($homestay['harga_per_malam'], 0, ',', '.') ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="tanggal_checkin" class="form-label">Tanggal Check-in</label>
                <input type="date" name="tanggal_mulai" id="tanggal_checkin" class="form-control" min="<?= date('Y-m-d') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Malam</label>
                <input type="number" id="malam" name="jumlah_malam" class="form-control" min="1" placeholder="Masukkan jumlah malam" required oninput="hitungTotal()">
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Orang</label>
                <input type="number" name="jumlah_orang" class="form-control" min="1" placeholder="Masukkan jumlah orang" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Total Bayar</label>
                <input type="text" id="total_bayar_display" class="form-control" readonly placeholder="Rp 0">
                <input type="hidden" name="total_bayar" id="total_bayar">
                <small class="form-text text-muted">Total = harga x jumlah malam</small>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-outline-primary btn-custom">💳 Pesan Sekarang</button>
                <a href="<?= base_url('homestay') ?>" class="btn btn-secondary btn-custom">← Kembali ke Daftar Homestay</a>
            </div>
        </form>
    </div>
</div>

<script>
    function hitungTotal() {
        const harga = <?= $homestay['harga_per_malam'] ?>;
        const malam = parseInt(document.getElementById('malam').value) || 0;
        const total = harga * malam;

        document.getElementById('total_bayar_display').value = 'Rp ' + total.toLocaleString('id-ID');
        document.getElementById('total_bayar').value = total;
    }
</script>

<?= $this->endSection(); ?>