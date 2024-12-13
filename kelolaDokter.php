<?php
include 'conf/koneksi.php';

$action = $_POST['action'];

if ($action == 'fetch') {
    $query = "SELECT * FROM dokter";
    $result = mysqli_query($conn, $query);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    echo json_encode(['data' => $data]);
} elseif ($action == 'add') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $id_poli = $_POST['id_poli'];

    // Check for empty values
    if (empty($nama) || empty($alamat) || empty($no_hp) || empty($id_poli)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit();
    }

    // Prepare and execute the SQL query
    $query = "INSERT INTO dokter (nama, alamat, no_hp, id_poli) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $nama, $alamat, $no_hp, $id_poli);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
    }
}
?>

<?php
include 'conf/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Dokter</title>
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
                        <a href="kelolaDokter.php" class="nav-link active">
                            <i class="nav-icon fas fa-user-md"></i>
                            <p>Kelola Dokter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="kelolaPoli.php" class="nav-link">
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
                        <h1>Kelola Dokter</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Dokter</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDoctorModal">Tambah Dokter</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="doctorTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Dokter</th>
                                    <th>Alamat</th>
                                    <th>No. HP</th>
                                    <th>ID Poli</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Tambah Dokter -->
    <div class="modal fade" id="addDoctorModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDoctorModalLabel">Tambah Dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addDoctorForm">
                        <div class="form-group">
                            <label for="doctorName">Nama Dokter</label>
                            <input type="text" class="form-control" id="doctorName" name="doctorName" placeholder="Masukkan nama dokter" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat dokter" required>
                        </div>
                        <div class="form-group">
                            <label for="contact">No. HP</label>
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Masukkan nomor kontak" required>
                        </div>
                        <div class="form-group">
                            <label for="idPoli">ID Poli</label>
                            <input type="text" class="form-control" id="idPoli" name="idPoli" placeholder="Masukkan ID Poli" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" form="addDoctorForm">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="app/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables & Plugins -->
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
        var table = $('#doctorTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "inputDokter.php",
                "type": "POST",
                "data": {
                    action: 'fetch'
                }
            },
            "columns": [
                { "data": "id" },
                { "data": "nama" },
                { "data": "alamat" },
                { "data": "no_hp" },
                { "data": "id_poli" },
                {
                    "data": null,
                    "defaultContent": `<button class="btn btn-warning editDoctorBtn">Edit</button> <button class="btn btn-danger deleteDoctorBtn">Hapus</button>`
                }
            ]
        });

        $('#doctorTable tbody').on('click', '.editDoctorBtn', function () {
            var data = table.row($(this).parents('tr')).data();
            $('#addDoctorModalLabel').text('Edit Dokter');
            $('#doctorName').val(data.nama);
            $('#alamat').val(data.alamat);
            $('#contact').val(data.no_hp);
            $('#idPoli').val(data.id_poli);
            $('#addDoctorModal').modal('show');
        });

        $('#doctorTable tbody').on('click', '.deleteDoctorBtn', function () {
            var data = table.row($(this).parents('tr')).data();
            if (confirm('Are you sure you want to delete this doctor?')) {
                $.post('inputDokter.php', {
                    action: 'delete',
                    id: data.id
                }, function(response) {
                    if (response.status === 'success') {
                        alert('Doctor deleted successfully.');
                        table.ajax.reload();
                    } else {
                        alert('Error deleting doctor.');
                    }
                }, 'json');
            }
        });

        $('#addDoctorForm').submit(function (e) {
            e.preventDefault();

            var formData = {
                action: 'add',
                nama: $('#doctorName').val(),
                alamat: $('#alamat').val(),
                no_hp: $('#contact').val(),
                id_poli: $('#idPoli').val()
            };

            $.post('inputDokter.php', formData, function(response) {
                if (response.status === 'success') {
                    $('#addDoctorModal').modal('hide');
                    $('#addDoctorForm')[0].reset();
                    table.ajax.reload();
                } else {
                    alert(response.message);
                }
            }, 'json');
        });
    });
</script>
</body>
</html>
