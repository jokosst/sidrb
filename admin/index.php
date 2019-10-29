<?php
include('koneksi.php');
include('cek_login.php');
include('header.php');
include('sidebar.php');
include('metode.php');
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
            var image = '../mak1.png';
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
           $query = mysqli_query($connect, "SELECT * FROM tbl_tempat");
         while($data = mysqli_fetch_array($query)){
          $lat = $data['lat'];
            $lon = $data['lng']; 
             $alamat = $data['alamat'];
             $kd = $data['kd'];
             

    $q_nilai = mysqli_query($connect,"SELECT * FROM tbl_nilai ORDER BY id_nilai DESC LIMIT 1");
    $data_nilai = mysqli_fetch_array ($q_nilai);
    $nilai_fuzzy = round($data_nilai['hasil_fuzzy'],4);
     $curah_hujan = $data_nilai['curah_hujan'];
      $tinggi_air = $data_nilai['tinggi_air'];
    $q_ktg = mysqli_query($connect,"SELECT * FROM tbl_kategori WHERE nilai_awal = '$kd' ");
    $data_ktg = mysqli_fetch_array($q_ktg);
    $nilai_rendah = $data_ktg['nilai_rendah'];
    $nilai_sedang = $data_ktg['nilai_sedang'];
    $nilai_tinggi = $data_ktg['nilai_tinggi'];
    
   if($hasil < $nilai_rendah){
$status = "RENDAH";
    }elseif($hasil > $nilai_rendah && $hasil <= $nilai_sedang){
        $status = "SEDANG";
    }elseif($hasil > $nilai_sedang && $hasil > $nilai_tinggi){
        $status = "TINGGI";
    }
            
        echo ("addMarker($lat, $lon,'<h3>$alamat</h3><b>Tinggi Dataran : $kd M</b><br><b>Ketinggian Air :  $tinggi_air M</b><br><b>Curah Hujan : $curah_hujan MM</b><br><b>Nilai : $nilai_fuzzy M ( $status ) </b>');\n"); 
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
            <h3 class="card-title">MAP</h3>
            <div id="map-canvas"></div>
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
