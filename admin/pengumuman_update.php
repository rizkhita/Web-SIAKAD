<!DOCTYPE html>
<html lang="en">
<?php
  session_start(); 
  if(!isset($_SESSION['id_admin']) and !isset($_SESSION['NIP'])){ 
  header("location:../index.php");
  }
  include ('../head.php');
?>

  <?php
      include("koneksi.php");
      if (isset($_POST["updatedata"])){
      $id=$_GET['id'];
      $x=$_POST['tgl_pengumuman'];
      $b=$_POST['isi'];

      // $cek2 = mysqli_query($con, "SELECT * FROM data_pengumuman WHERE tgl_pengumuman='$x' ");
      // $ceklagi2 =mysqli_num_rows($cek2);

       $edit=mysqli_query($con, "UPDATE data_pengumuman SET tgl_pengumuman='$x', isi='$b' where id='$id'");
            
      if($edit){
          header("location:pengumuman.php");
             }else
           header("location: pengumuman_update.php?pengumuman_update=gagal");
          }
        
                   

      

      // if($edit){ 
      //   header("location:data_ppk.php");
      //         // echo "<script> window.location = 'data_ppk.php'; </script>";
      // }
    
    ?>


<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
<?php
include ('nav_admin.php');
?>
<!-- end -->
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          </div>
 <?php
          //koneksi ke database
          include ("koneksi.php");

          //mengambil url id di admin-area(admin).php
          $id = $_GET['id'];

          //query
          $sql = mysqli_query($con, "SELECT * FROM data_pengumuman WHERE id = '$id'");
          // $data = mysqli_fetch_array($sql);
          while($data = mysqli_fetch_array($sql)){
  
?>

<table>
<td style="width:70px;"></td>
<h3>Edit Data Pegawai</h3><br>
<form action="pengumuman_update.php?id=<?php echo $id; ?>" name="updatedata" method="post">
<td>
    <div class="form-group">
      <label ></label>
      <input value="<?php echo $data['id']; ?>" type="hidden" name="id" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >Tanggal Pengumuman:</label>
      <input value="<?php echo $data['tgl_pengumuman']; ?>" type="date" name="tgl_pengumuman" class="form-control"  style="width:300px;">
    </div>
    <label >Isi :</label>
      <input value="<?php echo $data['isi']; ?>" type="text" name="isi" class="form-control" style="width:300px;height;">
    </div>
    <br>
      <?php

  }

  ?>

  <button style="width:150px;text-align:center;" type="submit" value="simpan" name="updatedata" class="btn btn-primary">SUBMIT</button>
  </td>

  </form>
      <?php
    if (isset($_GET["pengumuman_update"])){
              if ($_GET["pengumuman_update"] == 'gagal'){
                echo "<p id='gagal'>Update Gagal,Kode sudah digunakan</p>";
              }
            }


  ?> 
  </table>    
      </div>
        </div>
        <div class="card-footer small text-muted">Dinas Komunikasi dan Informatika Provinsi Jawa Barat</div>
      </div>
    </div>
  
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <?php include('footer_table.php');?>
  </div>
</body>

</html>

