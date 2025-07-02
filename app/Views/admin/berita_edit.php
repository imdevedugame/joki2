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

    .current-img {
        max-width: 150px;
        border-radius: 5px;
        margin-bottom: 10px;
    }
</style>

<div class="container my-4">
    <div class="form-container">
        <h2 class="form-title">✏️ Edit Berita</h2>

        <form action="<?= base_url('admin/berita/update/' . $berita['id_berita']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" value="<?= esc($berita['judul']) ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Isi</label>
                <textarea name="isi" rows="5" class="form-control" required><?= esc($berita['isi']) ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Saat Ini</label><br>
                <img src="<?= base_url('uploads/berita/' . $berita['gambar']) ?>" alt="<?= esc($berita['judul']) ?>" class="current-img">
            </div>

            <div class="mb-4">
                <label class="form-label">Ganti Gambar (Opsional)</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">💾 Update Berita</button>
                <a href="<?= base_url('admin/berita') ?>" class="btn btn-secondary">← Kembali ke Daftar Berita</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>