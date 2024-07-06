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
$username = $_SESSION['nama'];


?>



<div class="container">
    <div class="card mt-5">
        <div class="jumbotron">
            <h1 class="display-4">
                Hello, <?php echo  htmlspecialchars($username); ?>! <br>
              </h1>
             <h5> Role anda, <?php echo  htmlspecialchars($level); ?>!</h5> 

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

           <!-- Button trigger modal -->
<button type="button" class="btn btn-info mt-2" data-toggle="modal" data-target="#exampleModal">
 Logout
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary"><a href="logout.php"></a></button> -->
        <a class="btn btn-info btn-sm alert_notif" href="logout.php" role="button">Logout</a>
      </div>
    </div>
  </div>
</div>
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

<!-- bs -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>