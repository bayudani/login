<?php
// File: proses_edit_buku.php

// Mengimpor file koneksi ke database
include 'koneksi.php';



// Mendapatkan data dari form
$id_barang = $_POST['id_barang'];
$Nama_barang = $_POST['Nama_barang'];
$Tahun_masuk = $_POST['Tahun_masuk'];
$Jumlah = $_POST['jumlah'];
$Status = $_POST['Status'];

// Memastikan semua field terisi
if (!empty($id_barang) && !empty($Nama_barang) && !empty($Tahun_masuk) && !empty($Jumlah) && !empty($Status)) {
    // Query untuk mengupdate data buku di database
    $query = "UPDATE inventaris SET Nama_barang = '$Nama_barang', Tahun_masuk = '$Tahun_masuk', jumlah = '$Jumlah', Status = '$Status' WHERE id_barang = '$id_barang'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: barang.php?pesan=update");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Error: Pastikan semua field terisi dengan benar.";
}
?>