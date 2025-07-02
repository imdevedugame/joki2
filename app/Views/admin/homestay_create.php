<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="card shadow p-4 mx-auto" style="max-width:600px;">
        <h3 class="text-center mb-4">
            ➕ <strong>Tambah Homestay</strong>
        </h3>
        <form action="/admin/homestay/store" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nama Homestay</label>
                <input type="text" name="nama_homestay" class="form-control" placeholder="Masukkan nama homestay" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Masukkan deskripsi homestay" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Per Malam</label>
                <input type="number" name="harga_per_malam" class="form-control" placeholder="Masukkan harga homestay per malam" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">
                    💾 Simpan Homestay
                </button>
                <a href="/admin/homestay" class="btn btn-secondary">
                    ← Kembali ke Daftar Homestay
                </a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>