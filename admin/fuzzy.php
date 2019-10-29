<?php
include('koneksi.php');
include('cek_login.php');
include('header.php');
include('sidebar.php');
?>

    
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-12 col-8 align-self-center">
                        <h3 class="text-themecolor">ADMIN</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-md-12">
                     <div class="card">
                    <div class="card-block">
                   <div class="row">
                  <div class="col-12">
                    <div>
            <h3 class="card-title">Fuzzy</h3>
            <p>
        <table>
             
              <?php
$sumber = 'http://202.90.199.132/aws-new/data/realtime';
 $konten = file_get_contents($sumber);
$response = json_decode($konten, true);
$data = $response['aaData'];

echo '<tr><td><b>Lokasi</b></td><td>&nbsp;:&nbsp;</td><td> '. $data[12]['station']. '</td></tr>';
echo '<tr><td><b>Waktu</b></td><td>&nbsp;:&nbsp; </td><td> '. $data[12]['waktu'].'</td></tr>';
echo '<tr><td><b>Tinggi Air</b></td><td>&nbsp;:&nbsp;</td><td> '. $data[12]['waterlevel']. '</td></tr>';
echo '<tr><td><b>Curah Hujan</b></td><td>&nbsp;:&nbsp;</td><td> '. $data[12]['rain'].'</td></tr>';

include "koneksi.php";
$x_min= 0;
$x_max= 50;
$y_min= 0.5;
$y_max= 2.5;
$z_min= 0.5;
$z_max= 1.7;
$y_sedang = 1.5;

//ambil data dari bmkg
$tinggi_air = $data[12]['waterlevel'];
$curah_hujan = $data[12]['rain'];

// $x = $curah_hujan;
// $y = $tinggi_air;
$x = 10.6;
$y = 1.50;
$kd= 1;
//ambil dari database
// $query = mysqli_query($connect, "SELECT * FROM tbl_nilai ORDER BY id_nilai DESC LIMIT 1");
// $data = mysqli_fetch_array($query);
// $x = $data['curah_hujan'];
// $y = $data['tinggi_air'];
// $x=isset($_POST['x'])?$_POST['x']:42.3;
// $y=isset($_POST['y'])?$_POST['y']:1.2;


// $ux_turun=($x_max-$x)/($x_max-$x_min);
// $ux_naik=($x-$x_min)/($x_max-$x_min);
             
// $uy_sedikit=($y_max-$y)/($y_max-$y_min);
// $uy_banyak=($y-$y_min)/($y_max-$y_min);
             
//         //role 1
//         $a_pred1=min($ux_turun,$uy_banyak);
//         $z1=$z_max-$a_pred1*($z_max-$z_min);
        
//         //role2
//         $a_pred2=min($ux_turun,$uy_sedikit);
//         $z2=$z_max-$a_pred2*($z_max-$z_min);
        
//         //role3
//         $a_pred3=min($ux_naik,$uy_banyak);
//         $z3=$a_pred3*($z_max-$z_min)-$z_min;
        
//         //role 4
//         $a_pred4=min($ux_naik,$uy_sedikit);
//         $z4=$a_pred4*($z_max-$z_min)-$z_min;
        
//         //akhir perhitungan
//         $n=$a_pred1*$z1+$a_pred2*$z2+$a_pred3*$z3+$a_pred4*$z4;
//         $d=$a_pred1+$a_pred2+$a_pred3+$a_pred4;
//         $hasil=$n/$d;
        
