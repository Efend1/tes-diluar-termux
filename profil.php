<?php

// masukan file koneksi.php agar $koneksi dapat digunakan (terhubung dengan database) | baris 4
include 'koneksi.php';

// memanggil fungsi session pada php | baris 7
session_start();
// buat kondisi jika tidak ada session login maka pindahkan ke halaman index.php (login) | baris 9 - 10 
if (!isset($_SESSION['login'])) {
	header("Location: login.php");
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
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/ui-forms.html" />

	<title>Profil | PEDUMAS SITU</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/datatables.min.css">
	<link rel="stylesheet" href="css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.php">
					<span class="align-middle">PEDUMAS</span>
					<span class="align-middle">SITU</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Main
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="dashboard.php">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>

					<li class="sidebar-header">
						Page
					</li>

					<li class="sidebar-item ">
						<a class="sidebar-link" href="pengaduan.php">
							<i class="align-middle" data-feather="mail"></i> <span class="align-middle">Pengaduan</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="tanggapan.php">
							<i class="align-middle" data-feather="message-square"></i> <span class="align-middle">Tanggapan</span>
						</a>
					</li>
					
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


                            <a class="nav-link " data-bs-toggle=" dropdown" aria-expanded="false" href="profil.php">
								<i data-feather="user" style="width:24px;height:24px;"></i>
                                <span class="text-dark"> <?php echo $_SESSION['nama']; ?> | <?php echo $_SESSION['nik'] ?></span>
                            </a>

                        </li>
                </ul>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-4"><strong>Profil Anda</strong></h1>
					<!-- membuat card yang diisi dengan tampilan tabel data | baris 63 - 196 -->
					<div class="card ">
						<div class="card-header bg-secondary text-white">Detail Akun Anda</div>
						<div class="card-body">
							<div class="text-left">
								<!-- sebuah tombol yang di isi properti modal | baris 68 -->
							</div>
							<!-- buat tabel data dengan class dari bootstrap dan id dari datatable | baris 71 -->
							<table  class="table table-responsive display nowrap" style="width:100%">
								<thead>
									<tr>
										<th>NIK</th>
										<th>Nama</th>
										<th>Telepon</th>
										<th>Alamat</th>
										<th>Username</th>
										<th>Password</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<!-- buat perintah untuk menampilkan data dari database kedalam tabel | baris 84 -  195 -->
									<?php
									$nik = $_SESSION['nik'];
									$no = 1;
									$tampil = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat WHERE nik = $nik ");
									while ($data = mysqli_fetch_assoc($tampil)) :
									?>
										<tr>
											<!-- tiap td di isikan data dari tabel dat_pengaduan dengan variabel $data[nama field] -->
											<td><?php echo $data['nik']; ?></td>
											<td><?php echo $data['nama']; ?></td>
											<td><?php echo $data['telp']; ?></td>
											<td><?php echo $data['alamat']; ?></td>
											<td><?php echo $data['username']; ?></td>
											<td><?php echo $data['password']; ?></td>
                                            <td>
												<!-- buat tombol ubah dengan menyisipkan properti modal beserta id pengaduan dan target harus sama dengan id modal -->
												<a href="" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ubahAkun<?php echo $data['id']; ?>">Ubah</a>
											</td>
										</tr>

										

										<!-- Modal Ubah Pengaduan idnya harus sama dengan data bs target tombol ubah -->
										<div class="modal fade" id="ubahAkun<?php echo $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Akun</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<!-- buat form dengan action yang mengarah ke crud_pengaduan dan tiap kolom disi valuenya dengan $data[nama field] agar menampilkan data ketika ditekan tombol ubahnya -->
														<form action="crud_ubah_profil.php" method="post" enctype="multipart/form-data">
															<!-- input type hidden dengan name id yang datanya nanti diambil dan dijadikan where saat query update -->
															<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
															<!-- input type hidden dengan name foto nanti diambil datanya dan dijadikan where kondisi jika file foto tidak diupdate maka akan tetap foto lama yang ditampilkan -->
															<div class="mb-3">
																<label for="">NIK</label>
																<input type="text" class="form-control" name="nik" value="<?php echo $data['nik']; ?>">
															</div>
															<div class="mb-3">
																<label for="">Nama</label>
																<input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
															</div>
															<div class="mb-3">
																<label for="">Telepon</label>
																<input type="text" class="form-control" name="telp" value="<?php echo $data['telp']; ?>">
															</div>
															<div class="mb-3">
																<label for="">Alamat</label>
																<input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>">
															</div>
															<div class="mb-3">
																<label for="">username</label>
																<input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>">
															</div>
															<div class="mb-3">
																<label for="">password</label>
																<input type="text" class="form-control" name="password" value="<?php echo $data['password']; ?>">
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
																<button type="submit" name="btnUbah" class="btn btn-primary">Ubah</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>

										
									<?php endwhile; ?>
								</tbody>
							</table>
							
							<a class="btn btn-danger" href="logout.php"><i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Log Out</span></a>

						</div>
					</div>

					<div class="container">

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
           $('#dataAkun').DataTable({
               responsive: true
           });

       });
  </script>
	
	
</body>

</html>