<?php
session_start();
include 'koneksi.php';

if(isset($_POST['btnSimpan'])){
    $nama_petugas = $_POST['nama_petugas'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $simpan = mysqli_query($koneksi, "INSERT INTO dat_petugas (id, nama_petugas, telp, level, username, password) VALUES ('','$nama_petugas','$telp', '$level', '$username','$password')");

      if($simpan){
        echo "<script>alert('Data Berhasil Disimpan'); document.location='petugas.php'</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan'); document.location='petugas.php'</script>";
    }

}
if(isset($_POST['btnUbah'])){
    $id = $_POST['id'];
    $nama_petugas = $_POST['nama_petugas'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_lama = $_POST['password_lama'];

    if($password == ""){
        mysqli_query($koneksi, "UPDATE dat_petugas SET nama_petugas = '$nama_petugas', telp = '$telp', level = '$level', username = '$username', password = '$password_lama' WHERE id = '$id'");
        echo "<script>alert('Data Berhasil Diubah'); document.location='petugas.php'</script>";
    } else {
        mysqli_query($koneksi, "UPDATE dat_petugas SET nama_petugas = '$nama_petugas', telp = '$telp', level = '$level', username = '$username', password = '$password' WHERE id = '$id'");
        echo "<script>alert('Data Berhasil Diubah'); document.location='petugas.php'</script>";
    }
    
}

if(isset($_POST['btnHapus'])){
    $id = $_POST['id'];
    $hapus = mysqli_query($koneksi, "DELETE FROM dat_petugas WHERE id = '$id'");

    if($hapus){
        
        echo "<script>alert('Data petugas berhasil dihapus'); document.location='petugas.php'</script>";
    } else {
        echo "<script>alert('Data petugas gagal dihapus'); document.location='petugas.php'</script>";
    }
}

?>