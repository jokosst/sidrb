 <?php
//api bmkg
// http://202.90.199.132/aws-new/data/realtime
include "koneksi.php";
$x_min=isset($_POST['x_min'])?$_POST['x_min']:0;
$x_max=isset($_POST['x_max'])?$_POST['x_max']:50;
$y_min=isset($_POST['y_min'])?$_POST['y_min']:0.5;
$y_max=isset($_POST['y_max'])?$_POST['y_max']:2.5;
$z_min=isset($_POST['z_min'])?$_POST['z_min']:0;
$z_max=isset($_POST['z_max'])?$_POST['z_max']:2;

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
             
        //role 1
        $a_pred1=min($ux_turun,$uy_banyak);
        $z1=$z_max-$a_pred1*($z_max-$z_min);
        
        //role2
        $a_pred2=min($ux_turun,$uy_sedikit);
        $z2=$z_max-$a_pred2*($z_max-$z_min);
        
        //role3
        $a_pred3=min($ux_naik,$uy_banyak);
        $z3=$a_pred3*($z_max-$z_min)-$z_min;
        
        //role 4
        $a_pred4=min($ux_naik,$uy_sedikit);
        $z4=$a_pred4*($z_max-$z_min)-$z_min;
        
        //akhir perhitungan
        $n=$a_pred1*$z1+$a_pred2*$z2+$a_pred3*$z3+$a_pred4*$z4;
        $d=$a_pred1+$a_pred2+$a_pred3+$a_pred4;
        $hasil=$n/$d;



mysqli_query($connect,"insert into tbl_nilai values('','$waktu','$tinggi_air','$curah_hujan','$hasil')") or die(mysqli_error());

        ?>
    <script>

      var marker;
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }     
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var infoWindow = new google.maps.InfoWindow;      
        var bounds = new google.maps.LatLngBounds();
 
 
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
          function addMarker(lat, lng, info) {
            var image = 'mak1.png';
            var pt = new google.maps.LatLng(lat, lng);
            bounds.extend(pt);
            var marker = new google.maps.Marker({
                map: map,
                icon: image,
                position: pt
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
          }
 
          <?php
           $query = mysqli_query($connect, "SELECT * FROM tbl_tempat LIMIT 3");
         while($data = mysqli_fetch_array($query)){
          $lat = $data['lat'];
            $lon = $data['lng']; 
             $alamat = $data['alamat'];
             $kd = $data['kd'];
             

    $q_nilai = mysqli_query($connect,"SELECT * FROM tbl_nilai ORDER BY id_nilai DESC LIMIT 1");
    $data_nilai = mysqli_fetch_array ($q_nilai);
    $nilai_fuzzy = $data_nilai['hasil_fuzzy'];
    $q_ktg = mysqli_query($connect,"SELECT * FROM tbl_kategori WHERE nilai_awal = '$kd' ");
    $data_ktg = mysqli_fetch_array($q_ktg);
    $nilai_rendah = $data_ktg['nilai_rendah'];
    $nilai_sedang = $data_ktg['nilai_sedang'];
    $nilai_tinggi = $data_ktg['nilai_tinggi'];
    
    if($nilai_fuzzy <= $nilai_rendah){
$status = "TINGGI";
    }elseif($nilai_fuzzy > $nilai_rendah && $nilai_fuzzy <= $nilai_sedang){
        $status = "SEDANG";
    }elseif($nilai_fuzzy > $nilai_sedang && $nilai_fuzzy <= $nilai_tinggi){
        $status = "RENDAH";
    }
            
        echo ("addMarker($lat, $lon,'<h3>$alamat</h3><b>Tinggi Dataran : $kd M</b><br><b>Ketinggian Air :  1,2 M</b><br><b>Curah Hujan : 42,3 MM</b><br><b>Nilai : $nilai_fuzzy M ( $status ) </b>');\n"); 
            }
                                   
          ?>
        }
      google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    
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
                        <h3 class="text-themecolor">SISTEM INFORMASI DAERAH RAWAN BANJIR</h3>
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
            <h3 class="card-title">MAP</h3>
            <div id="map-canvas"></div>
             </div>
                 </div>
                 </div>
                 </div>
                 </div>
                 </div> 
  <p>Nilai Fuzzy : <?php echo round($hasil,4);?> M</p> <br>
  <p>
    
  </p>               
                    
                </div>