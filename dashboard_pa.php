<?php

include 'koneksi.php';

session_start();
if (!isset($_SESSION['loginpa'])) {
	header("Location: loginpetugas.php");
}


$data1 = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan");
$jmlpengaduan = mysqli_num_rows($data1);

$data2 = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE status_pengaduan = 'proses'");
$jmlpengaduan_proses = mysqli_num_rows($data2);

$data3 = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE status_pengaduan = 'tolak'");
$jmlpengaduan_tolak = mysqli_num_rows($data3);

$data4 = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE status_pengaduan = 'terima'");
$jmlpengaduan_terima = mysqli_num_rows($data4);
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

    <link href="css/app.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar sidebar-bg js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="dashboard_pa.php">
                    <span class="align-middle">PEDUMAS</span>
                    <span class="align-middle">SITU</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Main
                    </li>

                    <li class="sidebar-item active">
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
                    <li class="sidebar-item">
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
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="kelola_tanggapan.php">
                            <i class="align-middle" data-feather="clipboard"></i> <span
                                class="align-middle">Laporan</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="logoutpa.php">
                            <i class="align-middle" data-feather="log-out"></i> <span
                                class="align-middle">Logout</span>
                        </a>
                    </li>

                    <?php } else { ?>
                    <li class="sidebar-item">
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
                        <a class="sidebar-link" href="logoutpa.php">
                            <i class="align-middle" data-feather="log-out"></i> <span
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

                    <h1 class="h3 mb-4"> Dashboard</h1>

                    <div class="row">
                        <div class="col-md-3 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-center"><?php echo $jmlpengaduan; ?></h5>
                                </div>
                                <div class="card-footer">
                                    <h6 class="text-center">Jumlah Pengaduan</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-center"><?php echo $jmlpengaduan_proses; ?></h5>
                                </div>
                                <div class="card-footer">
                                    <h6 class="text-center">Jumlah Diproses</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-center"><?php echo $jmlpengaduan_terima; ?></h5>
                                </div>
                                <div class="card-footer">
                                    <h6 class="text-center">Jumlah Diterima</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-center"><?php echo $jmlpengaduan_tolak; ?></h5>
                                </div>
                                <div class="card-footer">
                                    <h6 class="text-center">Jumlah Ditolak</h6>
                                </div>
                            </div>
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


</body>

</html>