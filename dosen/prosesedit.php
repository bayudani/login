<?php
// File: proses_edit_buku.php

// Mengimpor file koneksi ke database
include '../koneksi.php';



// Mendapatkan data dari form
$nidn = $_POST['nidn'];
$nama = $_POST['nama'];
$prodi = $_POST['prodi'];
$alamat = $_POST['alamat'];


// Memastikan semua field terisi
if (!empty($nidn) && !empty($nama) && !empty($prodi) && !empty($alamat)) {
    // Query untuk mengupdate data buku di database
    $query = "UPDATE dosen SET nidn = '$nidn', nama = '$nama', prodi = '$prodi', alamat = '$alamat' WHERE nidn = '$nidn'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: dosen.php?pesan=update");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Error: Pastikan semua field terisi dengan benar.";
}
?>