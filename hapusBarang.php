<?php
// File: hapus_buku.php

// Mengimpor file koneksi ke database
include 'koneksi.php';
session_start();

$id_barang = $_GET['id'];
    // Query untuk menghapus data buku berdasarkan ID
    $query = "DELETE FROM inventaris WHERE id_barang = '$id_barang'"; // Tambahkan tanda kutip pada $id_buku
    $result = mysqli_query($koneksi, $query);
    $_SESSION['sukses']= 'Data Berhasil di hapus';

    header("location:barang.php");


?>
