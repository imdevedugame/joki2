<h2 style="text-align:center;">Laporan Pembayaran (Wisata & Homestay)</h2>

<table border="1" cellpadding="5" cellspacing="0" width="100%" style="border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>No</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Total Bayar</th>
            <th>Status</th>
            <th>Tanggal Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $total = 0;
        foreach ($pembayaran as $i => $p): 
            $total += (int) $p['total_bayar'];
        ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= esc($p['nama_lengkap']) ?></td>
                <td><?= esc($p['jenis']) ?></td>
                <td>Rp <?= number_format($p['total_bayar'], 0, ',', '.') ?></td>
                <td><?= esc($p['status']) ?></td>
                <td><?= $p['tanggal_bayar'] ? date('d M Y', strtotime($p['tanggal_bayar'])) : '-' ?></td>
            </tr>
        <?php endforeach ?>
        <tr>
            <td colspan="3" style="text-align: right;"><strong>Total Keseluruhan</strong></td>
            <td colspan="3"><strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></td>
        </tr>
    </tbody>
</table>
