<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">
            🏠 <strong>Data Homestay</strong>
        </h3>
        <div class="text-end mb-3">
            <a href="/admin/homestay/create" class="btn btn-success">
                ➕ Tambah Homestay
            </a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga Per Malam</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($homestay as $h): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $h['nama_homestay'] ?></td>
                        <td><?= $h['deskripsi'] ?></td>
                        <td>Rp <?= number_format($h['harga_per_malam'], 0, ',', '.') ?></td>
                        <td>
                            <img src="/uploads/homestay/<?= $h['gambar'] ?>" width="100" class="rounded shadow">
                        </td>
                        <td>
                            <a href="/admin/homestay/edit/<?= $h['id_homestay'] ?>" class="btn btn-warning btn-sm mb-1">
                                ✏️ Edit
                            </a>
                            <a href="/admin/homestay/delete/<?= $h['id_homestay'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus homestay ini?')">
                                🗑️ Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>