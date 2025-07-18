<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">🏡 Detail Pembayaran Homestay</h2>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?= esc($pembayaran['id']) ?></td>
    </tr>
    <tr>
        <th>ID Pemesanan</th>
        <td><?= esc($pembayaran['id_pemesanan']) ?></td>
    </tr>
    <tr>
        <th>Metode</th>
        <td><?= esc($pembayaran['metode']) ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            <?php if ($pembayaran['status'] == 'Diterima'): ?>
                <span class="badge bg-success">Diterima</span>
            <?php else: ?>
                <span class="badge bg-warning text-dark"><?= esc($pembayaran['status']) ?></span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Tanggal Bayar</th>
        <td><?= $pembayaran['tanggal_bayar'] ?? '-' ?></td>
    </tr>
    <tr>
        <th>Bukti</th>
        <td>
            <?php if ($pembayaran['bukti']) : ?>
                <img src="<?= base_url('uploads/bukti/' . $pembayaran['bukti']) ?>" width="300" class="img-thumbnail">
            <?php else : ?>
                <em>Tidak ada bukti pembayaran</em>
            <?php endif; ?>
        </td>
    </tr>
</table>

<a href="<?= base_url('admin/pembayaranhomestay') ?>" class="btn btn-secondary mt-3">← Kembali ke Daftar Pembayaran</a>

<?= $this->endSection() ?>