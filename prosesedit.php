<?php
// File: proses_edit_buku.php

// Mengimpor file koneksi ke database
include 'koneksi.php';
session_start();
// Mendapatkan data dari form
$id_buku = $_POST['id_buku'];
$Nama_buku = $_POST['Nama_buku'];
$Penerbit = $_POST['Penerbit'];
$Halaman = $_POST['Halaman'];
$Keterangan = $_POST['Keterangan'];

// Memastikan semua field terisi
if (!empty($id_buku) && !empty($Nama_buku) && !empty($Penerbit) && !empty($Halaman) && !empty($Keterangan)) {
    // Query untuk mengupdate data buku di database
    $query = "UPDATE buku SET Nama_buku = '$Nama_buku', Penerbit = '$Penerbit', Halaman = '$Halaman', Keterangan = '$Keterangan' WHERE id_buku = '$id_buku'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $_SESSION["update"] = 'Data berhasil di ubah';
        header("Location: bukubs.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Error: Pastikan semua field terisi dengan benar.";
}
?>