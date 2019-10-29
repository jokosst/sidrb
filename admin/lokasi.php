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
                            <li class="breadcrumb-item active">Lokasi</li>
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
                <?php
                                   if (!empty($_GET['notif'])) 
                                 {
                                  if($_GET['notif'] == 'sukses_ubah'){
                                    echo"<div class='alert alert-warning'>
              <button class='close' data-dismiss='alert'>×</button>
              <strong>SUKSES!!</strong> Data Berhasil di ubah</div>";
                                  }elseif($_GET['notif'] == 'sukses_simpan'){
                                    echo"<div class='alert alert-info'>
              <button class='close' data-dismiss='alert'>×</button>
              <strong>SUKSES!!</strong> Data Berhasil di tambah</div>";
                                  }elseif($_GET['notif'] == 'hapus'){
                                    echo"<div class='alert alert-danger'>
              <button class='close' data-dismiss='alert'>×</button>
              <strong>SUKSES!!</strong> Data Berhasil di hapus</div>";
                                  }
                              }

                                  ?>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-md-12">
                     <div class="card">
                    <div class="card-block">
                   <div class="row">
                  <div class="col-12">

                   <div class="d-flex flex-wrap">
                    <div>
            <h3 class="card-title"><a href="#" data-toggle="modal" data-target="#myModal_tambah" class="btn waves-effect waves-light btn-primary"><i class="mdi mdi-account-plus"></i>Tambah</a> </h3> </div>
                   </div>
<table id="example" class="display table table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr bgcolor="#9cd1db">
            <th>No</th>
            <th>Alamat</th>
            <th>Ketinggian Daratan</th>
            <th>Lat</th>
            <th>Lang</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php
       $query = mysqli_query($connect, "SELECT * FROM tbl_tempat");
        $no = 1;
         while($data = mysqli_fetch_array($query)){
          $id_tempat = $data['id_tempat'];
          $lat = $data['lat'];
            $lon = $data['lng']; 
             $alamat = $data['alamat'];
             $kd = $data['kd'];
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $alamat; ?></td>
            <td><?php echo $kd; ?></td>
            <td><?php echo $lat; ?></td>
             <td><?php echo $lon; ?></td>
            <td><div class="btn-group btn-group-sm" style="float: none;">
                <a class="btn btn-info btn-sm" href="<?php echo $id_tempat;?>" data-toggle="modal" data-target="#myModal<?php echo $id_tempat;?>" >
         <i class="mdi mdi-border-color"></i>Edit
          </a>
          <a class="btn btn-danger btn-sm" onclick="return confirmSubmit()" href="hapus.php?id_tempat=<?php echo $id_tempat;?>" >
         <i class="mdi mdi-delete-forever"></i>Hapus
          </a>
      </div></td>
        </tr>
        
        <script>
                  function confirmSubmit()
                    {
                        var agree=confirm("Apakah anda yakin akan menghapus Data ini?");
                        if (agree)
                            return true ;
                        else
                            return false ;
                    }
                </script>
                <?php
                  $no++;
                  }
                   ?>     
    </tbody>
</table>

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
     <?php
       $query = mysqli_query($connect, "SELECT * FROM tbl_tempat");
         while($data = mysqli_fetch_array($query)){
          $id_tempat = $data['id_tempat'];
          $lat = $data['lat'];
            $lon = $data['lng']; 
             $alamat = $data['alamat'];
             $kd = $data['kd'];
        ?>          
 <div class="modal fade" id="myModal<?php echo $id_tempat;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">EDIT</h4>
                  </div>
                  
 <form action="proses_edit_tempat.php?id_tempat=<?php echo $id_tempat;?>" method="post" enctype="multipart/form-data">
    
                  <div class="modal-body col-md-12">
                  <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                            <input type="text" name="alamat" value="<?php echo $alamat;?>" class="form-control border-input" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ketinggian Daratan</label>
                                            <input type="text" name="kd" value="<?php echo $kd;?>" class="form-control border-input">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>latitude</label>
                                            <input type="text" name="lat" value="<?php echo $lat;?>" class="form-control border-input">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>longitude</label>
                                            <input type="text" name="lng" value="<?php echo $lon;?>" class="form-control border-input">
                                            </div>
                                        </div>
                                        
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn waves-effect waves-light btn-info hidden-sm-down" data-dismiss="modal">Kembali</button>
             <button type="submit" class="btn waves-effect waves-light btn-success hidden-sm-down">Ubah</button>
                  </div>
                </form>
             
                </div>
              </div>
            </div>
<?php
                  }
                   ?>


 <div class="modal fade" id="myModal_tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">TAMBAH</h4>
                  </div>
                  
 <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
    
                  <div class="modal-body col-md-12">
                  <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control border-input" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ketinggian Daratan</label>
                                            <input type="text" name="kd" class="form-control border-input">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>latitude</label>
                                            <input type="text" name="lat" class="form-control border-input">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>longitude</label>
                                            <input type="text" name="lng" class="form-control border-input">
                                            </div>
                                        </div>
                                        
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn waves-effect waves-light btn-info hidden-sm-down" data-dismiss="modal">Kembali</button>
             <button type="submit" class="btn waves-effect waves-light btn-success hidden-sm-down">Simpan</button>
                  </div>
                </form>
             
                </div>
              </div>
            </div>                  
         <?php 
         include('footer.php');
         ?>
