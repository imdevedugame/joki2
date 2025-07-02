<h2 style="text-align:center;">Laporan Pembayaran Wisata</h2>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Total Bayar</th>
            <th>Status</th>
            <th>Tanggal Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pembayaran as $i => $p): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= esc($p['nama_lengkap']) ?></td>
                <td><?= esc($p['total_bayar']) ?></td>
                <td><?= esc($p['status']) ?></td>
                <td><?= esc($p['tanggal_bayar']) ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>