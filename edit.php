<?php
// File: edit_buku.php

// Mengimpor file koneksi ke database
include 'koneksi.php';

// Mendapatkan ID buku dari URL
$id_buku = $_GET['id'];

// Query untuk mengambil data buku berdasarkan ID
$query = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
$result = mysqli_query($koneksi, $query);
$buku = mysqli_fetch_assoc($result);

if (!$buku) {
    echo "Buku tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container card shadow">
    <h2 class="my-4">Edit Buku</h2>
    <form action="prosesedit.php" method="post">
        <div class="form-group">
            <label for="id_buku">ID Buku:</label>
            <input type="text" class="form-control" id="id_buku" name="id_buku" value="<?php echo $buku['id_buku']; ?>" readonly>
        </div>
        
        <div class="form-group">
            <label for="nama_buku">Nama Buku:</label>
            <input type="text" class="form-control" id="nama_buku" name="Nama_buku" value="<?php echo $buku['Nama_buku']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="penerbit">Penerbit:</label>
            <input type="text" class="form-control" id="penerbit" name="Penerbit" value="<?php echo $buku['Penerbit']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="halaman">Halaman:</label>
            <input type="number" class="form-control" id="halaman" name="Halaman" value="<?php echo $buku['Halaman']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <input type="text" class="form-control" id="keterangan" name="Keterangan" value="<?php echo $buku['Keterangan']; ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Buku</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>