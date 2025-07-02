<?= $this->include('layout/header') ?>

<style>
    .search-bar {
        max-width: 500px;
        margin: 20px auto;
    }

    .search-bar input {
        border-radius: 30px 0 0 30px;
    }

    .search-bar button {
        border-radius: 0 30px 30px 0;
    }

    .card:hover {
        transform: translateY(-5px);
        transition: 0.3s ease;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
</style>

<div class="container mt-4">
    <h2 class="text-center mb-4">🧭 Daftar Paket Wisata</h2>

    <!-- Form Pencarian -->
    <form action="<?= base_url('wisata/search') ?>" method="get" class="search-bar d-flex justify-content-center">
        <input type="text" name="q" class="form-control" placeholder="Cari wisata..." required>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <div class="row mt-4">
        <?php foreach ($pakets as $paket): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="<?= base_url('uploads/paket/' . $paket['gambar']) ?>" class="card-img-top" alt="<?= esc($paket['nama_paket']) ?>">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= esc($paket['nama_paket']) ?></h5>
                        <p class="card-text text-muted"><?= character_limiter(strip_tags($paket['deskripsi']), 100) ?></p>
                        <p class="card-text mt-auto"><strong class="text-success">Rp <?= number_format($paket['harga'], 0, ',', '.') ?></strong></p>

                        <a href="<?= session()->get('logged_in') ? base_url('member/pesan/wisata/' . $paket['id_paket']) : base_url('login') ?>" class="btn btn-outline-success w-100 mt-2">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->include('layout/footer') ?>