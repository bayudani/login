<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> </head>

    <title>Document</title>
</head>
<body>
<?php
session_start();
// Periksa apakah pengguna sudah login dan memiliki role 'member'
// if ($_SESSION['status'] != "login" || $_SESSION['level'] != "admin") {
//  header("Location: login.php");
//  exit();
// }
 if ($_SESSION['status']!="login") {
    # code...
    header("location:login.php?");
}
$level = $_SESSION['level'];
$username = $_SESSION['Username'];


?>



<div class="container">
    <div class="card mt-5">
        <div class="jumbotron">
            <h1 class="display-4">
                Hello, <?php echo  htmlspecialchars($username); ?>! <br>
                Role anda, <?php echo  htmlspecialchars($level); ?>!
            </h1>

            <p class="lead">Anda sudah berada di halaman utama</p>
            <hr class="my-4">

            <p>Untuk mengakes data buku silahkank klik link berikut</p>
            <a class="btn btn-primary" href="bukubs.php" role="button">Data buku</a>
            <a class="btn btn-primary" href="barang.php" role="button">Data barang</a>
            <a class="btn btn-primary" href="./dosen/dosen.php" role="button">Data dosen</a>
            <a class="btn btn-primary" href="./dosen/mahasiswa.php" role="button">Data mahasiswa</a>

            <?php if ($level === 'admin') {?>
                <a class="btn btn-primary" href="user.php" role="button">Data user</a>
            <?php }?>

            <br>

            <h3 class="display-4">
                <a class="btn btn-info btn-sm alert_notif" href="logout.php" role="button">Logout</a>
            </h3>
        </div>
    </div>
</div>


<?php if(@$_SESSION['logout']){ ?>
            <script>
                Swal.fire({            
                    icon: 'success',                   
                    title: 'Sukses',    
                    text: 'Berhasil logout',                        
                    timer: 3000,                                
                    showConfirmButton: true
                })
                </script>
                <?php unset($_SESSION['logout']);}?>

<script>

  $('.alert_notif').on('click',function(){
    var getlink = $(this).attr('href');
    Swal.fire({
                  title: "Apakah anda yakin?",            
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  confirmButtonText: 'Ya',
                  cancelButtonColor: '#3085d6',
                  cancelButtonText: "Batal"
              
              }).then(result => {
                  //jika klik ya maka arahkan ke proses.php
                  if(result.isConfirmed){
                      window.location.href = getLink;
                      
                  }
              })
              return false;
  })
</script> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>


</body>
</html>