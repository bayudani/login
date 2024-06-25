<?php
// File: prosesUser.php

// Mengimpor file koneksi ke database
include 'koneksi.php';
session_start();

// Mendapatkan data dari form
$id_user = $_POST['id'] ?? ''; // Menggunakan null coalescing operator untuk menghindari undefined index
$level = $_POST['level'] ?? '';

// Memastikan semua field terisi dengan benar
if (!empty($id_user) && !empty($level)) {
    // Query untuk mengupdate data user di database
    $query = "UPDATE user SET level = '$level' WHERE id = '$id_user'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $_SESSION["update"] = 'Data berhasil diubah';
        header("Location: user.php");
        exit; // Pastikan untuk keluar dari script setelah mengarahkan header
    } else {
        // Jika query gagal dijalankan
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika ada field yang kosong
    echo "Error: Pastikan semua field terisi dengan benar.";
}
?>
