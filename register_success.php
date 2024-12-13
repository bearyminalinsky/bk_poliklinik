<?php
// Mulai sesi
session_start();

// Pesan sukses registrasi
$message = "Registrasi berhasil! Terima kasih telah mendaftar.";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Berhasil</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-success">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>Registrasi</b> Berhasil</a>
        </div>
        <div class="card-body text-center">
            <p class="login-box-msg">
                <?php echo htmlspecialchars($message); ?>
            </p>
            <div class="mb-3">
                <a href="loginPasien.php" class="btn btn-success btn-block">Login Sekarang</a>
            </div>
            <div>
                <a href="index.php" class="btn btn-outline-secondary">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="app/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="app/dist/js/adminlte.min.js"></script>
</body>
</html>
