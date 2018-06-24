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
      if (isset($_POST["tambahdata"])){
      $x=$_POST['NISN'];
      $a=$_POST['nama_ortu'];
      $e=$_POST['alamat'];
      $f=$_POST['nohp'];

      $tambah=mysqli_query($con, "INSERT INTO data_ortu (NISN,nama_ortu,alamat,nohp) VALUES ('$x','$a','$e','$f')");

      if($tambah){ 
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
 
<table>
<td style="width:70px;"></td>
<h3>Tambah Data Pegawai</h3><br>
<form action="tambah_ortu.php"  method="post">
<td>
    <div class="form-group">
      <label >NISN:</label>
      <input type="text" name="NISN" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Nama:</label>
      <input type="text" name="nama_ortu" class="form-control" style="width:300px;">
    </div> 
   <div class="form-group">
      <label >Alamat:</label>
      <input type="text" name="alamat" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Nomor HP:</label>
      <input type="text" name="nohp" class="form-control" style="width:300px;">
    </div>
    
    <br>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="tambahdata"class="btn btn-primary">SUBMIT</button>
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