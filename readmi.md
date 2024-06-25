 <!-- <?php
        session_start();

        if (isset($_GET['pesan'])) {
          $pesan = $_GET['pesan'];

          if ($pesan == "gagal") {
            echo "<script>
              Swal.fire({
                icon: 'error',
                title: 'Login Gagal!',
                text: 'Username dan password salah!'
              });
            </script>";
          } else if ($pesan == "berhasil") {
            echo "<script>
              Swal.fire({
                icon: 'success',
                title: 'Berhasil login!',
                text: 'Anda telah login.'
              });
            </script>";
          }else if ($pesan == "logout"){
            echo "<script>
              Swal.fire({
                icon:'success',
                title: 'Berhasil logout!',
                text: 'Anda telah logout.'
              });
            </script>";
            
          } else if ($pesan == "belum_login") {
            echo "<script>
              Swal.fire({
                icon: 'warning',
                title: 'Harap Login!',
                text: 'Anda harus login untuk mengakses halaman admin.'
              }).then(() => {
                window.location.href = 'login.php';
              });
            </script>";
          }
          // Unset pesan session after displaying it
          unset($_SESSION['pesan']);
        }
        ?> -->

        <?php
include 'koneksi.php';
$query = "SELECT from user";
$result = mysqli_query($koneksi, $query);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "User tidak ditemukan!";
    exit;
}
?>