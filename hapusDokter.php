<?php
include 'conf/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if (empty($id)) {
        echo json_encode(['status' => 'error', 'message' => 'ID Dokter tidak valid.']);
        exit();
    }

    // Prepare and execute the SQL query
    $query = "DELETE FROM dokter WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
    }
}
?>
