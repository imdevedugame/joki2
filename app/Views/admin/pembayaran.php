<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">💳 Data Pembayaran Wisata</h2>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>ID Pemesanan</th>
            <th>Metode</th>
            <th>Bukti</th>
            <th>Status</th>
            <th>Tanggal Bayar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($pembayaran)) : ?>
            <?php foreach ($pembayaran as $i => $b): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($b['id_pemesanan']) ?></td>
                    <td><?= esc($b['metode']) ?></td>
                    <td>
                        <?php if ($b['bukti']) : ?>
                            <img src="<?= base_url('uploads/bukti/' . $b['bukti']) ?>" width="100" class="img-thumbnail">
                        <?php else : ?>
                            <em>Belum Upload</em>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($b['status'] == 'Lunas') : ?>
                            <span class="badge bg-success">Lunas</span>
                        <?php else : ?>
                            <span class="badge bg-warning text-dark"><?= esc($b['status']) ?></span>
                        <?php endif; ?>
                    </td>
                    <td><?= $b['tanggal_bayar'] ?? '-' ?></td>
                    <td>
                        <a href="<?= base_url('admin/pembayaran/detail/' . $b['id_pembayaran']) ?>" class="btn btn-sm btn-primary">🔎 Detail</a>
                        <a href="<?= base_url('admin/pembayaran/konfirmasi/' . $b['id_pembayaran']) ?>" class="btn btn-sm btn-success" onclick="return confirm('Konfirmasi pembayaran ini?')">✔️ Konfirmasi</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td colspan="7" class="text-center">Belum ada data pembayaran wisata.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>