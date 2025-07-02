<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<style>
    .video-iframe {
        border-radius: 5px;
    }

    .add-btn {
        margin-bottom: 15px;
    }
</style>

<h2 class="mb-4">🎥 Video</h2>

<a href="<?= base_url('admin/video/create') ?>" class="btn btn-success add-btn">➕ Tambah Video</a>
<a href="<?= base_url('admin') ?>" class="btn btn-secondary add-btn">← Kembali ke Dashboard</a>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Preview</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($video)) : ?>
            <?php foreach ($video as $index => $v): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= esc($v['judul']) ?></td>
                    <td>
                        <iframe width="250" height="150" src="<?= esc(str_replace('watch?v=', 'embed/', $v['url'])) ?>" frameborder="0" allowfullscreen class="video-iframe"></iframe>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/video/edit/' . $v['id_video']) ?>" class="btn btn-sm btn-primary">✏️ Edit</a>
                        <a href="<?= base_url('admin/video/delete/' . $v['id_video']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">🗑️ Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="4" class="text-center">Belum ada data video.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>