<?= $this->include('layout/header') ?>

<style>
    .homestay-card:hover {
        transform: translateY(-5px);
        transition: 0.3s ease-in-out;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .search-form .form-control {
        border-radius: 10px;
    }

    .search-form .btn {
        border-radius: 10px;
    }

    .card-title {
        color: #00796b;
        font-weight: 600;
    }

    .card-text.price {
        font-size: 1.1rem;
        color: #2e7d32;
        font-weight: bold;
    }
</style>

<div class="container my-5">
    <h2 class="mb-4 text-center text-primary">🏡 Daftar Homestay</h2>

    <!-- Form Pencarian -->
    <form action="<?= base_url('homestay/search') ?>" method="get" class="search-form mb-4">
        <div class="row g-2">
            <div class="col-md-5">
                <input type="number" name="harga_min" class="form-control" placeholder="Harga Minimum">
            </div>
            <div class="col-md-5">
                <input type="number" name="harga_max" class="form-control" placeholder="Harga Maksimum">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success w-100">🔍 Cari</button>
            </div>
        </div>
    </form>

    <!-- Daftar Homestay -->
    <div class="row">
        <?php foreach ($homestays as $h): ?>
            <div class="col-md-4 mb-4">
                <div class="card homestay-card h-100">
                    <img src="<?= base_url('assets/images/' . $h['gambar']) ?>" class="card-img-top" alt="<?= esc($h['nama_homestay']) ?>">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= esc($h['nama_homestay']) ?></h5>
                        <p class="card-text"><?= character_limiter(strip_tags($h['deskripsi']), 100) ?></p>
                        <p class="card-text price">Rp <?= number_format($h['harga_per_malam'], 0, ',', '.') ?> / malam</p>

                        <a href="<?= session()->get('logged_in') ? base_url('member/pesan/homestay/' . $h['id_homestay']) :  base_url('login') ?>" class="btn btn-outline-primary w-100 mt-auto">🛌 Pesan Homestay</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->include('layout/footer') ?>