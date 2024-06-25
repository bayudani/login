<?php
// File: edit user

// Mengimpor file koneksi ke database
include 'koneksi.php';

// Mendapatkan ID user dari URL
$id = $_GET['id'];

// Query untuk mengambil data buku berdasarkan ID
$query = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "user tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit user</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container card shadow">
    <h2 class="my-4">Edit user</h2>
    <form action="prosesUser.php" method="post">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <div class="form-group">
            <label for="nama">ID user:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user['nama']; ?>" readonly>
        </div>
        
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['Username']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <select class="form-control" id="role" name="level" required>
                <option value="admin" <?php if ($user['level'] == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="karyawan" <?php if ($user['level'] == 'karyawan') echo 'selected'; ?>>Karyawan</option>
                <option value="member" <?php if ($user['level'] == 'member') echo 'selected'; ?>>Member</option>
            </select>
        </div>
       
       
        
        <button type="submit" class="btn btn-primary mb-3">Update user</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>