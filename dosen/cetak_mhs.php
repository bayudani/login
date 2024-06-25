<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 style="text-align: center;">Daftar Data Mahasiswa</h2>
        <br>
        <br>
        <br>
        <table class="table table-bordered">
            <tr>
                <th width="20%">NIM</th>
                <th width="20%">NAMA</th>
                <th width="20%">PRODI</th>
                <th width="20%">ALAMAT</th>
                <th width="20%">FOTO</th>
            </tr>
            <?php
            $data = mysqli_query($koneksi, "select * from mahasiswa");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td><?php echo $d['nim']; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['prodi']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td>
                        <!-- <img src="../gambar/<?php echo $d['foto'] ?>" width="80" height="80"> -->
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>