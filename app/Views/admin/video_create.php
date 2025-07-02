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
        <h2 class="form-title">➕ Tambah Video</h2>

        <form action="<?= base_url('admin/video/store') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Masukkan judul video" required>
            </div>

            <div class="mb-4">
                <label class="form-label">URL (Embed YouTube)</label>
                <input type="text" name="url" class="form-control" placeholder="https://www.youtube.com/embed/..." required>
                <small class="form-text text-muted">Gunakan URL embed YouTube (bukan watch link).</small>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">💾 Simpan Video</button>
                <a href="<?= base_url('admin/video') ?>" class="btn btn-secondary">← Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>