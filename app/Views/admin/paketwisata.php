<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<style>
    .table-img {
        width: 80px;
        height: 60px;
        object-fit: cover;
        border-radius: 5px;
    }

    .add-btn {
        margin-bottom: 15px;
    }
</style>

<h2 class="mb-4">🎒 Daftar Paket Wisata</h2>

<a href="<?= base_url('admin/paketwisata/create') ?>" class="btn btn-success add-btn">➕ Tambah Paket Wisata</a>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Nama Paket</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($paket)) : ?>
            <?php foreach ($paket as $i => $p) : ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($p['nama_paket']) ?></td>
                    <td><?= character_limiter(strip_tags($p['deskripsi']), 100) ?></td>
                    <td>Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
                    <td><img src="<?= base_url('uploads/paket/' . $p['gambar']) ?>" class="table-img" alt="<?= esc($p['nama_paket']) ?>"></td>
                    <td>
                        <a href="<?= base_url('admin/paketwisata/edit/' . $p['id_paket']) ?>" class="btn btn-sm btn-primary">✏️ Edit</a>
                        <a href="<?= base_url('admin/paketwisata/delete/' . $p['id_paket']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus paket ini?')">🗑️ Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td colspan="6" class="text-center">Belum ada data paket wisata.</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>

<?= $this->endSection() ?>