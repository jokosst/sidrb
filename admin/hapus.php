<?php
include"koneksi.php";
$id_tempat = $_GET['id_tempat'];

$query = mysqli_query($connect,"DELETE FROM tbl_tempat WHERE id_tempat='$id_tempat'") or die(mysql_error());
   header('location:lokasi.php?notif=hapus');
?>