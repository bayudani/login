<?php
// File: edit_inventaris.php

// Mengimpor file koneksi ke database
include 'koneksi.php';

// Mendapatkan data dari form
$id_barang = $_GET['id'];

// Query untuk mengambil data buku berdasarkan ID
$query = "SELECT * FROM inventaris WHERE id_barang = '$id_barang'";
$result = mysqli_query($koneksi, $query);
$barang = mysqli_fetch_assoc($result);

if (!$barang) {
    echo "barang tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Inventaris</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="my-4">Edit Inventaris</h2>
    <form action="prosesEditbarang.php" method="post">
        <div class="form-group">
            <label for="id_barang">Kode Barang:</label>
            <input type="text" class="form-control" id="id_barang" name="id_barang" value="<?php echo $barang['id_barang']; ?>" readonly>
        </div>
        
        <div class="form-group">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" class="form-control" id="nama_barang" name="Nama_barang" value="<?php echo $barang['Nama_barang']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $barang['jumlah']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="tahun_masuk">Tahun Masuk:</label>
            <input type="number" class="form-control" id="tahun_masuk" name="Tahun_masuk" value="<?php echo $barang['Tahun_masuk']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" id="status" name="Status" value="<?php echo $barang['Status']; ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Barang</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>