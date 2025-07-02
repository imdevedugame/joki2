<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<style>
    .table-img {
        width: 100px;
        height: auto;
        border-radius: 5px;
    }

    .add-btn {
        margin-bottom: 15px;
    }
</style>

<h2 class="mb-4">🖼️ Galeri</h2>

<a href="<?= base_url('admin') ?>" class="btn btn-secondary mb-2">← Kembali ke Dashboard</a>
<a href="<?= base_url('admin/gallery/create') ?>" class="btn btn-success add-btn">➕ Tambah Gambar</a>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($gallery)) : ?>
            <?php foreach ($gallery as $index => $g): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= esc($g['judul']) ?></td>
                    <td>
                        <img src="<?= base_url('uploads/gallery/' . $g['gambar']) ?>" class="table-img" alt="<?= esc($g['judul']) ?>">
                    </td>
                    <td>
                        <a href="<?= base_url('admin/gallery/edit/' . $g['id_gallery']) ?>" class="btn btn-sm btn-primary">✏️ Edit</a>
                        <a href="<?= base_url('admin/gallery/delete/' . $g['id_gallery']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">🗑️ Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="4" class="text-center">Belum ada data galeri.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>