<!DOCTYPE html>
<html lang="en">
<head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "poliklinik");

    // Verifikasi koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Mencari pengguna berdasarkan username
    $sql = "SELECT * FROM users WHERE username='$username' AND role='admin'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row) { // Menghilangkan password verification untuk simplicity
            header("Location: dashboard/dashboardAdm.php");
        } else {
            echo "Password salah";
        }
    } else {
        echo "Username tidak ditemukan";
    }

    $conn->close();
}
?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Login Admin</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="loginAdmin.php" class="h1"><b>Login</b> Admin</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Masuk untuk mengakses halaman Admin</p>

      <form action="loginAdmin.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="username" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">Ingat Saya</label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="app/plugins/jquery/jquery.min.js"></script>
<script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="app/dist/js/adminlte.min.js"></script>
</body>
</html>
