<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	include("connect.php");
	$id=$_GET['idk'];
	
	$delete_kelas="DELETE FROM pegawai WHERE id_pegawai='$id'";
	mysqli_query($koneksi,$delete_kelas);

	$delete_kelas2="DELETE FROM detail WHERE id_pegawai='$id'";
	mysqli_query($koneksi,$delete_kelas2);

	$delete_kelas3="DELETE FROM analisa WHERE id_pegawai='$id'";
	mysqli_query($koneksi,$delete_kelas3);
	header("Location:./pegawai.php");
