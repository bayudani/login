<?php
session_start();

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Username = $_POST['Username'];
    $password = $_POST['Sandi'];

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $koneksi->prepare("SELECT id, nama, Sandi, level FROM user WHERE Username=?");
    if ($stmt === false) {
        die("Error preparing statement: " . $koneksi->error);
    }

    $stmt->bind_param("s", $Username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Debugging
       error_log("Hashed password from database: ". $row['Sandi']);
        error_log("Entered password: ". $password);

        if (password_verify($password, $row['Sandi'])) {
            $_SESSION['Username'] = $Username;
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['level'] = $row['level'];
            $_SESSION['status'] = "login";

            if ($row['level'] == 'admin') {
                $_SESSION['level'] = "admin";
                header("Location: admin.php");
            } elseif ($row['level'] == 'karyawan') {
                $_SESSION['level'] = "karyawan";
                header("Location: admin.php");
            } else {
                $_SESSION['level'] = "member";
                header("Location: admin.php");
          
            }
              exit();
        } else {
            // Password verification failed

            $_SESSION['errorUs'] = 'Password salah';
            error_log("Password verification failed!");
            header("location: login.php");
            exit();
        }
    } else {
        // Username$Username not found
        $_SESSION['errorUser'] = 'Username salah salah';
        error_log("Username not found: " . $Username);
        header("location: login.php?");
        exit();
    }

    $stmt->close();
}

$koneksi->close();
?>