//    echo '<tr><td><b>Hasil</b></td><td>&nbsp;:&nbsp;</td><td> '. $hasil.'</td></tr>';     

 ?>
 </table> 
 <fieldset>
        <legend>[1] Pembentukan Himpunan Fuzzy (Fuzzyfication)</legend>
        <table border='1'>
          <tr>
            <th colspan='4'>Curah Hujan</th>
          </tr>
          <tr>
            <td rowspan='3'>&micro;<sub>curah hujan NAIK</sub>(x)</td>
            <td>1 , x<<?=$x_min?></td>
            <td rowspan='3'>&micro;<sub>curah hujan TURUN</sub>(x)</td>
            <td>0 , x<<?=$x_min?></td>
          </tr>
          <tr>
            <td>(<?=$x_max?>-x)/<?=($x_max-$x_min)?> , <?=$x_min?> &le; x &le;<?=$x_max?></td><td>(x-<?=$x_min?>)/<?=($x_max-$x_min)?> , <?=$x_min?> &le; x &le;<?=$x_max?></td>
          </tr>
          <tr>
            <td>0 , x><?=$x_max?></td><td>1 , x><?=$x_max?></td>
          </tr>
          <tr>
            <th colspan='4'>Tinggi Air</th>
          </tr>
          <tr>
            <td rowspan='3'>&micro;<sub>tinggi air TINGGI</sub>(y)</td>
            <td>1 , y<<?=$y_min?></td>
            <td rowspan='3'>&micro;<sub>tinggi air RENDAH</sub>(y)</td>
            <td>0 , y<<?=$y_min?></td>
          </tr>
          <tr>
            <td>(<?=$y_max?>-y)/<?=($y_max-$y_min)?> , <?=$y_min?> &le; y &le;<?=$y_max?></td><td>(y-<?=$y_min?>)/<?=($y_max-$y_min)?> , <?=$y_min?> &le; y &le;<?=$y_max?></td>
          </tr>
          <tr>
            <td>0 , y><?=$y_max?></td><td>1 , y><?=$y_max?></td>
          </tr>
          <tr>
            <th colspan='4'>Ketingian Daratan</th>
          </tr>
          <tr>
            <td rowspan='3'>&micro;<sub>ketinggian daratan BERTAMBAH</sub>(z)</td>
            <td>1 , z<<?=$z_min?></td>
            <td rowspan='3'>&micro;<sub>ketinggian daratan BERKURANG</sub>(z)</td>
            <td>0 , z<<?=$z_min?></td>
          </tr>
          <tr>
            <td>(<?=$z_max?>-z)/<?=($z_max-$z_min)?> , <?=$z_min?> &le; z &le;<?=$z_max?></td><td>(z-<?=$z_min?>)/<?=($z_max-$z_min)?> , <?=$z_min?> &le; z &le;<?=$z_max?></td>
          </tr>
          <tr>
            <td>0 , z><?=$z_max?></td><td>1 , z><?=$z_max?></td>
          </tr>
          <tr>
            <td colspan='4'>
              Curah Hujan: x=<?=$x?>;<br />
              <?php
              $ux_turun=($x_max-$x)/($x_max-$x_min);
              $ux_naik=($x-$x_min)/($x_max-$x_min);
              ?>
              &micro;<sub>curah hujan TURUN</sub>(<?=$x?>)=(<?=$x_max?>-<?=$x?>)/<?=($x_max-$x_min)?>=<?=round($ux_turun,4)?>;<br />
              &micro;<sub>curah hujan NAIK</sub>(<?=$x?>)=(<?=$x?>-<?=$x_min?>)/<?=($x_max-$x_min)?>=<?=round($ux_naik,4)?>;<br /><br />
              Tinggi Air: y=<?=$y?>;<br />
              <?php
              $uy_sedikit=($y_max-$y)/($y_max-$y_min);
              $uy_banyak=($y-$y_min)/($y_max-$y_min);
              ?>              
              &micro;<sub>tinggi air RENDAH</sub>(<?=$y?>)=(<?=$y_max?>-<?=$y?>)/<?=($y_max-$y_min)?>=<?=round($uy_sedikit,4)?>;<br/>
              &micro;<sub>tinggi air TINGGI</sub>(<?=$y?>)=(<?=$y?>-<?=$y_min?>)/<?=($y_max-$y_min)?>=<?=round($uy_banyak,4)?>;<br/><br />
              Ketinggian Daratan: z=<?=$kd?>;<br />
               <?php
              $uz_sedikit=($z_max-$kd)/($z_max-$z_min);
              $uz_banyak=($kd-$z_min)/($z_max-$z_min);
              ?>              
              &micro;<sub>Ketinggian Daratan RENDAH</sub>(<?=$kd?>)=(<?=$z_max?>-<?=$kd?>)/<?=($z_max-$z_min)?>=<?=round($uz_sedikit,4)?>;<br/>
              &micro;<sub>Ketinggian Daratan TINGGI</sub>(<?=$kd?>)=(<?=$kd?>-<?=$z_min?>)/<?=($z_max-$z_min)?>=<?=round($uz_banyak,4)?>;<br/>
            </td>
          </tr>
        </table>
      </fieldset> 
      <fieldset>
        <legend>[2] Penerapan Fungsi Implikasi</legend>
