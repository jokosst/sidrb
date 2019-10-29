<?php
include('koneksi.php');
include('header.php');
include('sidebar.php');
include('metode.php');
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
                        <h3 class="text-themecolor">SISTEM INFORMASI DAERAH RAWAN BANJIR</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Info</li>
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
<?php
    $query = mysqli_query($connect,"SELECT * FROM tbl_tempat");
    $no = 1;
    while ($data = mysqli_fetch_array ($query)){
    ?>
                   <div class="col-lg-4 col-md-4">
                        <div class="card">
                            <img class="" src="assets/images/background/weatherbg.jpg" alt="Card image cap">
                            <div class="card-img-overlay" style="height:110px;">
                                <h3 class="card-title text-white m-b-0 dl"><?php echo $data['alamat'];?> </h3>
                                <small class="card-text text-white font-light"><?php echo date('l, d F Y') ?></small>
                              </div>
                              <br>
                            <div class="card-body weather-small">
                                <div class="row">
                                    <div class="col-8 b-r align-self-center">
                                        <div class="d-flex" style="margin-left: 15px;">
                                            <div class="display-6 text-info"><i class="wi wi-day-rain-wind"></i></div>
                                            <div class="m-l-20">
                                                    <?php 
    $kd = $data['kd'];
    // $q_nilai = mysqli_query($connect,"SELECT * FROM tbl_nilai ORDER BY id_nilai DESC LIMIT 1");
    // $data_nilai = mysqli_fetch_array ($q_nilai);
    // $nilai_fuzzy = $data_nilai['hasil_fuzzy'];
$nilai_fuzzy = round($hasil,4);
    $q_ktg = mysqli_query($connect,"SELECT * FROM tbl_kategori WHERE nilai_awal = '$kd' ");
    $data_ktg = mysqli_fetch_array($q_ktg);
    $nilai_rendah = $data_ktg['nilai_rendah'];
    $nilai_sedang = $data_ktg['nilai_sedang'];
    $nilai_tinggi = $data_ktg['nilai_tinggi'];
     // $status = "";
    if($hasil < $nilai_rendah){
$status = "RENDAH";
echo"<h1 class='font-light text-info m-b-0'>",$status,"</h1>
       <small>Nilai : ",round($hasil,4)," M</small>";
    }elseif($hasil > $nilai_rendah && $hasil <= $nilai_sedang){
        $status = "SEDANG";
        echo"<h1 class='font-light text-info m-b-0'>",$status,"</h1>
       <small>Nilai : ",round($hasil,4)," M</small>";
    }elseif($hasil > $nilai_sedang && $hasil > $nilai_tinggi){
        $status = "TINGGI";
        echo"<h1 class='font-light text-info m-b-0'>",$status,"</h1>
       <small>Nilai : ",round($hasil,4)," M</small>";
    }
    
               ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-4 text-center">
                                        <h1 class="font-light m-b-0"><?php echo $data['kd'];?><sup>M</sup></h1> 
                                        <small>K. Daratan</small>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                 <?php } ?>  
                  <?php  


//  $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => "http://202.90.199.132/aws-new/data/realtime",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "GET",
//   CURLOPT_HTTPHEADER => array(
//     "cache-control: no-cache"
//   ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// $response = json_decode($response, true); //because of true, it's in an array
// echo 'data: '. $konten['aaData']['station'];
 $sumber = 'http://202.90.199.132/aws-new/data/realtime';
 $konten = file_get_contents($sumber);
$response = json_decode($konten, true);
$data = $response['aaData'];
echo 'Lokasi: '. $data[12]['station']. '<br>';
echo 'Waktu: '. $data[12]['waktu'].'<br>';
echo 'Tinggi Air: '. $data[12]['waterlevel']. '<br>';
echo 'Curah Hujan: '. $data[12]['rain'];


 ?>  
                    
                </div>
                <!-- Row -->
                <!-- Row -->
               
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8AguK8AiKn0oltaHBfCfpJF2gnPsTmLU&callback=initMap">
    </script>
         <?php 
         include('footer.php');
         ?>
