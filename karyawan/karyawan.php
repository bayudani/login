<?php
session_start();
// Periksa apakah pengguna sudah login dan memiliki role 'karyawan'
if ($_SESSION['status'] != "login" || $_SESSION['level'] != "karyawan") {
 header("Location: login.php?pesan=tolak");
 exit();
}
echo "<h1>Selamat datang, " . $_SESSION['nama'] . " (Karyawan)</h1>";
?>
<a href="logout.php">LogOut</a>
<!-- Konten dashboard karyawan --