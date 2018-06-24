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
      $a=$_POST['nama'];
      $b=$_POST['tempat_lahir'];
      $c=$_POST['tgl_lahir'];
      $d=$_POST['jk'];
      $e=$_POST['alamat'];
      $f=$_POST['nama_ayah'];
      $g=$_POST['nama_ibu'];

      $tambah=mysqli_query($con, "INSERT INTO data_siswa (NISN,nama,tempat_lahir,tgl_lahir,jk,alamat,nama_ayah,nama_ibu) VALUES ('$x','$a','$b','$c','$d','$e','$f','$g')");
      $tambah2=mysqli_query($con, "INSERT INTO data_absensi (NISN) VALUES ('$x')");

      if($tambah){ 
              header("location:data_siswa.php");
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
<form action="tambah_siswa.php"  method="post">
<td>
    <div class="form-group">
      <label >NISN:</label>
      <input type="text" name="NISN" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Nama:</label>
      <input type="text" name="nama" class="form-control" style="width:300px;">
    </div> 
    <div class="form-group">
      <label >Tempat Lahir:</label>
      <input type="text" name="tempat_lahir" class="form-control" style="width:300px;height;">
    </div>
    <div class="form-group">
    <label >Tanggal Lahir:</label>
      <input type="date" name="tgl_lahir" class="form-control" style="width:300px;height;">
    </div>
    <div class="form-group">
      <label >Jenis Kelamin:</label>
      <select name="jk" style="width:300px;" class="form-control" >
        <option value="laki-laki" selected="selected"><h1>Laki Laki</h1></option>
        <option value="perempuan" selected="selected"><h1>Perempuan</h1></option>
    </select>
  </div>
   <div class="form-group">
      <label >Alamat:</label>
      <input type="text" name="alamat" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Nama Ayah:</label>
      <input type="text" name="nama_ayah" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Nama Ibu:</label>
      <input type="text" name="nama_ibu" class="form-control" style="width:300px;">
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