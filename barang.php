<?php
include 'koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />

</head>

<body>
    <?php
    session_start();
    if ($_SESSION['status'] != "login") {
        # code...
        header("location:login.php?pesan=belum_login");
    }
    $level = $_SESSION['level'];
    ?>
    <div class="container mt-2">
        <div class="card">
            <div class="header text-center bg-body-secondary">
                <h4>CRUD Data inventaris</h4>
            </div>
            <div class="row mt-3">
                <div class="col-md">
                    <a href="tambahBarang.php" class="btn btn-primary">Tambah Data</a>
                    <a href="admin.php" class="btn btn-primary">Kembali</a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-xxl mx-auto ">
                    <table class="table table-bordered " id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama_barang</th>
                                <th>Jumlah</th>
                                <th>Tahun masuk</th>
                                <th>Status</th>
                                <?php if ($level == 'admin' || $level == 'karyawan'){?>
                                <th>Aksi</th>
                                <?php }?>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $data = mysqli_query($koneksi, "SELECT * from inventaris");
                            while ($barang = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $barang['Nama_barang']; ?></td>
                                    <td><?php echo $barang['jumlah']; ?></td>
                                    <td><?php echo $barang['Tahun_masuk']; ?></td>
                                    <td><?php echo $barang['Status']; ?></td>
                                    <td>
                                    <?php if ($level == 'admin' || $level == 'karyawan'){?>
                                        <a href="hapusbarang.php?id=<?php echo $barang['id_barang']; ?>" class="btn btn-danger">Hapus</a>
                                    <?php }?>
                                    

                                       
                                    <?php if ($level == 'admin'){?>
                                        <a href="editbarng.php?id=<?php echo $barang['id_barang']; ?>" class="btn btn-warning">edit</a>
                                       <?php }?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php if (@$_SESSION['berhasil']) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'data berhasil di simpan',
            })
        </script>
    <?php unset($_SESSION['berhasil']);
    } ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $("#dataTable").DataTable({
                searching: true, // Enable search feature
                //   responsif:true,
            });
        });
    </script>
</body>

</html>