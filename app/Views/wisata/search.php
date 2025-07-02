<?= $this->include('layout/header') ?>

<style>
    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .card:hover {
        transform: translateY(-5px);
        transition: 0.3s ease;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .back-btn {
        display: inline-block;
        margin-top: 20px;
    }
</style>

<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">🔎 Hasil Pencarian Paket Wisata</h2>

    <?php if (empty($pakets)): ?>
        <div class="alert alert-warning text-center">
            <p><em>Tidak ditemukan hasil untuk pencarian Anda.</em></p>
            <a href="<?= site_url('wisata') ?>" class="btn btn-outline-secondary mt-3">← Kembali ke Daftar Wisata</a>
        </div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($pakets as $paket): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="<?= base_url('uploads/paket/' . $paket['gambar']) ?>" class="card-img-top" alt="<?= esc($paket['nama_paket']) ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= esc($paket['nama_paket']) ?></h5>
                            <p class="card-text text-muted"><?= character_limiter(strip_tags($paket['deskripsi']), 100) ?></p>

                            <a href="<?= session()->get('logged_in') ? base_url('member/pesan/wisata/' . $paket['id_paket']) : base_url('login') ?>" class="btn btn-outline-success mt-auto">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center">
            <a href="<?= site_url('wisata') ?>" class="btn btn-secondary back-btn">← Kembali ke Daftar Wisata</a>
        </div>
    <?php endif; ?>
</div>

<?= $this->include('layout/footer') ?>