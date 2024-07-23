<?php
include 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        thead th,
        thead td {
            vertical-align: middle !important;
            text-align: center;
            border: 1px solid #000000;
        }

        table,
        tbody th,
        tbody td {
            border: 1px solid;
            padding: 5px;
        }

        table {

            border-collapse: collapse;
        }
    </style>
</head>

<body>
  
   <div class="container">
     <div class="row">
       <div class="col-2">
         <img src="assets/img/Lambang_Kab_Sumedang.png" height="100px" width="100px">
       </div>
       <div class="col-10">
         <div class="text-center">
           <h2>PEMERINTAH KABUPATEN SUMEDANG </h2>
           <h2>KECAMATAN SUMEDANG UTARA</h2>
           <h2>KELURAHAN SITU </h2>
         </div>
       </div>
     </div>
   </div>
   
   <br>
   <br>
   <br>
    
    <h3 style="text-align: center;">Laporan Pengaduan Kelurahan Situ</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Tanggal Aduan</th>
                <th>Judul</th>
                <th>foto</th>
                <th>Deskripsi Aduan</th>
                <th>Nama Petugas</th>
                <th>Tanggal Tanggapan</th>
                <th>Tanggapan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan INNER JOIN dat_masyarakat ON dat_pengaduan.nik = dat_masyarakat.nik 
                        INNER JOIN dat_tanggapan ON dat_pengaduan.id = dat_tanggapan.id_pengaduan
                        INNER JOIN dat_petugas ON dat_tanggapan.id_petugas = dat_petugas.id
                        WHERE dat_pengaduan.status_pengaduan = 'terima' OR dat_pengaduan.status_pengaduan = 'tolak'");
            while ($data = mysqli_fetch_assoc($tampil)) :
            ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['tgl_pengaduan']; ?></td>
                    <td><?php echo $data['judul']; ?></td>
                    <td> <a href="foto/<?php echo $data['foto'] ?>" target="_blank"><img src="foto/<?php echo $data['foto'] ?>" width="80" height="80"></a></td>
                    <td><?php echo $data['deskripsi']; ?></td>
                    <td><?php echo $data['nama_petugas']; ?></td>
                    <td><?php echo $data['tgl_tanggapan']; ?></td>
                    <td><?php echo $data['tanggapan']; ?></td>
                    <td><?php echo $data['status_pengaduan']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    
    
    
    <script>
        window.print()
    </script>
</body>

</html>