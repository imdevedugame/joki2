<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    <!-- Bootstrap CSS (opsional, jika ingin gunakan) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            background: #f1f1f1;
        }

        nav {
            width: 220px;
            background: #00796b;
            color: white;
            padding: 20px;
        }

        nav h3 {
            text-align: center;
            margin-bottom: 30px;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            margin-bottom: 10px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }

        nav ul li a:hover {
            background: #004d40;
        }

        main {
            flex: 1;
            padding: 30px;
        }
    </style>
</head>

<body>

    <nav>
        <h3>Admin Panel</h3>
        <ul>
            <li><a href="<?= base_url('admin') ?>">🏠 Dashboard</a></li>
            <li><a href="<?= base_url('admin/paketwisata') ?>">🎒 Paket Wisata</a></li>
            <li><a href="<?= base_url('admin/homestay') ?>">🎒 Homestay</a></li>
            <li><a href="<?= base_url('admin/gallery') ?>">🖼️ Gallery</a></li>
            <li><a href="<?= base_url('admin/video') ?>">🎥 Video</a></li>
            <li><a href="<?= base_url('admin/pemesanan') ?>">📝 Pemesanan</a></li>
            <li><a href="<?= base_url('admin/pembayaran') ?>">💳 Pembayaran Wisata</a></li>
            <li><a href="<?= base_url('admin/pembayaranhomestay') ?>">🏡 Pembayaran Homestay</a></li>
            <li><a href="<?= base_url('admin/berita') ?>">📰 Berita</a></li>
            <li><a href="<?= base_url('admin/laporan') ?>">📊 Laporan</a></li>
            <li><a href="<?= base_url('admin/logout') ?>">🚪 Logout</a></li>
        </ul>
    </nav>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Bootstrap JS (opsional, jika gunakan komponen) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>