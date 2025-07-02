<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <h3>Riwayat Pemesanan & Pembayaran</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Paket</th>
                <th>Tanggal Kunjungan</th>
                <th>Jumlah Orang</th>
                <th>Total Bayar</th>
                <th>Status Pemesanan</th>
                <th>Status Pembayaran</th>
                <th>Metode</th>
                <th>Bukti</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($riwayat as $row) : ?>
                <tr>
                    <td><?= esc($row['nama_paket']) ?></td>
                    <td><?= esc($row['tanggal']) ?></td>
                    <td><?= esc($row['jumlah_orang']) ?></td>
                    <td>Rp <?= number_format($row['total_bayar']) ?></td>
                    <td><?= esc($row['status']) ?></td>
                    <td><?= $row['status_bayar'] ?? 'Belum Bayar' ?></td>
                    <td><?= $row['metode'] ?? '-' ?></td>
                    <td>
                        <?php if (!empty($row['bukti'])): ?>
                            <a href="<?= base_url('uploads/bukti/' . $row['bukti']) ?>" target="_blank">Lihat</a>
                        <?php else: ?>
                            -
                        <?php endif ?>
                    </td>
                    <td>
                        <?php if ($row['status'] == 'Menunggu Pembayaran') : ?>
                            <a href="<?= base_url('member/pembayaran/' . $row['id_pemesanan']) ?>" class="btn btn-sm btn-success">Bayar</a>
                        <?php else : ?>
                            ✔
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<h3 class="mt-5">Riwayat Pemesanan Homestay</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Homestay</th>
            <th>Check-in</th>
            <th>Malam</th>
            <th>Orang</th>
            <th>Total Bayar</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($homestay as $row): ?>
            <tr>
                <td><?= esc($row['nama_homestay']) ?></td>
                <td><?= esc($row['tanggal']) ?></td>
                <td><?= esc($row['jumlah_malam']) ?></td>
                <td><?= esc($row['jumlah_orang']) ?></td>
                <td>Rp <?= number_format($row['total_bayar'], 0, ',', '.') ?></td>
                <td><?= esc($row['status']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="mt-3">
    <a href="<?= base_url('/') ?>" class="btn btn-secondary">🏠 Kembali ke Home</a>
    <a href="<?= base_url('wisata') ?>" class="btn btn-primary">🧭 Lihat Paket Wisata</a>
</div>
</div>
<?= $this->endSection() ?>