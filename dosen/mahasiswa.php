<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD PHP dan MYSQLi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <?php


    session_start();
    $level = $_SESSION['level'];
    ?>
    <div class="container">
        <h2 class="mt-4 text-center">DAFTAR DATA MAHASISWA</h2>
        <hr>
        <a href="tambahmhs.php" class="btn btn-primary mb-3">TAMBAH MAHASISWA</a>
        <a href="chart_mhs.php" class="btn btn-primary mb-3">Lihat Chart</a>
        <a href="../admin.php" class="btn btn-primary mb-3">kembali</a>
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>PRODI</th>
                    <th>ALAMAT</th>
                    <?php if ($level == 'admin' || $level == 'karyawan') { ?>
                        <th>ACTION</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $d['nim']; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['prodi']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td>
                        <?php if ($level == 'admin' || $level == 'karyawan') { ?>
                            <a href="editmhs.php?id=<?php echo $d['nim']; ?>" class="btn btn-success btn-sm">EDIT</a>
                        <?php }?>

                        <?php if ($level == 'admin') { ?>
                            <a href="hapusmhs.php?id=<?php echo $d['nim']; ?>" class="btn btn-danger btn-sm alert_notif">HAPUS</a>
                        <?php }?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
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


    <!-- alert -->

    <?php if (@$_SESSION['sukses']) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'data berhasil dihapus',
                timer: 3000,
                showConfirmButton: true
            })
        </script>
    <?php unset($_SESSION['sukses']);
    } ?>



    <?php if (@$_SESSION['berhasil']) { ?>
        <script>
            swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'data berhasil diubah',
                timer: 3000,
                showConfirmButton: true
            });
        </script>
    <?php unset($_SESSION['berhasil']);
    } ?>

    <?php if (@$_SESSION['tambah']) { ?>
        <script>
            swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'data berhasil diubah',
                timer: 3000,
                showConfirmButton: true
            });
        </script>
    <?php unset($_SESSION['berhasil']);
    } ?>


    <!-- di bawah ini adalah script untuk konfirmasi hapus data dengan sweet alert  -->
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



</body>

</html>