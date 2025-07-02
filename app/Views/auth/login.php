<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Member - Desa Wisata</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4>Login Member</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('login') ?>" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>

                        <hr class="my-4">
                        <div class="text-center">
                            <a href="<?= site_url('auth/google') ?>" class="btn btn-danger">
                                <i class="fab fa-google"></i> Login dengan Google
                            </a>
                        </div>

                        <div class="mt-3 text-center">
                            <a href="<?= site_url('auth/register') ?>">Belum punya akun? Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Font Awesome untuk ikon Google -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>