<p>Nilai &alpha;-predikat dan Z dari setiap aturan</p>
<p><strong>Rule (R1) :</strong><em>IF curah hujan TURUN and tinggi air RENDAH and Ketinggian Daratan RENDAH THEN potensi RENDAH</em><br />
        <?php
        $a_pred1=min($ux_turun,$uy_sedikit,$uz_sedikit);
        $z1=$y_sedang-$a_pred1*($y_sedang-$z_min);
        ?>
        &alpha;-predikat<sub>1</sub>=&micro;<sub>curah hujan TURUN</sub> <big>&cap;</big> &micro;<sub>tinggi air RENDAH</sub><big>&cap;</big> &micro;<sub>Ketinggian Daratan RENDAH</sub><br />
          =min(&micro;<sub>curah hujan TURUN</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>tinggi air RENDAH</sub>(<?=$y?>) <big>&cap;</big> &micro;<sub>Ketinggian Daratan RENDAH</sub>(<?=$kd?>))<br />
          =min(<?=round($ux_turun,4)?>,<?=round($uy_sedikit,4)?>,<?=round($uz_sedikit,4)?>)<br />
          =<?=round($a_pred1,4)?><br />
        Dari himpunan potensi RENDAH: (<?=$y_sedang?>-z<sub>1</sub>)/<?=($y_sedang-$z_min)?>=<?=round($a_pred1,4)?><br/>
        diperoleh <strong>z<sub>1</sub></strong>=<?=round($z1,4)?>
        </p>

<p><strong>Rule (R2) :</strong><em>IF curah hujan TURUN and tinggi air RENDAH and Ketinggian Daratan TINGGI THEN Potensi RENDAH</em><br />
        <?php
        $a_pred2=min($ux_turun,$uy_sedikit,$uz_banyak);
        $z2=$y_sedang-$a_pred2*($y_sedang-$z_min);
        ?>
        &alpha;-predikat<sub>2</sub>=&micro;<sub>curah hujan TURUN</sub> <big>&cap;</big> &micro;<sub>tinggi air RENDAH</sub><big>&cap;</big> &micro;<sub>Ketinggian Daratan TINGGI</sub><br />
          =min(&micro;<sub>curah hujan TURUN</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>tinggi air RENDAH</sub>(<?=$y?>)<big>&cap;</big> &micro;<sub>Ketinggian Daratan TINGGI</sub>(<?=$kd?>))<br />
          =min(<?=round($ux_turun,4)?>,<?=round($uy_sedikit,4)?>,<?=round($uz_banyak,4)?>)<br />
          =<?=round($a_pred2,4)?><br />
        Dari himpunan potensi RENDAH: (<?=$y_sedang?>-z<sub>2</sub>)/<?=($y_sedang-$z_min)?>=<?=round($a_pred2,4)?><br/>
        diperoleh <strong>z<sub>2</sub></strong>=<?=round($z2,4)?>
        </p> 
        
