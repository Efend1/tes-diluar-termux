<?php
include 'koneksi.php';

if (isset($_POST['btnDaftar'])) {
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$telp = $_POST['telp'];
	$alamat = $_POST['alamat'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	// inisialisasi variabel dengan inputan form

	$cek_nik = mysqli_query($koneksi, "SELECT nik FROM dat_masyarakat WHERE nik = '$nik'");

	$cek_username = mysqli_query($koneksi, "SELECT nik FROM dat_masyarakat WHERE username = '$username'");

	if (mysqli_fetch_assoc($cek_nik)) {
		echo "<script>alert('Nik sudah digunakan')</script>";
	} else if (mysqli_fetch_assoc($cek_username)) {
		echo "<script>alert('Username sudah digunakan')</script>";
		// melakukan validasi nik yang sama dan password yang tidak sama
	} else if ($password != $password2) {
		echo "<script>alert('Password tidak sama')</script>";
		// melakukan validasi nik yang sama dan password yang tidak sama
	} else {


		$simpan = mysqli_query($koneksi, "INSERT INTO dat_masyarakat VALUES ('', '$nik', '$nama', '$telp', '$username', '$password', '$alamat')");

		if ($simpan) {
			echo "<script>alert('Data Akun Berhasil Dibuat');
        document.location='login.php';
        </script>";
		} else {
			echo "<script>alert('Data Akun Gagal Dibuat');
        </script>";
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">


	<title>DAFTAR - PEDUMAS SITU</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>PEDUMAS | DAFTAR </title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<!-- <div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
								<div class="col-md-4 pe-md-0">
									<div class="auth-side-wrapper">
									</div>
								</div>
								<div class="col-md-8 ps-md-0">
									<div class="auth-form-wrapper px-4 py-5">
										<a href="#" class="noble-ui-logo text-warning d-block mb-2">PEDU<span class="text-dark">MAS</span></a>
										<h5 class="text-muted fw-normal mb-4">Buat akun baru</h5>
										<form action="" method="post">
											<div class="row">
												<div class="col-6">
													<div class="mb-3">
														<label for="">NIK</label>
														<input type="text" class="form-control" name="nik">
													</div>
													<div class="mb-3">
														<label for="">Nama</label>
														<input type="text" class="form-control" name="nama">
													</div>
													<div class="mb-3">
														<label for="">Telp</label>
														<input type="text" class="form-control" name="telp">
													</div>
												</div>
												<div class="col-6">
													<div class="mb-3">
														<label for="">Username</label>
														<input type="text" class="form-control" name="username">
													</div>
													<div class="mb-3">
														<label for="">Password</label>
														<input type="password" class="form-control" name="password">
													</div>
													<div class="mb-3">
														<label for="">Ulangi Password</label>
														<input type="password" class="form-control" name="password2">
													</div>
													<a href="login.php" class="btn btn-danger">Batal</a>
													<button class="btn btn-primary" type="submit" name="btnDaftar">Daftar</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<div class="container d-flex flex-column">
					<div class="row vh-100">
						<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
							<div class="d-table-cell align-middle">

								<div class="text-center mt-4">
									<h1 class="h2">Pengaduan Masyarakat Kelurahan Situ </h1>
									<p class="lead">
										Silahkan Isi Data Diri Anda
									</p>
								</div>

								<div class="card">
									<div class="card-body">
										<div class="m-sm-4">
											<form action="" method="post">
												<div class="row">
													<div class="col-6">
														<div class="mb-3">
															<label for="">NIK</label>
															<input type="text" class="form-control" name="nik">
														</div>
														<div class="mb-3">
															<label for="">Nama</label>
															<input type="text" class="form-control" name="nama">
														</div>
														<div class="mb-3">
															<label for="">Telepon</label>
															<input type="text" class="form-control" name="telp">
														</div>
														<div class="mb-3">
															<label for="">Alamat</label>
															<input type="text" class="form-control" name="alamat">
														</div>
													</div>
													<div class="col-6">
														<div class="mb-3">
															<label for="">Username</label>
															<input type="text" class="form-control" name="username">
														</div>
														<div class="mb-3">
															<label for="">Password</label>
															<input type="password" class="form-control" name="password">
														</div>
														<div class="mb-3">
															<label for="">Ulangi Password</label>
															<input type="password" class="form-control" name="password2">
														</div>
														<a href="login.php" class="btn btn-danger">Batal</a>
														<button class="btn btn-primary" type="submit" name="btnDaftar">Daftar</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="js/app.js"></script>

</body>

</html>