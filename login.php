<?php

// masukan file koneksi agar variabel $koneksi dapat digunakan (terhubung dengan database) | baris 4
include 'koneksi.php';
// memanggil fungsi session pada php | baris 6
session_start();

// buat kondisi jika session login ada maka pindah menuju halaman dashboard.php 9 - 11
if (isset($_SESSION['login'])) {
	header("Location: dashboard.php");
}

// jika tombol dengan name btnMasuk ditekan maka buat variabel baru yang diisikan dari setiap name yang ada pada form | baris 14 - 16
if (isset($_POST['btnMasuk'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// buat variabel baru untuk menyamakan username yang diinputkan user dengan username yang ada di database | baris 19
	$data = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat WHERE username = '$username'");

	// buat kondisi jika username yang diinputkan oleh user ada di database maka buat variabel baru yang merubah data objek menjadi array
	if (mysqli_num_rows($data) === 1) {
		$baris = mysqli_fetch_assoc($data);
		// buat kondisi untuk melakukan cek password yang diinputkan oleh user apakah sama dengan password yang ada di database

		// jika password ada di dalam database maka pindah halaman dan buat session yang disi dari data array berdasarkan username yang diinputkan oleh user 
		if ($password == $baris['password']) {

			header("Location: dashboard.php");
			$_SESSION['id'] = $baris['id'];
			$_SESSION['login'] = true;
			$_SESSION['nik'] = $baris['nik'];
			$_SESSION['nama'] = $baris['nama'];
			$_SESSION['telp'] = $baris['telp'];
			$_SESSION['username'] = $baris['username'];
			$_SESSION['alamat'] = $baris['alamat'];
			exit;
		} else {
			// jika password tidak ada dalam database maka muncul peringatan
			echo "<script>alert('username atau Password anda salah!')</script>";
		}
	} else {
		// jika username tidak ada dalam database maka muncul peringatan
		echo "<script>alert('username atau Password anda salah!')</script>";
	}
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

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>PEDUMAS SITU | LOGIN</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Pengaduan Masyarakat Kelurahan Situ</h1>
							<p class="lead">
								Silahkan lakukan login dengan akun anda!
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form action="" method="POST">
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="username" placeholder="Username" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Password" />
										</div>
										<a href="daftar.php">Daftar akun baru ?</a>
										<div class="text-end">
											<button name="btnMasuk" type="submit" class="btn btn-lg btn-primary">Masuk</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>