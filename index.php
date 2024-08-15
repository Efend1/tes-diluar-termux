<?php

include 'koneksi.php';
session_start();


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Aplikasi Pengaduan Masyarakat Situ</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light fix-top">
            <div class="container">
                
                <a class="navbar-brand" href="#!"><img src="assets/img/LogoSitu.png" height="50px" width="50px">Pedumas Situ</a>
              <?php 
              if($_SESSION['login'] == true){
                ?>
                 <a class="nav-link " data-bs-toggle=" dropdown" aria-expanded="false" href="dashboard.php">
                  <i class="bi-person"></i>

                    <span class="text-dark"> <?php echo $_SESSION['nama']; ?> | <?php echo $_SESSION['nik'] ?></span>
                 </a>
              <?php } else { ?>
                <a class="btn btn-primary" href="login.php">Login</a>
              <?php } ?>

            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="mb-5">SELAMAT DATANG DI APLIKASI PENGADUAN MASYARAKAT KELURAHAN SITU !</h1>
                            <!-- Menuju dashboard -->
                            <a class="btn btn-info" href="dashboard.php">Aduan</a>
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Icons Grid-->
        <section class="features-icons bg-light text-center">
            <div class="container">
                <div class="row">
                  <h2> Visi dan Misi Pelayanan Publik Kelurahan Situ</h2>
                </div>
                <div class="row">
                    <div class="features-icons-item mx-auto mb-5 mb-md-0 mb-md-3">
                         <div class="features-icons-icon d-flex"><i class="bi-eye m-auto text-primary"></i></div>
                          <h3>Visi</h3>
                          <p class="lead mb-2">Bekerja, Realistis, Santun, Tegas dan, Unggul </p>
                    </div>
                    
                </div>
                <div>
                    <div class="features-icons-item mx-auto mb-5 mb-md-0 mb-md-3">
                         <div class="features-icons-icon d-flex"><i class="bi-bullseye m-auto text-primary"></i></div>
                         <h3>Misi</h3>
                         <p class="lead mb-0">Bekerja dengan sepenuh hati dalam melayani masyarakat.</p><br>
                         <p class="lead mb-0">Realistis setiap melayani masyarakat sesuai dengan aturan.</p><br>
                          <p class="lead mb-0">Santun dalam pelayanan masyarakat dengan salam, sapa dan senyum</p><br>
                          <p class="lead mb-0">Tegas dalam menerapkan aturan pelayanan kepada masyarakat.</p><br>
                          <p class="lead mb-0">Unggul setiap pelayanan kepada masyarakat selalu mengutamakan pelayanan Cepat, Tepat dan Benar, sesuai motto Sumedang Melesat (Melayani Lebih Berkualitas dan Cepat).</p><br>
                     </div>
                </div>
            </div>
        </section>
        <!-- Image Showcases-->
        <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/img/1.png')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Ketentuan Yang Perlu Diperhatikan Ketika Melakukan Aduan </h2>
                        <p class="lead mb-0">Menggunakan bahasa yang sopan dan mudah dimengerti <br>
                        Melaporkan secara rinci tempat kejadian <br> 
                        Melampirkan foto dan
                        Dapat mempertanggungjawabkan segala sesuatu yang dilaporkan
                        </p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/img/2.png')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Seputar Kelurahan Situ </h2>
                        <p class="lead mb-2">Kecamatan Sumedang Utara terdiri dari 10 desa dan 3 kelurahan diantaranya adalah Kelurahan Situ. Kelurahan Situ merupakan sebuah kelurahan yang berada di wilayah Sumedang Utara Kabupaten. Lokasinya berada di bagian selatan wilayah kecamatan dan berbatasan langsung dengan Kecamatan Sumedang Selatan</p>
                        <p class="lead mb-2">Berdasarkan data Kecamatan Sumedang Utara dalam Angka tahun 2014 yang dikeluarkan oleh Badan Pusat Statistik (BPS) Kabupaten Sumedang, pada tahun 2013 Kelurahan Situ memiliki status sebagai perkotaan dengan klasifikasi sebagai desa swakarsa. Secara topografi, wilayah Kelurahan Situ berada dikawasan dengan bentang permukaan lahan berupa dataran. Ketinggian wilayah dimana kantor desa berada pada 600 meter di atas permukaan laut. Secara geografis, wilayah Kelurahan Situ berada di wilayah yang dibatasi oleh wilayah lain sebagai berikut Desa Jatimulya, Desa Jatihurip dan Desa Kebonjati di sebelah utara, Kelurahan Kotakaler di sebelah timur, Kelurahan Kotakulon Kecamatan Sumedang Selatan di sebelah selatan, serta Kelurahan Kotakulon Kecamatan Sumedang Selatan dan Desa Mekarjaya di sebelah baratnya. Secara administrasi, wilayah Kelurahan Situ terbagi ke dalam wilayah Rukun Warga dan Rukun Tetangga dengan jumlah masing-masing sebanyak 20 RW dan 96 RT.</p>
                        <p class="lead mb-2">Untuk luas wilayahnya, sebagaimana disajikan sumber data utama, pada tahun 2013 Kelurahan Situ memiliki wilayah dengan luasan sebesar 296 hektar. Dari luas tersebut, wilayah Kelurahan Situ terbagi ke dalam beberapa jenis penggunaan atau tata guna lahan. Dengan komposisi tata guna lahan terbesar adalah sebagai lahan pemukiman atau perumahan dan pekarangan. Hal ini tidak lepas dari wilayah Kelurahan Situ yang merupakan kawasan perkotaan Sumedang di bagian utara. Komposisi lahan yang dipergunakan sebagai lahan pemukiman sebesar 72,3 persen dari luas total yang sebanding dengan cakupan luasan sebesar 214 hektar. Sebagian yang lainnya dipergunakan sebagai lahan pertanian terutama lahan pesawahan dengan komposisi sebesar 27,03 persen dari luas total yang sebanding dengan 80 hektar. Luasan lahan pertaniannya terbagi ke dalam dua jenis yaitu lahan pesawahan dan lahan pertanian bukan pesawahan dengan luasan masing-masing sebesar 65 hektar dan 15 hektar. Sisanya sebesar 0,68 persen atau setara dengan 2 hektar dipergunakan sebagai lahan lainnya.</p>
                        <p class="lead mb-2">Kantor  Pemerintah Kelurahan Situ berada di Jalan Angkrek Situ no 25 dengan luas bangunan 700 m². Bangunan ini dulunya merupakan puskesmas situ yang sekarang berada di tempat eks kantor BLH Sumedang.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials-->
        <section class="testimonials text-center bg-light">
           
        </section>
        <!-- Call to Action-->
        
        <!-- Footer-->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <!--    <ul class="list-inline mb-2">
                            <li class="list-inline-item"><a href="#!">About</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Contact</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Terms of Use</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Privacy Policy</a></li>
                        </ul> -->
                        <p class="text-muted small mb-4 mb-lg-0">&copy; Kelurahan Situ 2023. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-4">
                                <a href="https://www.facebook.com/kelurahansitu"><i class="bi-facebook fs-3"></i></a>
                            </li>
                       <!--     <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-twitter fs-3"></i></a>
                            </li> -->
                            <li class="list-inline-item">
                                <a href="https://instagram.com/kelurahan.situ?igshid=YmMyMTA2M2Y="><i class="bi-instagram fs-3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
