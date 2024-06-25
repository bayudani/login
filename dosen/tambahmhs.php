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
                <form method="post" action="storemahasiswa.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="number" name="nim" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">NAMA</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">PRODI</label>
                        <input type="text" name="prodi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">ALAMAT</label>
                        <input type="text" name="alamat" class="form-control" required>
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