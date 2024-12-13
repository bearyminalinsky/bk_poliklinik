<?php
include 'conf/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $id_poli = $_POST['id_poli'];

    // Check for empty values
    if (empty($id) || empty($nama) || empty($alamat) || empty($no_hp) || empty($id_poli)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit();
    }

    // Prepare and execute the SQL query
    $query = "UPDATE dokter SET nama = ?, alamat = ?, no_hp = ?, id_poli = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssii", $nama, $alamat, $no_hp, $id_poli, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
    }
}
?>
