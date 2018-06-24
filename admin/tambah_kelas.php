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
      $x=$_POST['NIP'];
      $a=$_POST['kode_kelas'];

 
      $cek = mysqli_query($con, "SELECT * FROM data_kelas WHERE NIP='$x' ");
      $ceklagi=mysqli_num_rows($cek);

      $cek2 = mysqli_query($con, "SELECT * FROM data_guru WHERE NIP='$x' ");
      $ceklagi2 =mysqli_num_rows($cek2);

       if($ceklagi2<1){
        header("location: tambah_kelas.php?tambah_kelas=gagal2");
        }else {

          if($ceklagi<1){
             $tambah=mysqli_query($con, "INSERT INTO data_kelas (NIP,kode_kelas) VALUES ('$x','$a')");
             header("location:data_kelas.php");
             }else
              header("location: tambah_kelas.php?tambah_kelas=gagal");
             }
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
<form action="tambah_kelas.php"  method="post">
<td>
  <!-- <input type="hidden" name="id" class="form-control" style="width:300px;"> -->
    
    <div class="form-group">
      <label >NIP:</label>
      <input type="text" name="NIP" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Kode Kelas:</label>
      <input type="text" name="kode_kelas" class="form-control" style="width:300px;">
    </div> 
    <br>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="tambahdata"class="btn btn-primary">SUBMIT</button>
  </td>
 <?php
          if (isset($_GET["tambah_kelas"])){
              if ($_GET["tambah_kelas"] == 'gagal'){
                echo "<p id='gagal'>Akun sudah ada</p>";
              }
            }
          if (isset($_GET["tambah_kelas"])){
              if ($_GET["tambah_kelas"] == 'gagal2'){
                echo "<p id='gagal'>NIP tidak valid </p>";
              }
            }
            
          ?>

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