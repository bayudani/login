<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud buku</title>
</head>

<body>
    <?php

    session_start();
    if ($_SESSION['status'] != "login") {
        # code...
        header("location:login.php?pesan=belum_login");
    }
    ?>

    <h2>Crud data buku</h2>
    <br>

    <a href="tambahbuku.php">+ Tambah buku</a>
    <a href="admin.php">+ Kembali</a>
    <br><br>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Buku</th>
            <th>Penerbit</th>
            <th>Halaman</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>

        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * From buku");
        while ($data_buku = mysqli_fetch_array($data)) {
        ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data_buku['Nama_buku'] ?></td>
                <td><?php echo $data_buku['Penerbit'] ?></td>
                <td><?php echo $data_buku['Halaman'] ?></td>
                <td><?php echo $data_buku['Keterangan'] ?></td>

                <td>
                    <a href="edit.php?id= <?php echo $data_buku['id_buku'] ?>">Edit</a>
                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Hapus barang
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="hapus.php?id=<?php echo $barang['id_buku']; ?>" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>



                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>