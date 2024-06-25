<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Dosen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<?php
// File: edit_buku.php

// Mengimpor file koneksi ke database
include '../koneksi.php';

// Mendapatkan ID buku dari URL
$nidn = $_GET['id'];

// Query untuk mengambil data buku berdasarkan ID
$query = "SELECT * FROM dosen WHERE nidn = '$nidn'";
$result = mysqli_query($koneksi, $query);
$dosen = mysqli_fetch_assoc($result);

if (!$dosen) {
    echo "dosen tidak ditemukan!";
    exit;
}
?>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                <strong>Edit Data Dosen</strong>
            </div>
            <div class="card-body">
                <br />
                <br />
                <form action="prosesedit.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input type="text" id="nidn" name="nidn" value="<?php echo $dosen['nidn'];?>" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" value="<?php echo $dosen['nama'];?>" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" id="foto" name="foto" class="form-control"  />
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat" value="<?php echo $dosen['alamat'];?>" class="form-control />
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <select name="prodi" class="form-control" required>
                            <option value="">-- pilih prodi --</option>
                            <option value="RPL">Rekayasa Perangkat Lunak</option>
                            <option value="MESIN">Mesin</option>
                            <option value="SIPIL">Sipil</option>
                            <option value="TI">Teknik Informatika</option>
                            <option value="KSI">Keamanan Sistem Informasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
