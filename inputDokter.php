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
    if (empty($nama_dokter) || empty($alamat) || empty($no_hp) || empty($id_poli)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit();
    }

    // Prepare and execute the SQL query
    $query = "INSERT INTO dokter (nama_dokter, alamat, no_hp, id_poli) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $nama_dokter, $alamat, $no_hp, $id_poli);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
    }
}
?>
