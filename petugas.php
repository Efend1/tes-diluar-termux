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

    <link href="css/app.css" rel="stylesheet">

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

                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="kelola_tanggapan.php">
                            <i class="align-middle" data-feather="message-square"></i> <span class="align-middle">Kelola
                                Tanggapan</span>
                        </a>
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="petugas.php">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Kelola
                                Petugas</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="laporan.php">
                            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Laporan</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
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
                            <i class="align-middle" data-feather="square"></i> <span class="align-middle">Kelola
                                Tanggapan</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="logoutpa.php">
                            <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Logout</span>
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

                    <h1 class="h3 mb-4">Data Petugas</h1>
                    <div class="card">
                        <div class="card-header text-white" style="background-color: var(--bs-tertiary-color)"><strong>Data Petugas</strong></div>
                        <div class="card-body">
                            <div class="text-left">
                                <a href="" class="btn text-white mb-3" style="background-color: var(--bs-secondary-color)" data-bs-toggle="modal"
                                    data-bs-target="#tambahPetugas">
                                    <i data-feather="plus" style="width:24px;height:24px;"></i>
                                    <span>Tambah Petugas/Admin</span>
                                </a>
                            </div>
                            <table id="dataPetugas" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Telpon</th>
                                        <th>Level</th>
                                        <th>Username</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $tampil = mysqli_query($koneksi, "SELECT * FROM dat_petugas ORDER BY id DESC");
                                    while ($data = mysqli_fetch_assoc($tampil)) :
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nama_petugas']; ?></td>
                                        <td><?php echo $data['telp']; ?></td>
                                        <td><?php echo $data['level']; ?></td>
                                        <td><?php echo $data['username']; ?></td>
                                        <td>
                                            <a href="" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#ubahPetugas<?php echo $data['id']; ?>">Ubah</a>
                                            <a href="" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapusPetugas<?php echo $data['id']; ?>">Hapus</a>
                                        </td>
                                    </tr>
                                    <!-- Modal Hapus Petugas -->
                                    <div class="modal fade" id="hapusPetugas<?php echo $data['id']; ?>"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Petugas
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="crud_petugas.php" method="post">
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $data['id']; ?>">
                                                        <h5 class="text-center"> Apa anda yakin akan menghapus data ?
                                                            <span
                                                                class="text-danger"><?php echo $data['nama_petugas']; ?></span>
                                                        </h5>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="btnHapus"
                                                                class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Ubah Petugas -->
                                    <div class="modal fade" id="ubahPetugas<?php echo $data['id']; ?>"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Petugas
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="crud_petugas.php" method="post"
                                                        enctype="multipart/form-data">
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $data['id']; ?>">
                                                        <input type="hidden" name="password_lama"
                                                            value="<?php echo $data['password']; ?>">
                                                        <div class="mb-3">
                                                            <label for="">Nama</label>
                                                            <input type="text" class="form-control" name="nama_petugas"
                                                                value="<?php echo $data['nama_petugas']; ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Telp</label>
                                                            <input type="text" class="form-control" name="telp"
                                                                value="<?php echo $data['telp']; ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Level</label>
                                                            <select class="form-control" name="level" id="">
                                                                <option value="admin"
                                                                    <?php echo $data['level'] == 'admin' ? 'selected' : '' ?>>
                                                                    Admin
                                                                </option>
                                                                <option value="petugas"
                                                                    <?php echo $data['level'] == 'petugas' ? 'selected' : '' ?>>
                                                                    Petugas</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Username</label>
                                                            <input type="text" class="form-control" name="username"
                                                                value="<?php echo $data['username']; ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Password</label>
                                                            <input type="password" class="form-control" name="password">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="btnUbah"
                                                                class="btn btn-primary">Ubah</button>
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

                <!-- Modal Tambah Petugas -->
                <div class="modal fade" id="tambahPetugas" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Petugas</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="crud_petugas.php" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" name="nama_petugas">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Telpon</label>
                                        <input type="text" class="form-control" name="telp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Level</label>
                                        <select name="level" id="" class="form-control">
                                            <option value="admin">Admin</option>
                                            <option value="petugas">Petugas</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="btnSimpan" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/dataTables.responsive.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataPetugas').DataTable({
                responsive: true
            });

        });
    </script>

</body>

</html>