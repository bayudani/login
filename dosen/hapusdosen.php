// Mengimpor file koneksi ke database
<?php
include '../koneksi.php';


$nidn = $_GET['id'];
    // Query untuk menghapus data buku berdasarkan ID
    $query = "DELETE FROM dosen WHERE nidn = '$nidn'"; // Tambahkan tanda kutip pada $nidn
    $result = mysqli_query($koneksi, $query);
    header("location:dosen.php?pesan=hapus");


?>