<p><strong>Rule (R3):</strong><em>IF curah hujan TURUN and tinggi air TINGGI and Ketinggian Daratan RENDAH THEN potensi SEDANG</em><br />
        <?php
        $a_pred3=min($ux_turun,$uy_banyak,$uz_sedikit);
        $z3=$a_pred3*($y_sedang-$z_min)+$z_min;
        $z32=$y_sedang-$a_pred3*($y_sedang-$z_min);
        ?>
        &alpha;-predikat<sub>3</sub>=&micro;<sub>curah hujan TURUN</sub> <big>&cap;</big> &micro;<sub>tinggi air TINGGI</sub><big>&cap;</big> &micro;<sub>Ketinggian Daratan RENDAH</sub><br />
          =min(&micro;<sub>curah hujan TURUN</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>tinggi air TINGGI</sub>(<?=$y?>)<big>&cap;</big> &micro;<sub>Ketinggian Daratan RENDAH</sub>(<?=$kd?>))<br />
          =min(<?=round($ux_naik,4)?>,<?=round($uy_sedikit,4)?>,<?=round($uz_sedikit,4)?>)<br />
          =<?=round($a_pred3,4)?><br />
        Dari himpunan potensi SEDANG:<br>
        -(z<sub>3</sub>-<?=$z_min?>)/<?=($y_sedang-$z_min)?>=<?=round($a_pred3,4)?><br/>
        diperoleh <strong>z<sub>3.1</sub></strong>=<?=round($z3,4)?><br>
        -(<?=$y_sedang?>-z<sub>3</sub>)/<?=($y_sedang-$z_min)?>=<?=round($a_pred3,4)?><br/>
        diperoleh <strong>z<sub>3.2</sub></strong>=<?=round($z32,4)?>
        </p>               

        
<p><strong>Rule (R4) :</strong><em>        IF curah hujan TURUN and tinggi air TINGGI and Ketinggian Daratan TINGGI THEN Potensi RENDAH</em><br />
        <?php
        $a_pred4=min($ux_turun,$uy_banyak,$uz_banyak);
        $z4=$y_sedang-$a_pred4*($y_sedang-$z_min);
        ?>
        &alpha;-predikat<sub>4</sub>=&micro;<sub>curah hujan TURUN</sub> <big>&cap;</big> &micro;<sub>tinggi air TINGGI</sub><big>&cap;</big> &micro;<sub>Ketinggian Daratan TINGGI</sub><br />
          =min(&micro;<sub>curah hujan TURUN</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>tinggi air TINGGI</sub>(<?=$y?>)<big>&cap;</big> &micro;<sub>Ketinggian Daratan TINGGI</sub>(<?=$kd?>))<br />
          =min(<?=round($ux_turun,4)?>,<?=round($uy_banyak,4)?>,<?=round($uz_banyak,4)?>)<br />
          =<?=round($a_pred4,4)?><br />
        Dari himpunan potensi RENDAH: (<?=$y_sedang?>-z<sub>4</sub>)/<?=($y_sedang-$z_min)?>=<?=round($a_pred4,4)?><br/>
        diperoleh <strong>z<sub>4</sub></strong>=<?=round($z4,4)?>
        </p>
 <p><strong>Rule(R5) :</strong><em>IF curah hujan NAIK and tinggi air RENDAH and Ketinggian Daratan RENDAH THEN potensi SEDANG</em><br />
        <?php
        $a_pred5=min($ux_naik,$uy_sedikit,$uz_sedikit);
        $z5=$a_pred5*($y_sedang-$z_min)+$z_min;
         $z52=$y_sedang-$a_pred5*($y_sedang-$z_min);
        ?>
        &alpha;-predikat<sub>5</sub>=&micro;<sub>curah hujan NAIK</sub> <big>&cap;</big> &micro;<sub>tinggi air RENDAH</sub><big>&cap;</big> &micro;<sub>Ketinggian Daratan RENDAH</sub><br />
          =min(&micro;<sub>curah hujan NAIK</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>tinggi air RENDAH</sub>(<?=$y?>)<big>&cap;</big> &micro;<sub>Ketinggian Daratan RENDAH</sub>(<?=$kd?>))<br />
          =min(<?=round($ux_naik,4)?>,<?=round($uy_sedikit,4)?>,<?=round($uz_sedikit,4)?>)<br />
          =<?=round($a_pred5,4)?><br />
        Dari himpunan potensi SEDANG: <br>
        -(z<sub>5</sub>-<?=$z_min?>)/<?=($y_sedang-$z_min)?>=<?=round($a_pred5,4)?><br/>
        diperoleh <strong>z<sub>5.1</sub></strong>=<?=round($z5,4)?><br>
        -(<?=$y_sedang?>-z<sub>5</sub>)/<?=($y_sedang-$z_min)?>=<?=round($a_pred5,4)?><br/>
        diperoleh <strong>z<sub>5.2</sub></strong>=<?=round($z52,4)?>
        </p>        
        
