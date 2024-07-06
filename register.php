<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                <strong>HALAMAN REGISTER</strong>
            </div>
            <div class="card-body">
                <br />
                <br />

                <form method="post" action="simpan_register.php">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>

                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>

                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required>

                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>

                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="sandiulang" required>

                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <input type="radio" name="jk" value="Laki-Laki" required> Laki-Laki
                        <input type="radio" name="jk" value="Perempuan" required> Perempuan

                    </div>
                    <!-- <div class="form-group">
                        <label>Role</label><br>
                        <input type="radio" name="level" value="member" required> member
                        <input type="radio" name="level" value="admin" required> admin
                        <input type="radio" name="level" value="karyawan" required> karyawan

                    </div> -->
                    <!-- <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1" >One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select> -->
                    <button type="submit" class="btn btn-primary">Submit</button>

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
    <?php unset($_SESSION['sukses']);
    } ?>
</body>

</html>