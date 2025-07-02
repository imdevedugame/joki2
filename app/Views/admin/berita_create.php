<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<style>
    .form-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        max-width: 700px;
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
        <h2 class="form-title">➕ Tambah Berita</h2>

        <form action="<?= base_url('admin/berita/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Masukkan judul berita" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Isi</label>
                <textarea name="isi" rows="5" class="form-control" placeholder="Masukkan isi berita" required></textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" accept="image/*" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">💾 Simpan Berita</button>
                <a href="<?= base_url('admin/berita') ?>" class="btn btn-secondary">← Kembali ke Daftar Berita</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>