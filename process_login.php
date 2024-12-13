<?php
session_start();

// Koneksi ke database
require 'conf/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mendapatkan data dari tabel users
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param('ss', $username, $password); // 'ss' berarti dua string (username dan password)
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['user'] = $user;
            
            // Cek peran pengguna
            switch ($user['role']) {
                case 'admin':
                    header("Location: dashboard/dashboardAdm.php"); // Redirect ke dashboard admin
                    break;
                case 'dokter':
                    header("Location: dashboard/dashboardDok.php"); // Redirect ke dashboard dokter
                    break;
                case 'pasien':
                    header("Location: dashboard/dashboardPas.php"); // Redirect ke dashboard pasien
                    break;
                default:
                    echo "Peran pengguna tidak dikenal!";
            }
        } else {
            // Jika login gagal, tampilkan pesan error
            echo "Kredensial tidak valid! Silakan coba lagi.";
        }
    } else {
        echo "Gagal mempersiapkan pernyataan: " . $mysqli->error;
    }
}
?>
