<?php
// File: edit_buku.php

// Mengimpor file koneksi ke database
include '../koneksi.php';
session_start();
// Mendapatkan ID buku dari URL
$nim = $_GET['id'];

// Query untuk mengambil data buku berdasarkan ID
$query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$result = mysqli_query($koneksi, $query);
$mahasiswa = mysqli_fetch_assoc($result);

if (!$mahasiswa) {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="my-4">Edit Mahasiswa</h2>
    <form action="proses_mhs.php" method="post">
    <div class="form-group">
        <label>NIM</label>
        <input type="number" name="nim" class="form-control" value="<?php echo $mahasiswa['nim']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="">NAMA</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $mahasiswa['nama']; ?>" required>
    </div>
    <div class="form-group">
        <label for="">PRODI</label>
        <input type="text" name="prodi" class="form-control" value="<?php echo $mahasiswa['prodi']; ?>"  required>
    </div>
    <div class="form-group">
        <label for="">ALAMAT</label>
        <input type="text" name="alamat" class="form-control" value="<?php echo $mahasiswa['alamat']; ?>" required>
    </div>
        <button type="submit" class="btn btn-primary">Update Mahasiswa</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>