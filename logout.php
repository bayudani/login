<?php
// mengaktifkan session
session_start();
// menghapus semua session
$_SESSION['logout'] = 'berhasil logout';
header("location:login.php");
session_destroy();
// mengalihkan halaman sambil mengirim pesan logout


?>