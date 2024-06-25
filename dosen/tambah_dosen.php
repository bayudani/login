<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD PHP dan MySQLi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                <strong>Data Dosen</strong>
            </div>
            <div class="card-body">
                <br />
                <br />
                <form action="storedosen.php" method="post"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input type="number" id="nidn" name="nidn" class="form-control" require />
                    </div>
                    <div class="form-group">
                        <label for="nama">NAMA</label>
                        <input type="text" id="nama" name="nama" class="form-control" require />
                    </div>
                    <div class="form-group">
                        <label for="foto">FOTO</label>
                        <input type="file" id="foto" name="foto" class="form-control" require />
                    </div>
                    <div class="form-group">
                        <label for="alamat">ALAMAT</label>
                        <input type="text" id="alamat" name="alamat" class="form-control" require />
                    </div>

                    <div class="form-group">
                        <label for="">prodi</label>
                        <select name="prodi" class="form-control" id="">
                            <option value=""> -- pilih prodi -- </option>
                            <option value="RPL">Rekayasa perangkat lunak</option>
                            <option value="MESIN">Mesin</option>
                            <option value="SIPIL">Sipil</option>
                            <option value="TI">Teknik informatika</option>
                            <option value="KSI">Keamanan sistem informasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpab">
                    </div>
                </form>



</body>
</html>            