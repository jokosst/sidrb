<?php
//api bmkg
// http://202.90.199.132/aws-new/data/realtime
include "koneksi.php";
$x_min= 0;
$x_max= 50;
$y_min= 0.5;
$y_max= 2.5;
$z_min= 0.5;
$z_max= 1.7;
$y_sedang = 1.5;

//ambil data dari bmkg
$sumber = 'http://202.90.199.132/aws-new/data/realtime';
 $konten = file_get_contents($sumber);
$response = json_decode($konten, true);
$data = $response['aaData'];

$lokasi = $data[12]['station'];
$waktu = $data[12]['waktu'];
$tinggi_air = $data[12]['waterlevel'];
$curah_hujan = $data[12]['rain'];

$x = $curah_hujan;
$y = $tinggi_air;
$kd= 1.35;
//ambil dari database
// $query = mysqli_query($connect, "SELECT * FROM tbl_nilai ORDER BY id_nilai DESC LIMIT 1");
// $data = mysqli_fetch_array($query);
// $x = $data['curah_hujan'];
// $y = $data['tinggi_air'];
// $x=isset($_POST['x'])?$_POST['x']:42.3;
// $y=isset($_POST['y'])?$_POST['y']:1.2;


$ux_turun=($x_max-$x)/($x_max-$x_min);
$ux_naik=($x-$x_min)/($x_max-$x_min);
             
$uy_sedikit=($y_max-$y)/($y_max-$y_min);
$uy_banyak=($y-$y_min)/($y_max-$y_min);

$uz_sedikit=($z_max-$kd)/($z_max-$z_min);
$uz_banyak=($kd-$z_min)/($z_max-$z_min);
             
        //R1
        $a_pred1=min($ux_turun,$uy_sedikit,$uz_sedikit);
        $z1=$y_sedang-$a_pred1*($y_sedang-$z_min);
        
        //R2
        $a_pred2=min($ux_turun,$uy_sedikit,$uz_banyak);
        $z2=$y_sedang-$a_pred2*($y_sedang-$z_min);
        
        //R3
        $a_pred3=min($ux_turun,$uy_banyak,$uz_sedikit);
        $z3=$a_pred3*($y_sedang-$z_min)+$z_min;
        $z32=$y_sedang-$a_pred3*($y_sedang-$z_min);
        
        //R4
        $a_pred4=min($ux_turun,$uy_banyak,$uz_banyak);
        $z4=$y_sedang-$a_pred4*($y_sedang-$z_min);

        //R5
         $a_pred5=min($ux_naik,$uy_sedikit,$uz_sedikit);
        $z5=$a_pred5*($y_sedang-$z_min)+$z_min;
         $z52=$y_sedang-$a_pred5*($y_sedang-$z_min);

        //R6
         $a_pred6=min($ux_naik,$uy_sedikit,$uz_banyak);
        $z6=$y_sedang-$a_pred6*($y_sedang-$z_min);

        //R7
        $a_pred7=min($ux_naik,$uy_banyak,$uz_sedikit);
        $z7=$a_pred7*($y_sedang-$z_min)+$y_sedang;

        //R8
       $a_pred8=min($ux_naik,$uy_banyak,$uz_banyak);
        $z8=$a_pred8*($y_sedang-$z_min)+$y_sedang;
        
        //akhir perhitungan
       $n=$a_pred1*$z1+$a_pred2*$z2+$a_pred3*$z3+$a_pred3*$z32+$a_pred4*$z4+$a_pred5*$z5+$a_pred5*$z52+$a_pred6*$z6+$a_pred7*$z7+$a_pred8*$z8;
        $d=$a_pred1+$a_pred2+$a_pred3+$a_pred3+$a_pred4+$a_pred5+$a_pred5+$a_pred6+$a_pred7+$a_pred8;
        $hasil=$n/$d;



// mysqli_query($connect,"INSERT INTO tbl_nilai VALUES('','$waktu','$tinggi_air','$curah_hujan','$hasil')") or die(mysqli_error());

        ?>