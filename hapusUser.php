// Mengimpor file koneksi ke database
<?php
include 'koneksi.php';
session_start();

$id = $_GET['id'];
    // Query untuk menghapus data buku berdasarkan ID
    $query = "DELETE FROM user WHERE id = '$id'"; // Tambahkan tanda kutip pada $nidn
    $result = mysqli_query($koneksi, $query);
    $_SESSION['berhasil']= 'Data Berhasil di hapus';
    header("location:user.php");

?>