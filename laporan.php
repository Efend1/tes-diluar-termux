<?php

include 'koneksi.php';

session_start();
if (!isset($_SESSION['loginpa'])) {
    header("Location: loginpetugas.php");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>PEDUMAS - DASHBOARD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="dashboard_pa.php">
                    <span class="align-middle">PEDUMAS</span>
                    <span class="align-middle">SITU</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Main
                    </li>

                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="dashboard_pa.php">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Page
                    </li>

                    <?php
                    if ($_SESSION['level'] == 'admin') {
                    ?>
                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="kelola_aduan.php">
                            <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Kelola
                                Aduan</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="kelola_tanggapan.php">
                            <i class="align-middle" data-feather="message-square"></i> <span class="align-middle">Kelola
                                Tanggapan</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="petugas.php">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Kelola
                                Petugas</span>
                        </a>
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="kelola_tanggapan.php">
                            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Laporan</span>
                        </a>
                    </li>

                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="logoutpa.php">
                            <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Logout</span>
                        </a>
                    </li>

                    <?php } else { ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="kelola_aduan.php">
                            <i class="align-middle" data-feather="square"></i> <span class="align-middle">Kelola
                                Aduan</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="kelola_tanggapan.php">
                            <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Kelola
                                Tanggapan</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="logoutpa.php">
                            <i class="align-middle" data-feather="check-square"></i> <span
                                class="align-middle">Logout</span>
                        </a>
                    </li>
                    <?php } ?>

                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
                <ul class="navbar-nav navbar-align">

                        <li class="nav-item dropdown">


                            <a class="nav-link " data-bs-toggle=" dropdown" aria-expanded="false">
                                <span class="text-dark"> <?php echo $_SESSION['nama_petugas']; ?> | <?php echo $_SESSION['level'] ?></span>
                            </a>

                        </li>
                </ul>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-4">Kelola Laporan</h1>

                    <div class="card">
                        <div class="card-header text-white" style="background-color: var(--bs-tertiary-color)"><strong>Laporan Data Pengaduan</strong></div>
                        <div class="card-body">
                            <div class="text-left">
                                <a href="print_lap.php" target="_blank" class="btn text-white mb-3" style="background-color: var(--bs-secondary-color)">
                                    <i data-feather="download" style="width:24px;height:24px;"></i>
                                    <span>Cetak Laporan</span>
                                </a>
                            </div>
                            <table id="dataLaporan" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengguna</th>
                                        <th>Tanggal Aduan</th>
                                        <th>Judul</th>
                                        <th>foto</th>
                                        <th>Deskripsi Aduan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $tampil = mysqli_query($koneksi, "SELECT dat_pengaduan.id AS id_pengaduan, dat_pengaduan.nik, dat_pengaduan.judul, dat_pengaduan.foto, dat_pengaduan.deskripsi, dat_pengaduan.tgl_pengaduan, dat_pengaduan.status_pengaduan, dat_masyarakat.*, dat_tanggapan.*, dat_petugas.* FROM dat_pengaduan
                                    INNER JOIN dat_masyarakat ON dat_pengaduan.nik = dat_masyarakat.nik 
                                    INNER JOIN dat_tanggapan ON dat_pengaduan.id = dat_tanggapan.id_pengaduan
                                    INNER JOIN dat_petugas ON dat_tanggapan.id_petugas = dat_petugas.id
                                    WHERE dat_pengaduan.status_pengaduan = 'terima' OR dat_pengaduan.status_pengaduan = 'tolak' ORDER BY dat_tanggapan.id DESC");
                                    while ($data = mysqli_fetch_assoc($tampil)) :
                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['tgl_pengaduan']; ?></td>
                                        <td><?php echo $data['judul']; ?></td>
                                        <td> <a href="foto/<?php echo $data['foto'] ?>" target="_blank"><img
                                                    src="foto/<?php echo $data['foto'] ?>" width="80"
                                                    height="80"></a></td>
                                        <td><?php echo substr($data['deskripsi'], "0", "20") . "..."; ?></td>
                                        <td>
                                            <a href="" class="btn" style="background-color: var(--bs-secondary-bg)" data-bs-toggle="modal"
                                                data-bs-target="#detailTanggapan<?php echo $data['id_pengaduan']; ?>">Detail</a>
                                        </td>
                                    </tr>

                                    <!-- Modal Detail Tanggapan -->
                                    <div class="modal fade"
                                        id="detailTanggapan<?php echo $data['id_pengaduan']; ?>"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail
                                                        Tanggapan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="crud_pengaduan.php" method="post"
                                                        enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h5>Laporan Masyarakat</h5>
                                                                <br>
                                                                <div class="mb-3">
                                                                    <label for="">Tanggal Pengaduan</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $data['tgl_tanggapan']; ?>"
                                                                        disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="">Judul</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $data['judul']; ?>" disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="">Deskripsi</label>
                                                                    <textarea name="deskripsi" id="" rows="10"
                                                                        class="form-control"
                                                                        disabled><?php echo $data['deskripsi']; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5>Tanggapan Petugas</h5>
                                                                <br>
                                                                <div class="mb-3">
                                                                    <label for="">Tanggal Tanggapan</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $data['tgl_tanggapan']; ?>"
                                                                        disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="">Nama Petugas</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $data['nama_petugas']; ?>"
                                                                        disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="">Status Pengaduan</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $data['status_pengaduan']; ?>"
                                                                        disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="">Tanggapan</label>
                                                                    <textarea name="deskripsi" id="" rows="10"
                                                                        class="form-control"
                                                                        disabled><?php echo $data['tanggapan']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a class="text-muted"> <strong> </strong></a> - 
                                <a class="text-muted"> <strong> </strong></a> &copy; Kelurahan Situ 2023. All Rights Reserved
                            </p>
                        </div>
                       
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="js/app.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/dataTables.responsive.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataLaporan').DataTable({
                responsive: true
            });

        });
    </script>

</body>

</html>