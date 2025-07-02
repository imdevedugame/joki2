<?= $this->include('layout/header') ?>

<style>
    .card:hover {
        transform: translateY(-4px);
        transition: 0.3s ease;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .back-btn {
        max-width: 200px;
        margin: 30px auto 0 auto;
    }
</style>

<div class="container my-5">
    <h2 class="mb-4 text-center text-primary">🎥 Galeri Video Desa</h2>

    <div class="row">
        <?php foreach ($videos as $v): ?>
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= esc($v['judul']) ?></h5>
                        <div class="ratio ratio-16x9 mb-2">
                            <iframe src="<?= esc(str_replace('watch?v=', 'embed/', $v['url'])) ?>"
                                frameborder="0" allowfullscreen></iframe>
                        </div>
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