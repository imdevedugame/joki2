<?= $this->include('layout/header') ?>

<style>
    .card-img-top {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .homestay-card:hover {
        transform: translateY(-4px);
        transition: 0.3s ease;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-weight: 600;
        color: #00796b;
    }

    .card-text.price {
        font-size: 1.1rem;
        color: #2e7d32;
        font-weight: bold;
    }

    .no-result {
        background: #fff3cd;
        padding: 20px;
        border-radius: 8px;
        color: #856404;
    }
</style>

<div class="container my-5">
    <h2 class="mb-4 text-center text-primary">🔍 Hasil Pencarian Homestay</h2>

    <?php if (empty($homestays)) : ?>
        <div class="no-result text-center mb-4">
            <p><strong>Ups!</strong> Tidak ditemukan homestay sesuai pencarian Anda.</p>
            <a href="<?= site_url('homestay') ?>" class="btn btn-outline-secondary mt-3" aria-label="Kembali ke Daftar Homestay">← Kembali ke Daftar Homestay</a>
        </div>
    <?php else : ?>
        <div class="row">
            <?php foreach ($homestays as $h) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card homestay-card h-100">
                        <img src="<?= base_url('assets/images/' . $h['gambar']) ?>" class="card-img-top" alt="<?= esc($h['nama_homestay']) ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= esc($h['nama_homestay']) ?></h5>
                            <p class="card-text"><?= character_limiter(strip_tags($h['deskripsi']), 100) ?></p>
                            <p class="card-text price">Rp <?= number_format($h['harga_per_malam'], 0, ',', '.') ?>/malam</p>
                            <a href="<?= base_url('member/pesan/homestay/' . $h['id_homestay']) ?>" class="btn btn-outline-success w-100 mt-auto" aria-label="Lihat detail homestay <?= esc($h['nama_homestay']) ?>">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-4">
            <a href="<?= site_url('homestay') ?>" class="btn btn-secondary" aria-label="Kembali ke Daftar Homestay">← Kembali ke Daftar Homestay</a>
        </div>
    <?php endif; ?>
</div>

<?= $this->include('layout/footer') ?>