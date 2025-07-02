<?= $this->include('layout/header') ?>

<style>
    .table-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        margin-bottom: 40px;
    }

    .table thead {
        background-color: #f1f1f1;
    }

    .status-bayar {
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 20px;
    }

    .status-belum {
        background-color: #ffebee;
        color: #c62828;
    }

    .status-lunas {
        background-color: #e8f5e9;
        color: #2e7d32;
    }

    .status-proses {
        background-color: #fffde7;
        color: #f9a825;
    }

    .section-title {
        font-weight: bold;
        color: #00796b;
        margin-bottom: 20px;
    }
</style>

<div class="container my-5">
    <!-- Riwayat Wisata -->
    <div class="table-container">
        <h3 class="section-title">🧭 Riwayat Pemesanan Wisata</h3>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Paket</th>
                        <th>Tanggal</th>
                        <th>Jumlah Orang</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($wisata as $w): ?>
                        <tr>
                            <td><?= esc($w['nama_paket']) ?></td>
                            <td><?= esc($w['tanggal']) ?></td>
                            <td><?= esc($w['jumlah_orang']) ?></td>
                            <td>Rp <?= number_format($w['total_bayar'], 0, ',', '.') ?></td>
                            <td>
                                <span class="status-bayar <?= $w['status'] == 'Proses' ? 'status-proses' : ($w['status'] == 'Selesai' ? 'status-lunas' : 'status-belum') ?>">
                                    <?= esc($w['status']) ?>
                                </span>
                            </td>
                            <td>
                                <span class="status-bayar <?= ($w['status_bayar'] ?? '') == 'Lunas' ? 'status-lunas' : 'status-belum' ?>">
                                    <?= esc($w['status_bayar'] ?? 'Belum Bayar') ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Riwayat Homestay -->
    <div class="table-container">
        <h3 class="section-title">🏡 Riwayat Pemesanan Homestay</h3>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Homestay</th>
                        <th>Tanggal</th>
                        <th>Jumlah Orang</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($homestay as $h): ?>
                        <tr>
                            <td><?= esc($h['nama_homestay']) ?></td>
                            <td><?= esc($h['tanggal_mulai']) ?> s/d <?= esc($h['tanggal_selesai']) ?></td>
                            <td><?= esc($h['jumlah_orang']) ?></td>
                            <td>Rp <?= number_format($h['total_bayar'], 0, ',', '.') ?></td>
                            <td>
                                <span class="status-bayar <?= $h['status'] == 'Proses' ? 'status-proses' : ($h['status'] == 'Selesai' ? 'status-lunas' : 'status-belum') ?>">
                                    <?= esc($h['status']) ?>
                                </span>
                            </td>
                            <td>
                                <span class="status-bayar <?= ($h['status_bayar'] ?? '') == 'Lunas' ? 'status-lunas' : 'status-belum' ?>">
                                    <?= esc($h['status_bayar'] ?? 'Belum Bayar') ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?>