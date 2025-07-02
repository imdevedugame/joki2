<?= $this->include('layout/header') ?>

<style>
    .card-img-top {
        height: 250px;
        object-fit: cover;
    }

    .card:hover {
        transform: translateY(-5px);
        transition: 0.3s ease;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .back-btn {
        max-width: 200px;
        margin: 30px auto 0 auto;
    }
</style>

<div class="container mt-5">
    <h2 class="text-center mb-4 text-primary">📰 Berita Desa</h2>

    <div class="row">
        <?php foreach ($beritas as $b): ?>
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <img src="<?= base_url('uploads/berita/' . $b['gambar']) ?>" class="card-img-top" alt="<?= esc($b['judul']) ?>">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= esc($b['judul']) ?></h5>
                        <p class="card-text"><?= character_limiter(strip_tags($b['isi']), 150) ?></p>
                        <p class="text-muted mt-auto">🗓️ <?= date('d M Y', strtotime($b['created_at'])) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Tombol Kembali ke Home/Dashboard -->
    <div class="text-center back-btn">
        <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary w-100">← Kembali ke Home</a>
    </div>
</div>

<?= $this->include('layout/footer') ?>