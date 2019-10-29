<?php
include('koneksi.php');
$id_tempat = $_GET['id_tempat'];
$alamat = $_POST['alamat'];
$kd = $_POST['kd'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];


$query = mysqli_query($connect,"UPDATE tbl_tempat SET alamat='$alamat',kd='$kd',lat='$lat',lng='$lng' WHERE id_tempat='$id_tempat' ")or die('Error: ' . mysqli_error($connect));

	header('location:lokasi.php?notif=sukses_ubah');


?>