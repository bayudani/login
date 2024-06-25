<?php
// File: hapus_buku.php

// Mengimpor file koneksi ke database
include 'koneksi.php';


$id_barang = $_GET['id'];
    // Query untuk menghapus data buku berdasarkan ID
    $query = "DELETE FROM inventaris WHERE id_barang = '$id_barang'"; // Tambahkan tanda kutip pada $id_buku
    $result = mysqli_query($koneksi, $query);
    header("location:barang.php?pesan=hapus");


?>
