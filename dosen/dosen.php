<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Upload file menggunakan php mysqli</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<?php
if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];
    if ($pesan == "hapus") {
        echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'hapus',
        text: 'berhasil hapus'
      });
    </script>";
    } else if ($pesan == "input") {
        echo "<script>
      Swal.fire({
        icon:'success',
        title: 'input',
        text: 'berhasil input'
      });
    </script>";
    }else if($pesan == "update"){
        echo "<script>
      Swal.fire({
        icon:'success',
        title: 'Success',
        text: ' data berhasil diubah'
      });
    </script>";
    }
}
?>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow">
        <div class="container">
            <a class="navbar-brand" href="#">POLBENG OKE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#project">Project</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
    <!-- Jumbotron -->
    <section class="jumbotron text-center">
        <img src="../gambar/1.jpg" width="150" class="img-thumbnail rounded-circle">
        <h1 class="display-4">Politeknik Negeri Bengkalis</h1>
        <p class="lead">Kampus Vokasi | Kuliah? Polbeng Aja!</p>
    </section>
    <!-- end Jumbotron -->
    <!-- Project -->
    <section id="project">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-center mt-2">Dosen Jurusan TI</h2>
                </div>

                <a href="tambahdosen.php" class="btn btn-primary"></a>
            </div>
            <div class="row justify-content-center">
                <?php 
                $no = 1; 
                $data = mysqli_query($koneksi, "select * from dosen"); 
                while ($d = mysqli_fetch_array($data)) {                 ?>
                <div class="col-md-4 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../gambar/<?php echo $d['foto'] ?>" class="card-img-top" alt="..." width="30%">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $d['nama']; ?></h5>
                            <p class="card-text"><?php echo "Program Studi " . $d['prodi'] . "<br>"; 
                                                        echo $d['alamat']; ?></p> <a href="#"
                                class="btn btn-primary">Contact</a>
                                <a href="hapusdosen.php?id=<?php echo $d['nidn']; ?>" class="btn btn-danger">Hapus</a>
                                <a href="editDosen.php?id=<?php echo $d['nidn']; ?>" class="btn btn-info">edit</a>

                        </div>
                    </div>
                </div>
                <?php 
                } 
                ?>
            </div>
        </div>
    </section>
    <!-- end Project -->
</body>

</html>