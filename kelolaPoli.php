<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kelola Poli</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="app/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="app/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="app/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.html" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="kelolaDokter.php" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>Kelola Dokter</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kelolaPoli.php" class="nav-link active">
              <i class="nav-icon fas fa-clinic-medical"></i>
              <p>Kelola Poli</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kelolaPasien.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Kelola Pasien</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kelolaObat.php" class="nav-link">
              <i class="nav-icon fas fa-pills"></i>
              <p>Kelola Obat</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Poli</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Poli</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPoliModal">Tambah Poli</button>
            </div>
          </div>
          <div class="card-body">
            <table id="poliTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Poli</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <!-- Data poli akan diisi di sini -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Modal Tambah Poli -->
  <div class="modal fade" id="addPoliModal" tabindex="-1" role="dialog" aria-labelledby="addPoliModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addPoliModalLabel">Tambah Poli</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addPoliForm">
            <div class="form-group">
              <label for="poliName">Nama Poli</label>
              <input type="text" class="form-control" id="poliName" name="poliName" required>
            </div>
            <div class="form-group">
              <label for="poliDescription">Deskripsi</label>
              <textarea class="form-control" id="poliDescription" name="poliDescription" required></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary" form="addPoliForm">Simpan</button>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- jQuery -->
<script src="app/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="app/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="app/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="app/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="app/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="app/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="app/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="app/dist/js/adminlte.min.js"></script>
<script>
  $(function () {
    $("#poliTable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#poliTable_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
