<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Desa Wisata Banjaran') ?></title>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/8d0f816426.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <?php include('navbar.php'); ?>

    <div class="container-fluid mt-4">
    <?= $this->renderSection('content') ?>
</div>

    <!-- Optional Footer -->
    <?php // include('footer.php'); ?>

    <!-- Bootstrap JS (Popper + Bootstrap Bundle) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
