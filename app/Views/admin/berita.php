<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">📰 Kelola Berita</h2>


<a href="<?= base_url('admin/berita/create') ?>" class="btn btn-success mb-3">➕ Tambah Berita</a>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($berita)) : ?>
            <?php $no = 1;
            foreach ($berita as $b): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($b['judul']) ?></td>
                    <td><?= word_limiter(strip_tags($b['isi']), 20) ?></td>
                    <td>
                        <img src="<?= base_url('uploads/berita/' . $b['gambar']) ?>" width="100" class="img-thumbnail" alt="<?= esc($b['judul']) ?>">
                    </td>
                    <td>
                        <a href="<?= base_url('admin/berita/edit/' . $b['id_berita']) ?>" class="btn btn-sm btn-primary">✏️ Edit</a>
                        <a href="<?= base_url('admin/berita/delete/' . $b['id_berita']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus berita ini?')">🗑️ Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="5" class="text-center">Belum ada data berita.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>