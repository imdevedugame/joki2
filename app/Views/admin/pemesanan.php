<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">📝 Data Pemesanan Wisata</h2>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Member</th>
            <th>Paket</th>
            <th>Tanggal</th>
            <th>Jumlah Orang</th>
            <th>Total Bayar</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($pemesanan_wisata)) : ?>
            <?php foreach ($pemesanan_wisata as $no => $p): ?>
                <tr>
                    <td><?= $no + 1 ?></td>
                    <td><?= esc($p['id_member']) ?></td>
                    <td><?= esc($p['id_paket']) ?></td>
                    <td><?= esc($p['tanggal']) ?></td>
                    <td><?= esc($p['jumlah_orang']) ?></td>
                    <td>Rp <?= number_format($p['total_bayar'], 0, ',', '.') ?></td>
                    <td><?= esc($p['status']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="7" class="text-center">Belum ada data pemesanan wisata.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<h2 class="mb-4 mt-5">🏡 Data Pemesanan Homestay</h2>

<table class="table table-bordered table-striped">
    <thead class="table-info">
        <tr>
            <th>No</th>
            <th>Member</th>
            <th>Homestay</th>
            <th>Tgl Mulai</th>
            <th>Tgl Selesai</th>
            <th>Orang</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($pemesanan_homestay)) : ?>
            <?php foreach ($pemesanan_homestay as $no => $p): ?>
                <tr>
                    <td><?= $no + 1 ?></td>
                    <td><?= esc($p['id_member']) ?></td>
                    <td><?= esc($p['id_homestay']) ?></td>
                    <td><?= esc($p['tanggal_mulai']) ?></td>
                    <td><?= esc($p['tanggal_selesai']) ?></td>
                    <td><?= esc($p['jumlah_orang']) ?></td>
                    <td>Rp <?= number_format($p['total_bayar'], 0, ',', '.') ?></td>
                    <td><?= esc($p['status']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="8" class="text-center">Belum ada data pemesanan homestay.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>