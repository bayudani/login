<?php
// File: proses_edit_buku.php

// Mengimpor file koneksi ke database
include '../koneksi.php';
session_start();
// Mendapatkan data dari form
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$prodi = $_POST['prodi'];
$alamat = $_POST['alamat'];

// Memastikan semua field terisi
if (!empty($nim) && !empty($nama) && !empty($prodi) && !empty($alamat)) {
    // Query untuk mengupdate data buku di database
    $query = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', prodi = '$prodi', alamat = '$alamat' WHERE nim = '$nim'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $_SESSION["berhasil"] = 'Data berhasil di hapus';
        header("Location: mahasiswa.php?");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Error: Pastikan semua field terisi dengan benar.";
}
?>