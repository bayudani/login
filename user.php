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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['status'] != "login") {
        # code...
        header("location:login.php?pesan=belum_login");
    }

    ?>
    <div class="container mt-2">
        <div class="card">
            <div class="header text-center bg-body-secondary">
                <h4>Data user</h4>
            </div>
            <div class="row mt-3">
                <div class="col-md">
                    <!-- <a href="tambahBarang.php" class="btn btn-primary">Tambah unser</a> -->
                    <a href="admin.php" class="btn btn-primary">Kembali</a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-xxl mx-auto ">
                    <table class="table table-bordered aligns-item-center " id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>username</th>
                                <th>level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $data = mysqli_query($koneksi, "SELECT * from user");
                            while ($user = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $user['nama']; ?></td>
                                    <td><?php echo $user['Username']; ?></td>
                                    <td><?php echo $user['level']; ?></td>
                                    <td>
                                        <a href="hapusUser.php?id=<?php echo $user['id']; ?>" class="btn btn-danger alert_notif">Hapus</a>
                                        <a href="edituser.php?id=<?php echo $user['id']; ?>" class="btn btn-warning">edit</a>

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
    </script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>