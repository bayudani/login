<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
<?php 
include 'koneksi.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idbuku = $_POST['id_buku'];
    $nama = $_POST['Nama_buku']; 
    $penerbit = $_POST['Penerbit']; 
    $Halaman = $_POST['Halaman']; 
    $Keterangan = $_POST['Keterangan']; 

    // Periksa koneksi database
    
        // Lakukan operasi query
        $query = "INSERT INTO buku (id_buku, Nama_buku, Penerbit, Halaman, Keterangan) VALUES ('$idbuku','$nama','$penerbit','$Halaman','$Keterangan')";
        $result = mysqli_query($koneksi, $query);
        $_SESSION ['berhasil'] = 'berhasil simpan data';
        header("location:bukubs.php");
}

?>

    <div class="container mt-4 card shadow">
        <h1>Tambah buku</h1>
        <form method="post" action="tambah_buku.php">
            <div class="mb-3">
                <label for="id_bkuu" class="form-label">Id_buku</label>
                <input type="text" class="form-control" id="id_buku" name="id_buku" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="Nama_buku" class="form-label">Nama buku</label>
                <input type="text" class="form-control" id="Nama_buku" name="Nama_buku">
            </div>
            <div class="mb-3">
                <label for="Penerbit" class="form-label">penerbit</label>
                <input type="text" class="form-control" id="Penerbit" name="Penerbit">
            </div>
            <div class="mb-3">
                <label for="Halaman" class="form-label">halaman</label>
                <input type="text" class="form-control" id="Halaman" name="Halaman">
            </div>
            <div class="mb-3">
                <label for="Keterangan" class="form-label">ket</label>
                <input type="text" class="form-control" id="Keterangan" name="Keterangan">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>