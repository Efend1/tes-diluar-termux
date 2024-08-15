<?php

// masukan file koneksi.php agar $koneksi dapat digunakan (terhubung dengan database) | baris 4
include 'koneksi.php';

// memanggil fungsi session pada php | baris 7
session_start();
// buat kondisi jika tidak ada session login maka pindahkan ke halaman login.php (login) | baris 9 - 10 
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

	<title>Pengaduan | PEDUMAS SITU</title>

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

					<li class="sidebar-item active">
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

					<h1 class="h3 mb-4"><strong>Data Pengaduan</strong></h1>
					<!-- membuat card yang diisi dengan tampilan tabel data | baris 63 - 196 -->
					<div class="card">
						<div class="card-header text-white" style="background-color: var(--bs-tertiary-color)">Data Pengaduan</div>
						<div class="card-body">
							<div class="text-left">
								<!-- sebuah tombol yang di isi properti modal | baris 68 -->
								<a href="" class="btn text-white mb-3" style="background-color: var(--bs-secondary-color)" data-bs-toggle="modal" data-bs-target="#tambahPengaduan">Tambah Data</a>
							</div>
							<!-- buat tabel data dengan class dari bootstrap dan id dari datatable | baris 71 -->
							<table id="dataPengaduan" class="display nowrap" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>Judul</th>
										<th>Foto</th>
										<th>Deskripsi</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<!-- buat perintah untuk menampilkan data dari database kedalam tabel | baris 84 -  195 -->
									<?php
									$nik = $_SESSION['nik'];
									$no = 1;
									$tampil = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE nik = $nik AND status_pengaduan ='proses' ORDER BY id DESC");
									while ($data = mysqli_fetch_assoc($tampil)) :
									?>
										<tr>
											<!-- tiap td di isikan data dari tabel dat_pengaduan dengan variabel $data[nama field] -->
											<td><?php echo $no++; ?></td>
											<td><?php echo $data['tgl_pengaduan']; ?></td>
											<td><?php echo $data['judul']; ?></td>
											<!-- cara menmapilkan foto menggunakan img src='letak file fotonya' dan menggunakan target blank agar membuka di tab baru -->
											<td><a href="foto/<?php echo $data['foto'] ?>" target="_blank"><img src="foto/<?php echo $data['foto'] ?>" width="80" height="80"></a></td>
											<td><?php echo substr($data['deskripsi'], "0", "20") . "..."; ?></td>
											<td>
												<!-- buat tombol ubah dengan menyisipkan properti modal beserta id pengaduan dan target harus sama dengan id modal -->
												<a href="" class="btn " style="background-color: var(--bs-secondary-bg)" data-bs-toggle="modal" data-bs-target="#detailPengaduan<?php echo $data['id']; ?>">Detail</a>
												<!-- buat tombol detail dengan menyisipkan properti modal beserta id pengaduan dan target harus sama dengan id modal -->
												<a href="" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ubahPengaduan<?php echo $data['id']; ?>">Ubah</a>
												<!-- buat tombol hapus dengan menyisipkan properti modal beserta id pengaduan dan target harus sama dengan id modal -->
												<a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusPengaduan<?php echo $data['id']; ?>">Hapus</a>
											</td>
										</tr>

										<!-- Modal Hapus Pengaduan idnya harus sama dengan data bs target tombol hapus -->
										<div class="modal fade" id="hapusPengaduan<?php echo $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Pengaduan</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<!-- buat form dengan action yang diarahkan ke file crud_pengaduan bertujuan untuk mengahapus data berdasarkan id input type hidden -->
														<form action="crud_pengaduan.php" method="post">
															<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
															<!-- input type hidden yang datanya nanti diambil dan dijadikan where saat query delete -->
															<h5 class="text-center"> Apa anda yakin akan menghapus data ?
																<span class="text-danger"><?php echo $data['judul']; ?></span>
															</h5>

															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																<button type="submit" name="btnHapus" class="btn btn-danger">Hapus</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>

										<!-- Modal Ubah Pengaduan idnya harus sama dengan data bs target tombol ubah -->
										<div class="modal fade" id="ubahPengaduan<?php echo $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Pengaduan</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<!-- buat form dengan action yang mengarah ke crud_pengaduan dan tiap kolom disi valuenya dengan $data[nama field] agar menampilkan data ketika ditekan tombol ubahnya -->
														<form action="crud_pengaduan.php" method="post" enctype="multipart/form-data">
															<!-- input type hidden dengan name id yang datanya nanti diambil dan dijadikan where saat query update -->
															<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
															<!-- input type hidden dengan name foto nanti diambil datanya dan dijadikan where kondisi jika file foto tidak diupdate maka akan tetap foto lama yang ditampilkan -->
															<input type="hidden" name="fotoLama" value="<?= $data['foto'] ?>">
															<div class="mb-3">
																<label for="">Judul</label>
																<input type="text" class="form-control" name="judul" value="<?php echo $data['judul']; ?>">
															</div>
															<div class="mb-3">
																<label for="">foto</label>
																<input type="file" class="form-control" name="foto" accept="image/*" value="<?php echo $data['foto']; ?>">
															</div>
															<div class="mb-3">
																<label for="">Deskripsi</label>
																<textarea name="deskripsi" id="" rows="6" class="form-control"><?php echo $data['deskripsi']; ?></textarea>
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

										<!-- Modal Detail Pengaduan idnya harus sama dengan bs target tombol detail -->
										<div class="modal fade" id="detailPengaduan<?php echo $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Pengaduan</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<!-- buat sebuah form yang dimana value nya diisi dengan data pengaduan sebagai data yang lengkap -->
														<form action="crud_pengaduan.php" method="post" enctype="multipart/form-data">
															<div class="mb-3">
																<label for="">Judul</label>
																<input type="text" class="form-control" name="judul" value="<?php echo $data['judul']; ?>" disabled>
															</div>
															<div class="mb-3">
																<label for="">foto</label>
																<a href="foto/<?php echo $data['foto'] ?>" target="_blank">
																	<img src="foto/<?php echo $data['foto'] ?>" width="50%" height="50%" alt="">
																</a>
															</div>
															<div class="mb-3">
																<label for="">Deskripsi</label>
																<textarea name="deskripsi" id="" rows="10" class="form-control" disabled><?php echo $data['deskripsi']; ?></textarea>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
			</footer>
		</div>
	</div>
	<!-- Modal Tambah Pengaduan -->
	<div class="modal fade" id="tambahPengaduan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Form Pengaduan</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<!-- form tambah pengaduan diarahkan actionnya ke crud_pengaduan.php karena proses pengiriman data dari form ke databasenya berada di file crud_pengaduan.php -->
					<form action="crud_pengaduan.php" method="post" enctype="multipart/form-data">
						<div class="mb-3">
							<label for="">Judul</label>
							<input type="text" class="form-control" name="judul">
						</div>
						<div class="mb-3">
							<label for="">foto</label>
							<input type="file" class="form-control" name="foto" accept="image/*">
						</div>
						<div class="mb-3">
							<label for="">Deskripsi</label>
							<textarea name="deskripsi" id="" rows="6" class="form-control"></textarea>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="btnSimpan" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="js/app.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/datatables.min.js"></script>
	<script src="js/dataTables.responsive.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#dataPengaduan').DataTable({
				responsive: true
			});

		});
	</script>
</body>

</html>