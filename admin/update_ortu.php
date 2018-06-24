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
      $x=$_POST['NISN'];
      $a=$_POST['nama_ortu'];
      $e=$_POST['alamat'];
      $f=$_POST['nohp'];

      $edit=mysqli_query($con, "UPDATE data_ortu SET NISN='$x',nama_ortu='$a', alamat='$e',nohp='$f' where id='$id' ");

      if($edit){ 
              header("location:data_ortu.php");
      }else
              echo "gagal";
      }
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
          $sql = mysqli_query($con, "SELECT * FROM data_ortu WHERE id = '$id'");
          // $data = mysqli_fetch_array($sql);
          while($data = mysqli_fetch_array($sql)){
  
?>

<table>
<td style="width:70px;"></td>
<h3>Edit Data Pegawai</h3><br>
<form action="update_ortu.php?id=<?php echo $id; ?>" name="updatedata" method="post">
<td>
  <div class="form-group">
      <label ></label>
      <input value="<?php echo $data['id']; ?>" type="hidden" name="id" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >NISN:</label>
      <input value="<?php echo $data['NISN']; ?>" type="text" name="NISN" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >Nama:</label>
      <input value="<?php echo $data['nama_ortu']; ?>" type="text" name="nama_ortu" class="form-control"  style="width:300px;">
    </div> 
   <div class="form-group">
      <label >Alamat:</label>
      <input value="<?php echo $data['alamat']; ?>" type="text" name="alamat" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Nomor HP:</label>
      <input value="<?php echo $data['nohp']; ?>" type="text" name="nohp" class="form-control" style="width:300px;">
    </div>
  
  <?php
  }
  ?>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="updatedata" class="btn btn-primary">SUBMIT</button>
  </td>
  </form>
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
