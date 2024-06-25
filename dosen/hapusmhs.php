// Mengimpor file koneksi ke database
<?php
include '../koneksi.php';
session_start();

$nim = $_GET['id'];
    // Query untuk menghapus data buku berdasarkan ID
    $query = "DELETE FROM mahasiswa WHERE nim = '$nim'"; // Tambahkan tanda kutip pada $nidn
    $result = mysqli_query($koneksi, $query);
    $_SESSION['sukses']= 'Data Berhasil di hapus';
    header("location:mahasiswa.php");

?>