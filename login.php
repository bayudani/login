<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> </head>

<body>
  <?php
session_start();
  ?>
  <div class="container">
    <div class="card mt-5">
      <div class="card-header text-center">
        <strong>HALAMAN LOGIN</strong>
      </div>
      <div class="card-body">
        <br />
        <br />
       
        <form method="post" action="cek_login.php">
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="Username">
            <small class="form-text text-muted">Silahkan input username anda.</small>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="Sandi">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input">
            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="register.php" class="btn btn-primary">register</a>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>


  <?php if (@$_SESSION['Sukses']) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'data berhasil di simpan',
            })
        </script>
    <?php unset($_SESSION['Sukses']);
    } ?>

  <?php if (@$_SESSION['errorUs']) { ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Gagal',
                text: 'Password salah',
            })
        </script>
    <?php unset($_SESSION['errorUs']);
    } ?>

  <?php if (@$_SESSION['errorUser']) { ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Gagal',
                text: 'Username salah',
            })
        </script>
    <?php unset($_SESSION['errorUser']);
    } ?>
  

  

</body>

</html>


