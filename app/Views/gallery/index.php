<?= $this->include('layout/header') ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Desa Wisata</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <style>
        .gallery-img {
            height: 250px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s ease;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .page-title {
            text-align: center;
            margin: 30px 0;
            font-weight: 700;
            color: #00796b;
        }

        .back-btn {
            max-width: 200px;
            margin: 30px auto 0 auto;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h1 class="page-title">📸 Galeri Desa Wisata</h1>

        <div class="row">
            <?php foreach ($galleries as $g): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="<?= base_url('uploads/gallery/' . $g['gambar']) ?>" class="card-img-top gallery-img" alt="<?= esc($g['judul']) ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= esc($g['judul']) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Tombol Kembali ke Home/Dashboard -->
        <div class="text-center back-btn">
            <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary w-100">← Kembali ke Home</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>