<?php

// buat  variabel baru yang diisikan dengan identitas database server | baris 4 - 7
$host = '0.0.0.0';
$username = 'root';
$password = 'root';
$db = 'db_efendi';

// buat variabel baru dengan fungsi php yaitu mysqli_connect yang disi dengan identitas database agar variabel tersebut terhubung dengan database | baris 10
$koneksi = mysqli_connect($host, $username, $password, $db) or die(mysqli_error($koneksi));
