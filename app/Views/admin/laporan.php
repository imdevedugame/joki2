<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">📊 Laporan Pembayaran</h2>

<div class="mb-3">
    <a href="<?= base_url('admin/laporan/excel') ?>" class="btn btn-success">
        🗂️ Export Excel
    </a>
    <a href="<?= base_url('admin/laporan/pdf') ?>" class="btn btn-danger">
        📄 Export PDF
    </a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Total Bayar</th>
            <th>Status</th>
            <th>Tanggal Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($semua_pembayaran)) : ?>
            <?php foreach ($semua_pembayaran as $i => $p): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($p['nama_lengkap']) ?></td>
                    <td><span class="badge bg-info text-dark"><?= esc($p['jenis']) ?></span></td>
                    <td>Rp <?= number_format($p['total_bayar'], 0, ',', '.') ?></td>
                    <td>
                        <?php if (in_array(strtolower($p['status']), ['lunas', 'terverifikasi', 'selesai', 'dikonfirmasi'])) : ?>
                            <span class="badge bg-success"><?= esc($p['status']) ?></span>
                        <?php else : ?>
                            <span class="badge bg-warning text-dark"><?= esc($p['status']) ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?= $p['tanggal_bayar'] ? date('d M Y', strtotime($p['tanggal_bayar'])) : '<i>Belum dibayar</i>' ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6" class="text-center">Belum ada data pembayaran.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<div class="mt-4">
    <h5>Total Pembayaran Wisata: <strong>Rp <?= number_format($total_wisata ?? 0, 0, ',', '.') ?></strong></h5>
    <h5>Total Pembayaran Homestay: <strong>Rp <?= number_format($total_homestay ?? 0, 0, ',', '.') ?></strong></h5>
    <h4 class="text-primary">Total Seluruh Pembayaran: <strong>Rp <?= number_format($total_semua ?? 0, 0, ',', '.') ?></strong></h4>
</div>

<?= $this->endSection() ?>
