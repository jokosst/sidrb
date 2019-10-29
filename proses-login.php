<?php
include('koneksi.php');
session_start();
 
//tangkap data dari form login
$username = $_POST['username'];
$password = $_POST['password'];
$username = mysqli_real_escape_string($connect,$username);
$password = mysqli_real_escape_string($connect,$password);
 
$q = mysqli_query($connect, "select * from tbl_admin where username='$username' and password='$password' ");
 
if (mysqli_num_rows($q) == 1) {
    //kalau username dan password sudah terdaftar di database
     //buat session dengan nama username dengan isi nama user yang login
    $_SESSION['username'] = $username;
    header('location:admin');
} else {
    //kalau username ataupun password tidak terdaftar di database
    header('location:login-admin.php');
}

?>