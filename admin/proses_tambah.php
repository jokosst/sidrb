<?php
include('koneksi.php');
$alamat = $_POST['alamat'];
$kd = $_POST['kd'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$kota = $_POST['kota'];
$tahun_anggaran = $_POST['tahun_anggaran'];


$query = mysqli_query($connect,"INSERT INTO tbl_tempat VALUES ('','$alamat','$kd','$lat','$lng') ")or die('Error: ' . mysqli_error($connect));

	header('location:lokasi.php?notif=sukses_simpan');


?>