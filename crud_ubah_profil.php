<?php
session_start();
include 'koneksi.php';

if(isset($_POST['btnUbah'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_lama = $_POST['password_lama'];

    if($password == ""){
        mysqli_query($koneksi, "UPDATE dat_masyarakat SET nama = '$nama', telp = '$telp', alamat = '$alamat', username = '$username', password = '$password_lama' WHERE id = '$id'");
        echo "<script>alert('Data Berhasil Diubah'); document.location='profil.php'</script>";
    } else {
        mysqli_query($koneksi, "UPDATE dat_masyarakat SET nama = '$nama', telp = '$telp', alamat = '$alamat', username = '$username', password = '$password' WHERE id = '$id'");
        echo "<script>alert('Data Berhasil Diubah'); document.location='profil.php'</script>";
    }
    
}


// if (isset($_POST['btnUbah'])) {
//     $id = $_SESSION['id'];
//     $nik = $_POST['nik'];
//     $nama = $_POST['nama'];
//     $telp = $_POST['telp'];
//     $alamat = $_POST['alamat'];
//     $username = $_POST['username'];
//     $password = $_POST['password'];


//     if($password == ""){
//         mysqli_query($koneksi, "UPDATE dat_masyarakat SET nama = '$nama', telp = '$telp', alamat = '$alamat', username = '$username', password = '$password' WHERE id = '$id'");
//         echo "<script>alert('Data Berhasil Diubah'); document.location='profil.php'</script>";
//     } else {
//         mysqli_query($koneksi, "UPDATE dat_masyarakat SET nama = '$nama', telp = '$telp', alamat = '$alamat', username = '$username', password = '$password' WHERE id = '$id'");
//         echo "<script>alert('Data Berhasil Diubah'); document.location='profil.php'</script>";
//     }
//     if ($namafile === "") {
//         mysqli_query($koneksi, "UPDATE dat_pengaduan SET judul = '$judul', foto = '$fotoLama', deskripsi = '$deskripsi', tgl_pengaduan = '$tgl_pengaduan' WHERE id = '$id'");
//         echo "<script>alert('Data Berhasil Diubah'); document.location='pengaduan.php'</script>";
//     } else {
//         $tampil = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE id = '$id'");
//         $ambil = mysqli_fetch_assoc($tampil);
//         unlink("foto/" . $ambil['foto']);

//         move_uploaded_file($tmpFile, $dir . $random . '_' . $namafile); // pindahkan file dari tmp ke file foto/
//         $foto = $random . '_' . $namafile;

//         mysqli_query($koneksi, "UPDATE dat_pengaduan SET judul = '$judul', foto = '$foto', deskripsi = '$deskripsi', tgl_pengaduan = '$tgl_pengaduan' WHERE id = '$id'");

//         echo "<script>alert('Data Berhasil Diubah'); document.location='pengaduan.php'</script>";
//     }
// }