<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbase = "spk_uas";

$koneksi = mysqli_connect($host, $user, $pass);
if (!$koneksi) {
	die("Database mysql tidak terkoneksi");
}

$seleksi = mysqli_select_db($koneksi, $dbase);
if (!$seleksi) {
	die("Database tidak terseleksi");
}
