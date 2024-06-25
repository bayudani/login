<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
<?php 
include 'koneksi.php';
 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idbarang = $_POST['id_barang'];
    $nama = $_POST['Nama_barang']; 
    $jumlah = $_POST['Jumlah']; 
    $tahunMasuk = $_POST['Tahun_masuk']; 
    $status = $_POST['Status']; 

    // Periksa koneksi database
    
        // Lakukan operasi query
        $query = "INSERT INTO INVENTARIS (id_barang, Nama_barang, Jumlah, Tahun_masuk, Status) VALUES ('$idbarang','$nama','$jumlah','$tahunMasuk','$status')";
        $result = mysqli_query($koneksi, $query);
        $_SESSION['berhasil'] = 'berhasil tambah';
        header("location:barang.php?");
}

?>

    <div class="container card shadow mt-4">
        <h1>Tambah barang</h1>
        <form method="post" action="tambahBarang.php">
            <div class="mb-3">
                <label for="id_barang" class="form-label">id_barang</label>
                <input type="text" class="form-control" id="id_barang" name="id_barang" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="Nama_barang" class="form-label">Nama barang</label>
                <input type="text" class="form-control" id="Nama_barang" name="Nama_barang">
            </div>
            <div class="mb-3">
                <label for="Penerbit" class="form-label">Jumlah</label>
                <input type="text" class="form-control" id="Jumlah" name="Jumlah">
            </div>
            <div class="mb-3">
                <label for="Halaman" class="form-label">Tahun masuk</label>
                <input type="text" class="form-control" id="Tahun_masuk" name="Tahun_masuk">
            </div>
            <div class="mb-3">
                <label for="Status" class="form-label">Status</label>
                <input type="text" class="form-control" id="Status" name="Status">
            </div>
            <button type="submit" class="btn btn-primary mb-2 mt-2">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>