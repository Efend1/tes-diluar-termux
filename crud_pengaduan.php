<?php

// masukan file koneksi.php agar $koneksi dapat digunakan (terhubung dengan database) | baris 4
include 'koneksi.php';

// memanggil fungsi session pada php | baris 7
session_start();

// buat kondisi jika button dengan name btnSimpan ditekan maka buat variabel baru yang di isikan dari setiap name yang ada pada form | baris 10 - 13 dan $tgl_pengaduan dibuat otomatis hari ini dengan kode berikut
if (isset($_POST['btnSimpan'])) {
    $nik = $_SESSION['nik'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_pengaduan = date('Y-m-d');

    // buat varibel untuk menampung semua data foto | baris 17 - 21
    $namafile = $_FILES['foto']['name']; //nama file
    $ukuran = $_FILES['foto']['size']; //ukuran file
    $dir = "foto/"; // path (tempat penyimpanan fotonya nanti)
    $random = rand(); // kode untuk melakukan random karakter
    $tmpFile = $_FILES['foto']['tmp_name']; //tempat file berada

    // buat kondisi agar ukuran file yang diupload tidak melebihi dari 1 mb
    if ($ukuran < 1044070) {
        // jika file kurang dari 1 mb maka pindahkan file dari sistem ke folder $dir (foto)
        move_uploaded_file($tmpFile, $dir . $random . '_' . $namafile); // pindahkan file dari tmp ke file foto/
        $foto = $random . '_' . $namafile;
        $simpan = mysqli_query($koneksi, "INSERT INTO dat_pengaduan (id, nik, judul, foto, deskripsi, tgl_pengaduan, status_pengaduan ) VALUES('','$nik','$judul','$foto','$deskripsi','$tgl_pengaduan', 'proses')");
        if ($simpan){
          echo "<script>alert('Data Berhasil Disimpan'); document.location='pengaduan.php'</script>";
        } else {
          echo "<script>alert('Data Gagal Disimpan'); document.location='pengaduan.php'</script>";
        }
    } else {
        echo "<script>alert('Data Gagal Disimpan File Terlalu Besar'); document.location='pengaduan.php'</script>";
    }
}

if (isset($_POST['btnHapus'])) {
    $id = $_POST['id'];

    $tampil = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE id = '$id'");
    $ambil = mysqli_fetch_assoc($tampil);

    unlink("foto/" . $ambil['foto']);
    $hapus = mysqli_query($koneksi, "DELETE FROM dat_pengaduan WHERE id = '$id'");

    if ($hapus) {
        echo "<script>alert('Data Berhasil dihapus'); document.location='pengaduan.php'</script>";
    } else {
        echo "<script>alert('Data Gagal dihapus'); document.location='pengaduan.php'</script>";
    }
}

if (isset($_POST['btnUbah'])) {
    $id = $_POST['id'];
    $nik = $_SESSION['nik'];
    $judul = $_POST['judul'];
    $fotoLama = $_POST['fotoLama'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_pengaduan = date('Y-m-d');
    $namafile = $_FILES['foto']['name']; //nama file
    $ukuran = $_FILES['foto']['size']; //ukuran file
    $dir = "foto/";
    $random = rand();
    $tmpFile = $_FILES['foto']['tmp_name']; //tempat file berada


    if ($namafile === "") {
        mysqli_query($koneksi, "UPDATE dat_pengaduan SET judul = '$judul', foto = '$fotoLama', deskripsi = '$deskripsi', tgl_pengaduan = '$tgl_pengaduan' WHERE id = '$id'");
        echo "<script>alert('Data Berhasil Diubah'); document.location='pengaduan.php'</script>";
    } else {
        $tampil = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE id = '$id'");
        $ambil = mysqli_fetch_assoc($tampil);
        unlink("foto/" . $ambil['foto']);

        move_uploaded_file($tmpFile, $dir . $random . '_' . $namafile); // pindahkan file dari tmp ke file foto/
        $foto = $random . '_' . $namafile;

        mysqli_query($koneksi, "UPDATE dat_pengaduan SET judul = '$judul', foto = '$foto', deskripsi = '$deskripsi', tgl_pengaduan = '$tgl_pengaduan' WHERE id = '$id'");

        echo "<script>alert('Data Berhasil Diubah'); document.location='pengaduan.php'</script>";
    }
}
