<?php
include '../koneksi.php';

session_start();

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$prodi = $_POST['prodi'];
$alamat = $_POST['alamat'];

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan
$query = "INSERT INTO mahasiswa (nim, nama, prodi, alamat) VALUES ('$nim', '$nama', '$prodi', '$alamat')";
$result = mysqli_query($koneksi, $query);

// periksa query apakah ada error
if (!$result) {
    die("Query ini gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
} else {
    // tampil alert dan akan redirect ke halaman mahasiswa.php

    $_SESSION['tambah'] = 'berhasil tambah';
    header("location:mahasiswa.php?pesan=input");

}
?>