<p><strong>Rule (R6) :</strong><em>IF curah hujan NAIK and tinggi air RENDAH and Ketinggian Daratan TINGGI THEN Potensi RENDAH</em><br />
        <?php
        $a_pred6=min($ux_naik,$uy_sedikit,$uz_banyak);
        $z6=$y_sedang-$a_pred6*($y_sedang-$z_min);
        ?>
        &alpha;-predikat<sub>6</sub>=&micro;<sub>curah hujan NAIK</sub> <big>&cap;</big> &micro;<sub>tinggi air RENDAH</sub><big>&cap;</big> &micro;<sub>Ketinggian Daratan TINGGI</sub><br />
          =min(&micro;<sub>curah hujan NAIK</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>tinggi air RENDAH</sub>(<?=$y?>)<big>&cap;</big> &micro;<sub>Ketinggian Daratan TINGGI</sub>(<?=$kd?>))<br />
          =min(<?=round($ux_naik,4)?>,<?=round($uy_sedikit,4)?>,<?=round($uz_banyak,4)?>)<br />
          =<?=round($a_pred6,4)?><br />
        Dari himpunan potensi RENDAH: (<?=$y_sedang?>-z<sub>6</sub>)/<?=($y_sedang-$z_min)?>=<?=round($a_pred6,4)?><br/>
        diperoleh <strong>z<sub>6</sub></strong>=<?=round($z6,4)?>
        </p>
        
<p><strong>Rule (R7) :</strong><em>IF curah hujan NAIK and tinggi air TINGGI and Ketinggian Daratan RENDAH THEN potensi TINGGI</em><br />
        <?php
        $a_pred7=min($ux_naik,$uy_banyak,$uz_sedikit);
        $z7=$a_pred7*($y_sedang-$z_min)+$y_sedang;
        ?>
        &alpha;-predikat<sub>7</sub>=&micro;<sub>curah hujan NAIK</sub> <big>&cap;</big> &micro;<sub>tinggi air TINGGI</sub><big>&cap;</big> &micro;<sub>Ketinggian Daratan RENDAH</sub><br />
          =min(&micro;<sub>curah hujan NAIK</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>tinggi air TINGGI</sub>(<?=$y?>)<big>&cap;</big> &micro;<sub>Ketinggian Daratan RENDAH</sub>(<?=$kd?>))<br />
          =min(<?=round($ux_naik,4)?>,<?=round($uy_banyak,4)?>,<?=round($uz_sedikit,4)?>)<br />
          =<?=round($a_pred7,4)?><br />
        Dari himpunan potensi TINGGI: (z<sub>7</sub>-<?=$y_sedang?>)/<?=($y_sedang-$z_min)?>=<?=round($a_pred7,4)?><br/>
        diperoleh <strong>z<sub>7</sub></strong>=<?=round($z7,4)?>
        </p>
