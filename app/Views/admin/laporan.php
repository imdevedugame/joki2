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
            <th>Total Bayar</th>
            <th>Status</th>
            <th>Tanggal Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($pembayaran)) : ?>
            <?php foreach ($pembayaran as $i => $p): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($p['nama_lengkap']) ?></td>
                    <td>Rp <?= number_format($p['total_bayar'], 0, ',', '.') ?></td>
                    <td>
                        <?php if ($p['status'] == 'Lunas' || $p['status'] == 'Diterima') : ?>
                            <span class="badge bg-success"><?= esc($p['status']) ?></span>
                        <?php else : ?>
                            <span class="badge bg-warning text-dark"><?= esc($p['status']) ?></span>
                        <?php endif; ?>
                    </td>
                    <td><?= date('d M Y', strtotime($p['tanggal_bayar'])) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="5" class="text-center">Belum ada data pembayaran.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>