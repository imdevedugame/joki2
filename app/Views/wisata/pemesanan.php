<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>

<style>
    .form-container {
        background: linear-gradient(to right, #ffffff, #e3f2fd);
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        max-width: 650px;
        margin: 0 auto;
        transition: all 0.3s ease-in-out;
    }

    .form-label {
        font-weight: 600;
        color: #333;
    }

    #total_bayar {
        background-color: #f0f4f7;
        font-weight: bold;
        color: #2e7d32;
    }

    .form-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #00695c;
    }

    .btn-pesan {
        font-size: 1.1rem;
        font-weight: 500;
        padding: 12px;
        border-radius: 50px;
    }

    .form-container:hover {
        transform: translateY(-3px);
    }
</style>

<div class="container my-5">
    <div class="form-container">
        <h2 class="text-center mb-4 form-title">📝 Form Pemesanan Paket</h2>
        <p class="text-center text-muted mb-4">Paket yang dipilih: <strong><?= esc($paket['nama_paket']) ?></strong><br>
            Harga per orang: <strong>Rp <?= number_format($paket['harga'], 0, ',', '.') ?></strong></p>

        <form action="<?= site_url('member/simpan-pesanan') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Kunjungan</label>
                <input type="date" class="form-control" name="tanggal" min="<?= date('Y-m-d') ?>" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_orang" class="form-label">Jumlah Orang</label>
                <input type="number" class="form-control" name="jumlah_orang" min="1" placeholder="Masukkan jumlah orang" required>
            </div>

            <div class="mb-3">
                <label for="total_bayar" class="form-label">Total Bayar</label>
                <input type="text" class="form-control" id="total_bayar" name="total_bayar" readonly placeholder="Rp 0">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-outline-success btn-pesan w-100">💳 Pesan Sekarang</button>
            </div>
        </form>
    </div>
</div>

<script>
    const hargaPerOrang = <?= $paket['harga'] ?>;
    const jumlahOrangInput = document.querySelector('input[name="jumlah_orang"]');
    const totalBayarInput = document.querySelector('#total_bayar');

    jumlahOrangInput.addEventListener('input', function() {
        const jumlah = parseInt(this.value) || 0;
        const total = jumlah * hargaPerOrang;
        totalBayarInput.value = 'Rp ' + total.toLocaleString('id-ID');
    });
</script>

<?= $this->endSection(); ?>