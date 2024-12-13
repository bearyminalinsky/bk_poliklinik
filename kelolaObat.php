<?php
include 'conf/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Obat</title>
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
                        <a href="kelolaObat.php" class="nav-link active">
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
                        <h1>Kelola Obat</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Obat</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addObatModal">Tambah Obat</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="obatTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Obat</th>
                                    <th>Kemasan</th>
                                    <th>Harga</th>
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

    <!-- Modal Tambah Obat -->
    <div class="modal fade" id="addObatModal" tabindex="-1" role="dialog" aria-labelledby="addObatModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addObatModalLabel">Tambah Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addObatForm">
                        <div class="form-group">
                            <label for="namaObat">Nama Obat</label>
                            <input type="text" class="form-control" id="namaObat" name="nama_obat" placeholder="Masukkan nama obat" required>
                        </div>
                        <div class="form-group">
                            <label for="kemasan">Kemasan</label>
                            <input type="text" class="form-control" id="kemasan" name="kemasan" placeholder="Masukkan kemasan obat" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga obat" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" form="addObatForm">Simpan</button>
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
<script src="app/plugins/jszip/jszip.min.js"></script>
<script src="app/plugins/pdfmake/pdfmake.min.js"></script>
<script src="app/plugins/pdfmake/vfs_fonts.js"></script>
<script src="app/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="app/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="app/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#obatTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: 'inputObat.php',
                type: 'POST',
                data: {
                    action: 'fetch'
                }
            },
            columns: [
                { data: 'id' },
                { data: 'nama_obat' },
                { data: 'kemasan' },
                { data: 'harga' },
                { 
                    data: null,
                    render: function(data, type, row) {
                        return '<button class="btn btn-danger btn-sm delete" data-id="' + row.id + '">Hapus</button>';
                    }
                }
            ]
        });

        $('#addObatForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: 'inputObat.php',
                type: 'POST',
                data: {
                    action: 'add',
                    nama_obat: $('#namaObat').val(),
                    kemasan: $('#kemasan').val(),
                    harga: $('#harga').val()
                },
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.status === 'success') {
                        $('#addObatModal').modal('hide');
                        $('#addObatForm')[0].reset();
                        table.ajax.reload();
                    } else {
                        alert(result.message);
                    }
                }
            });
        });

        $('#obatTable tbody').on('click', '.delete', function() {
            var id = $(this).data('id');

            if (confirm('Apakah Anda yakin ingin menghapus obat ini?')) {
                $.ajax({
                    url: 'inputObat.php',
                    type: 'POST',
                    data: {
                        action: 'delete',
                        id: id
                    },
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.status === 'success') {
                            table.ajax.reload();
                        } else {
                            alert(result.message);
                        }
                    }
                });
            }
        });
    });
</script>
</body>
</html>
