<?php
include "koneksi.php";
session_start();
if (isset($_POST['btnUbah'])) {

    $id_pengaduan = $_POST['id_pengaduan'];
    $id_petugas = $_SESSION['id'];
    $tgl_tanggapan = date('Y-m-d');
    $tanggapan = $_POST['tanggapan'];
    $status_pengaduan = $_POST['status_pengaduan'];

    $ubah = mysqli_query($koneksi, "UPDATE dat_tanggapan SET id_pengaduan = '$id_pengaduan', id_petugas = '$id_petugas', tgl_tanggapan = '$tgl_tanggapan', tanggapan = '$tanggapan' WHERE id_pengaduan = '$id_pengaduan'");

    mysqli_query($koneksi, "UPDATE dat_pengaduan SET status_pengaduan = '$status_pengaduan' WHERE id = '$id_pengaduan'");

    if ($ubah) {
        echo "<script>alert('Data Berhasil Diubah'); document.location='kelola_tanggapan.php';</script>";
    } else {
        echo "<script>
    alert('Data Gagal Diubah'); document.location='kelola_tanggapan.php';</script>";
    }
}
