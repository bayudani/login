<?php
include 'koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['sandiulang'];
    $jenis_kelamin = $_POST['jk'];
    $role = $_POST['level'];


    // periksa kesamaan password dan confirm password
    if ( $password === $confirm_password){
        // enkripsi password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // siapkan dan jalanakan querry untuk menyimpan data
        $stmt = $koneksi->prepare("INSERT INTO user (nama,jenis_kelamin,email,username,sandi,level) VALUE (?,?,?,?,?,?)");
        if ($stmt == false) {
            die("Error preparing statment: ". $koneksi->error);
        }

        // bind parameters
        $stmt->bind_param("ssssss", $nama, $jenis_kelamin, $email, $username, $hashed_password,$role);

        // excute statment
        if ($stmt->execute()) {
            $_SESSION ['Sukses'] = 'data berhasil disimpan';
            header("location:login.php");
        echo "Data berhasil disimpan";
        }else{
            echo "Gagal menyimpan data". $stmt->error;
        }$stmt->close();
    }else{
        echo "Kesamaan password dan confirm password tidak sesuai";
    }
    $koneksi->close();
}else{
    echo 'invalid request method';
}
?>