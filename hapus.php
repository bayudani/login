<?php
// File: hapus_buku.php

// Mengimpor file koneksi ke database
include 'koneksi.php';
session_start();

$id_buku = $_GET['id'];
    // Query untuk menghapus data buku berdasarkan ID
    $query = "DELETE FROM buku WHERE id_buku = '$id_buku'"; // Tambahkan tanda kutip pada $id_buku
    $result = mysqli_query($koneksi, $query);
    $_SESSION['sukses']= 'Data Berhasil di hapus';
    header("location:bukubs.php?");


?>
