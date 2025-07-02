<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">🏡 Data Pembayaran Homestay</h2>

<table class="table table-bordered table-striped">
    <thead class="table-info">
        <tr>
            <th>ID</th>
            <th>ID Pemesanan</th>
            <th>Metode</th>
            <th>Status</th>
            <th>Bukti</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($pembayaran)) : ?>
            <?php foreach ($pembayaran as $p): ?>
                <tr>
                    <td><?= esc($p['id']) ?></td>
                    <td><?= esc($p['id_pemesanan']) ?></td>
                    <td><?= esc($p['metode']) ?></td>
                    <td>
                        <?php if ($p['status'] == 'Diterima'): ?>
                            <span class="badge bg-success">Diterima</span>
                        <?php else: ?>
                            <span class="badge bg-warning text-dark"><?= esc($p['status']) ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($p['bukti']): ?>
                            <img src="<?= base_url('uploads/bukti/' . $p['bukti']) ?>" width="100" class="img-thumbnail">
                        <?php else: ?>
                            <em>Belum Upload</em>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/pembayaranhomestay/detail/' . $p['id']) ?>" class="btn btn-sm btn-primary">🔎 Detail</a>
                        <?php if ($p['status'] != 'Diterima'): ?>
                            <a href="<?= base_url('admin/pembayaranhomestay/konfirmasi/' . $p['id']) ?>" class="btn btn-sm btn-success" onclick="return confirm('Konfirmasi pembayaran ini?')">✔️ Konfirmasi</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6" class="text-center">Belum ada data pembayaran homestay.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<a href="<?= base_url('admin') ?>" class="btn btn-secondary mt-3">← Kembali ke Dashboard</a>

<?= $this->endSection() ?>