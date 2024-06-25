<?php

include '../koneksi.php';

// membuat variabel untuk menampung data dari form
$nidn = $_POST['nidn'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$prodi = $_POST['prodi'];
$fotoDosen = $_FILES['foto']['name'];

// cek dlu jika ada gambar jalankan codingan ini

if ($fotoDosen) {
    # code...

    $ekstensi_diperbolehkan = array('png', 'jpg');
    $x = explode('.', $fotoDosen);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(1, 999);
    //
    // menggabungkan angka acak dengan nama file sebenarnya
    $nama_gambar_baru = $angka_acak . '_' . $fotoDosen;
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        // memindahkan file gamabr ke folder gambar diluar folder dosen
        move_uploaded_file($file_tmp, '../gambar/' . $nama_gambar_baru);
        // menjalankan query insert
        $query = "INSERT INTO dosen VALUES ('$nidn','$nama','$alamat','$prodi','$nama_gambar_baru')";
        $result = mysqli_query($koneksi, $query);
        if (!$result) {
            die("Query gagal dijalankan:" . mysqli_errno($koneksi)) .
                " - " . mysqli_error($koneksi);
        } else {
            header("location:dosen.php?pesan=input");
            echo "<script>
            Swal.fire({
               icon: 'success',
               title: 'Success',
               text: 'Data berhasil ditambahkan!'
             });
             window.location.href='dosen.php'</script>";
        }
    } else {
        echo "<script>
        Swal.fire({
           icon: 'error',
           title: 'Oops...',
           text: 'Format gambar tidak sesuai!'
         });
         window.location.href='dosen.php'</script>";
    }
} else {
    $query = "INSERT INTO dosen (nidn, nama, prodi, alamat, foto) 
 VALUES ('$nidn', '$nama', '$alamat', '$prodi', null)";
    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil ditambah.');window.location='dosen.php';</script>";
    }
}
