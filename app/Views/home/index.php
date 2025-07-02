<?= $this->include('layout/header') ?>

<style>
  .hero-section {
    background: linear-gradient(to right, #e3f2fd, #ffffff);
    padding: 60px 20px;
    border-radius: 15px;
    animation: fadeIn 1s ease-in-out;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .hero-buttons a {
    margin: 5px;
  }
</style>

<div class="container mt-5">

  <!-- ✅ Alert logout dan alert flashdata lainnya -->
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('success'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('error'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <div class="hero-section text-center">
    <h1 class="mb-4 display-5 fw-bold text-primary">Selamat Datang di Desa Wisata Banjaran</h1>
    <p class="lead text-secondary">
      Temukan keindahan alam, budaya, dan keramahan warga Desa Banjaran melalui beragam paket wisata,
      homestay nyaman, serta galeri foto dan video inspiratif.
    </p>

    <div class="hero-buttons mt-4">
      <a href="<?= base_url('/wisata') ?>" class="btn btn-outline-primary">Lihat Paket Wisata</a>
      <a href="<?= base_url('/homestay') ?>" class="btn btn-outline-success">Lihat Paket Homestay</a>
      <a href="<?= base_url('/riwayat') ?>" class="btn btn-outline-dark">Riwayat Pemesanan</a>
      <a href="<?= base_url('/gallery') ?>" class="btn btn-outline-info">Lihat Galeri</a>
      <a href="<?= base_url('/berita') ?>" class="btn btn-outline-warning">Lihat Berita</a>
      <a href="<?= base_url('/video') ?>" class="btn btn-outline-danger">Lihat Video</a>
    </div>
  </div>
</div>

<?= $this->include('layout/footer') ?>