<p><strong>Rule (R8) :</strong><em>IF curah hujan NAIK and tinggi air TINGGI and Ketinggian Daratan TINGGI THEN potensi TINGGI</em><br />
        <?php
        $a_pred8=min($ux_naik,$uy_banyak,$uz_banyak);
        $z8=$a_pred8*($y_sedang-$z_min)+$y_sedang;
        ?>
        &alpha;-predikat<sub>8</sub>=&micro;<sub>curah hujan NAIK</sub> <big>&cap;</big> &micro;<sub>tinggi air TINGGI</sub><big>&cap;</big> &micro;<sub>Ketinggian Daratan TINGGI</sub><br />
          =min(&micro;<sub>curah hujan NAIK</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>tinggi air TINGGI</sub>(<?=$y?>)<big>&cap;</big> &micro;<sub>Ketinggian Daratan TINGGI</sub>(<?=$kd?>))<br />
          =min(<?=round($ux_naik,4)?>,<?=round($uy_banyak,4)?>,<?=round($uz_banyak,4)?>)<br />
          =<?=round($a_pred8,4)?><br />
        Dari himpunan potensi TINGGI: (z<sub>8</sub>-<?=$y_sedang?>)/<?=($y_sedang-$z_min)?>=<?=round($a_pred8,4)?><br/>
        diperoleh <strong>z<sub>8</sub></strong>=<?=round($z8,4)?>
        </p>
       
        
      </fieldset>
      <fieldset>
        <legend>Defuzzyfication</legend>
        <?php
         $n=$a_pred1*$z1+$a_pred2*$z2+$a_pred3*$z3+$a_pred3*$z32+$a_pred4*$z4+$a_pred5*$z5+$a_pred5*$z52+$a_pred6*$z6+$a_pred7*$z7+$a_pred8*$z8;
        $d=$a_pred1+$a_pred2+$a_pred3+$a_pred3+$a_pred4+$a_pred5+$a_pred5+$a_pred6+$a_pred7+$a_pred8;
        $z=$n/$d;
        ?>
        <p>Menghitung z akhir dengan merata-rata semua z berbobot</p>
      <p>z=(&alpha;-predikat<sub>1</sub>*z<sub>1</sub>+&alpha;-predikat<sub>2</sub>*z<sub>2</sub>+&alpha;-predikat<sub>3</sub>*z<sub>3</sub>+&alpha;-predikat<sub>4</sub>*z<sub>4</sub>+&alpha;-predikat<sub>5</sub>*z<sub>5</sub>+&alpha;-predikat<sub>6</sub>*z<sub>6</sub>+&alpha;-predikat<sub>7</sub>*z<sub>7</sub>+&alpha;-predikat<sub>8</sub>*z<sub>8</sub>)/(&alpha;-predikat<sub>1</sub>+&alpha;-predikat<sub>2</sub>+&alpha;-predikat<sub>3</sub>+&alpha;-predikat<sub>4</sub>+&alpha;-predikat<sub>5</sub>+&alpha;-predikat<sub>6</sub>+&alpha;-predikat<sub>7</sub>+&alpha;-predikat<sub>8</sub>)<br/>
        =(<?=round($a_pred1,4)?>*<?=round($z1,4)?>+<?=round($a_pred2,4)?>*<?=round($z2,4)?>+<?=round($a_pred3,4)?>*<?=round($z3,4)?>+<?=round($a_pred3,4)?>*<?=round($z32,4)?>+<?=round($a_pred4,4)?>*<?=round($z4,4)?>+<?=round($a_pred5,4)?>*<?=round($z5,4)?>+<?=round($a_pred5,4)?>*<?=round($z52,4)?>+<?=round($a_pred6,4)?>*<?=round($z6,4)?>+<?=round($a_pred7,4)?>*<?=round($z7,4)?>+<?=round($a_pred8,4)?>*<?=round($z8,4)?>)<br/>/(<?=round($a_pred1,4)?>+<?=round($a_pred2,4)?>+<?=round($a_pred3,4)?>+<?=round($a_pred3,4)?>+<?=round($a_pred4,4)?>+<?=round($a_pred5,4)?>+<?=round($a_pred5,4)?>+<?=round($a_pred6,4)?>+<?=round($a_pred7,4)?>+<?=round($a_pred8,4)?>)<br/>
        =<?=round($n,4)?>/<?=round($d,4)?><br/>
        =<?=round($z,4)?></p>
        <p>Jadi Hasil Perhitungan (<strong>z</strong>) =<strong><?=round($z,4)?></strong></p>
      </fieldset>
            </p>
            
             </div>
                 </div>
                 </div>
                 </div>
                 </div>
                 </div> 
  
  <p>
    
  </p>               
                    
                </div>
                <!-- Row -->
                <!-- Row -->
               
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
 <!--  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8AguK8AiKn0oltaHBfCfpJF2gnPsTmLU&callback">
    </script> -->
         <?php 
         include('footer.php');
         ?>
