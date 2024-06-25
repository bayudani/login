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
</head>

<body>
    <?php
session_start();
if ($_SESSION['status']!="login") {
    # code...
    header("location:login.php?");
}

$level = $_SESSION['level'];
   
    ?>
    <div class="container mt-2">
        <div class="card">
            <div class="header text-center bg-body-secondary">
                <h4>CRUD Data Buku</h4>
            </div>

            <div class="row mt-3">
                <div class="col-md">
                    pencarian
                    <form action="bukubs.php" method="get">
                        <label>Cari :</label>
                        <input type="text" name="cari">
                        <input type="submit" value="Cari">
                    </form>

                    <?php if ($level == 'admin' || $level == 'karyawan') { ?>
                    <a href="tambah_buku.php" class="btn btn-primary">Tambah Data</a>
                    <?php }?>
                    <button class="btn btn-primary" onclick="print()">Cetak</button>

                    <a href="admin.php" class="btn btn-info">Kembali</a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-xxl mx-auto ">
                    <table class="table table-bordered aligns-item-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penerbit</th>
                                <th>Halaman</th>
                                <th>Keterangan</th>
                                <?php if ($level == 'admin' || $level == 'karyawan'){?>
                                <th>Aksi</th>
                                <?php }?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['cari'])) {

                                $cari = $_GET['cari'];
                                $data = mysqli_query($koneksi, "select * from buku where nama_buku
                                like '%" . $cari . "%' or penerbit like '%" . $cari . "%' or
                                halaman like '%" . $cari . "%'");
                            } else {
                                $data = mysqli_query($koneksi, "select * from buku");
                            }
                            $no=1;
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['Nama_buku']; ?></td>
                                    <td><?php echo $d['Penerbit']; ?></td>
                                    <td><?php echo $d['Halaman']; ?></td>
                                    <td><?php echo $d['Keterangan']; ?></td>
                                    <td>
                                        <?php if ($level == 'admin' ){?>
                                        <a href="hapus.php?id=<?php echo $d['id_buku']; ?>" class="btn btn-danger alert_notif">Hapus</a>
                                        <?php }?>

                                        <?php if ($level == 'admin'|| $level == 'karyawan'){?>
                                        <a href="edit.php?id=<?php echo $d['id_buku'];?>" class="btn btn-info">edit</a>
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

    <!-- alert -->
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
    <?php if (@$_SESSION['update']) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'data berhasil di ubah',
            })
        </script>
    <?php unset($_SESSION['update']);
    } ?>


<?php if (@$_SESSION['hapus']) { ?>
        <script>
            swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'data berhasil dihapus',
                timer: 3000,
                showConfirmButton: true
            });
        </script>
    <?php unset($_SESSION['hapus']);
    } ?>


    <!-- CETAK -->
    <script>
        function print(){
            window.print();
        }
    </script>

<script>
        $('.alert_notif').on('click', function() {
            var getLink = $(this).attr('href');
            Swal.fire({
                title: "Yakin hapus data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonColor: '#3085d6',
                cancelButtonText: "Batal"

            }).then(result => {
                //jika klik ya maka arahkan ke proses.php
                if (result.isConfirmed) {
                    window.location.href = getLink;

                }
            })
            return false;
        });
    </script>

   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>