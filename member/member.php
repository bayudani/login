<?php
session_start();
// Periksa apakah pengguna sudah login dan memiliki role 'member'
if ($_SESSION['status'] != "login" || $_SESSION['level'] != "member") {
 header("Location: login.php?pesan=tolak");
 exit();
}
echo "<h1>Selamat datang, " . $_SESSION['nama'] . " (Member)<h1>";
?>

<!-- Konten dashboard member -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Document</title>
</head>
<body>
<a href="../logout.php" class="alert_notif">LogOut</a>
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

</body>
</html>

