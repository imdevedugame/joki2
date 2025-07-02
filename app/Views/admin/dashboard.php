<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<style>
    .admin-menu {
        background: #e0f2f1;
        padding: 20px;
        border-radius: 10px;
        max-width: 300px;
        margin-bottom: 30px;
    }

    .admin-menu a {
        display: block;
        padding: 10px 15px;
        margin-bottom: 5px;
        background: #ffffff;
        border-radius: 5px;
        text-decoration: none;
        color: #00796b;
        font-weight: 500;
        transition: 0.3s;
    }

    .admin-menu a:hover {
        background: #b2dfdb;
        color: #004d40;
    }

    .page-title {
        font-weight: 700;
        color: #00796b;
        margin-bottom: 20px;
    }
</style>

<div class="container my-4">
    <h2 class="page-title">🗂️ Dashboard Admin</h2>

    <div class="admin-menu">
        <a href="<?= base_url('admin') ?>">🏠 Dashboard</a>
        <a href="<?= base_url('admin/paketwisata') ?>">🎒 Paket Wisata</a>
        <a href="<?= base_url('admin/homestay') ?>">🎒 Home Stay</a>
        <a href="<?= base_url('admin/gallery') ?>">🖼️ Gallery</a>
        <a href="<?= base_url('admin/video') ?>">🎥 Video</a>
        <a href="<?= base_url('admin/pemesanan') ?>">📝 Pemesanan</a>
        <a href="<?= base_url('admin/pembayaran') ?>">💳 Pembayaran Wisata</a>
        <a href="<?= base_url('admin/pembayaranhomestay') ?>">🏡 Pembayaran Homestay</a>
        <a href="<?= base_url('admin/berita') ?>">📰 Berita</a>
        <a href="<?= base_url('admin/laporan') ?>">📊 Laporan</a>
        <a href="<?= base_url('admin/logout') ?>">🚪 Logout</a>
    </div>
</div>

<?= $this->endSection() ?>