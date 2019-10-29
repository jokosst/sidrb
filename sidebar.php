    <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
<?php
$x_min= 0;
$x_max= 50;
$y_min= 0.5;
$y_max= 2.5;
$z_min= 0.5;
$z_max= 1.7;
$y_sedang = 1.5;
$curah_hujan1=isset($_POST['curah_hujan'])?$_POST['curah_hujan']:0.00;
$tinggi_air1=isset($_POST['tinggi_air'])?$_POST['tinggi_air']:0.5;
$kd1=isset($_POST['kd'])?$_POST['kd']:1.35;
$kategori1=isset($_POST['kategori']);

?>
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                       
                         <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="info.php" aria-expanded="false"><i class="mdi mdi-help-circle"></i><span class="hide-menu">Info</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="about.php" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">About</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="admin" aria-expanded="false"><i class="mdi mdi-login"></i><span class="hide-menu">Login</span></a>
                        </li>
                        <form method='post' action="index_input.php">
                        <li> <input type="text" style="margin-bottom: 8px;" name="curah_hujan" class="form-control" placeholder="Curah Hujan (0-50)">
                        </li>
                        <li> <input type="text" name="tinggi_air" style="margin-bottom: 8px;" class="form-control" placeholder="Tinggi Air (0.5-2.5)">
                        </li>
                        <li> 
                            <select name="kategori" class="form-control" style="margin-bottom: 8px;">
                                <?php
                                include('koneksi.php');
           $q_kategori = mysqli_query($connect, "SELECT * FROM tbl_kategori");
         while($d_kategori = mysqli_fetch_array($q_kategori)){
            echo"<option value='",$d_kategori['nilai_awal'],"'>Tinggi Daratan (",$d_kategori['nilai_awal'],")</option>";
                                
                                }?>

                            </select>
                        </li>
                         <li> <button type="submit" name='proses' class="btn btn-danger" style="margin-bottom: 8px;">Hitung</button>
                        </li>
                    </form>
                     
<?php
if(isset($_POST['proses'])){
$ux_turun1=($x_max-$curah_hujan1)/($x_max-$x_min);
$ux_naik1=($curah_hujan1-$x_min)/($x_max-$x_min);
             
$uy_sedikit1=($y_max-$tinggi_air1)/($y_max-$y_min);
$uy_banyak1=($tinggi_air1-$y_min)/($y_max-$y_min);

$uz_sedikit1=($z_max-$kategori1)/($z_max-$z_min);
$uz_banyak1=($kategori1-$z_min)/($z_max-$z_min);
             
        //R1
        $a_pred11=min($ux_turun1,$uy_sedikit1,$uz_sedikit1);
        $z11=$y_sedang-$a_pred11*($y_sedang-$z_min);
        
        //R2
        $a_pred21=min($ux_turun1,$uy_sedikit1,$uz_banyak1);
        $z21=$y_sedang-$a_pred21*($y_sedang-$z_min);
        
        //R3
        $a_pred31=min($ux_turun1,$uy_banyak1,$uz_sedikit1);
        $z31=$a_pred31*($y_sedang-$z_min)+$z_min;
        $z312=$y_sedang-$a_pred31*($y_sedang-$z_min);
        
        //R4
        $a_pred41=min($ux_turun1,$uy_banyak1,$uz_banyak1);
        $z41=$y_sedang-$a_pred41*($y_sedang-$z_min);

        //R5
         $a_pred51=min($ux_naik1,$uy_sedikit1,$uz_sedikit1);
        $z51=$a_pred51*($y_sedang-$z_min)+$z_min;
         $z512=$y_sedang-$a_pred51*($y_sedang-$z_min);

        //R6
         $a_pred61=min($ux_naik1,$uy_sedikit1,$uz_banyak1);
        $z61=$y_sedang-$a_pred61*($y_sedang-$z_min);

        //R7
        $a_pred71=min($ux_naik1,$uy_banyak1,$uz_sedikit1);
        $z71=$a_pred71*($y_sedang-$z_min)+$y_sedang;

        //R8
       $a_pred81=min($ux_naik1,$uy_banyak1,$uz_banyak1);
        $z81=$a_pred81*($y_sedang-$z_min)+$y_sedang;
        
        //akhir perhitungan
       
       $n1=$a_pred11*$z11+$a_pred21*$z21+$a_pred31*$z31+$a_pred31*$z312+$a_pred41*$z41+$a_pred51*$z51+$a_pred51*$z512+$a_pred61*$z61+$a_pred71*$z71+$a_pred81*$z81;
        $d1=$a_pred11+$a_pred21+$a_pred31+$a_pred31+$a_pred41+$a_pred51+$a_pred51+$a_pred61+$a_pred71+$a_pred81;
        $hasil_sidebar=$n1/$d1;
echo $hasil_sidebar;
    $kategori1=isset($_POST['kategori']);
    $q_ktg1 = mysqli_query($connect,"SELECT * FROM tbl_kategori WHERE nilai_awal = '$kategori1'");
    $data_ktg1 = mysqli_fetch_array($q_ktg1);
    $nilai_rendah1 = $data_ktg1['nilai_rendah'];
    $nilai_awal = $data_ktg1['nilai_awal'];
    $nilai_sedang1 = $data_ktg1['nilai_sedang'];
    $nilai_tinggi1 = $data_ktg1['nilai_tinggi'];
    if($hasil_sidebar < $nilai_rendah1){
$status1 = "RENDAH";
echo"<li><h3 class='text-themecolor'><center> Nilai : ", round($hasil_sidebar,4)," (",$status1,")</center></h3><li>";
    }elseif($hasil_sidebar > $nilai_rendah1 && $hasil_sidebar <= $nilai_sedang1){
        $status1 = "SEDANG";
        echo"<li><h3 class='text-themecolor'><center> Nilai : ", round($hasil_sidebar,4)," (",$status1,")</center></h3><li>";
    }elseif($hasil_sidebar > $nilai_sedang1 && $hasil_sidebar > $nilai_tinggi1){
        $status1 = "TINGGI";
         echo"<li><h3 class='text-themecolor'><center> Nilai : ", round($hasil_sidebar,4)," (",$status1,")</center></h3><li>";
    }


    }
?>
                       
                        
                    </ul>
                    
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            
            <!-- End Bottom points-->
        </aside>