<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<style>
    .form-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        max-width: 600px;
        margin: 0 auto;
    }

    .form-title {
        text-align: center;
        margin-bottom: 25px;
        color: #00796b;
        font-weight: 700;
    }
</style>

<div class="container my-4">
    <div class="form-container">
        <h2 class="form-title">➕ Tambah Paket Wisata</h2>

        <form action="<?= base_url('admin/paketwisata/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Nama Paket</label>
                <input type="text" name="nama_paket" class="form-control" placeholder="Masukkan nama paket wisata" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="form-control" placeholder="Masukkan deskripsi paket wisata" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Masukkan harga paket wisata" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" accept="image/*" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">💾 Simpan Paket Wisata</button>
                <a href="<?= base_url('admin/paketwisata') ?>" class="btn btn-secondary">← Kembali ke Daftar Paket Wisata</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>