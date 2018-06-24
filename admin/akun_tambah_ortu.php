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
      $a=$_POST['password'];
      $b=$_POST['level'];


      $cek = mysqli_query($con, "SELECT * FROM login_ortu WHERE NISN='$x' ");
      $ceklagi=mysqli_num_rows($cek);

      $cek2 = mysqli_query($con, "SELECT * FROM data_ortu WHERE NISN='$x' ");
      $ceklagi2 =mysqli_num_rows($cek2);

       if($ceklagi2=0){
        header("location: akun_tambah_ortu.php?akun_tambah_ortu=gagal2");
        }else {

          if($ceklagi<1){
          $tambah=mysqli_query($con, "INSERT INTO login_ortu (NISN,password,level) VALUES ('$x','$a','$b')");
            header("location:akun_ortu.php");
             }else
              header("location: akun_tambah_ortu.php?akun_tambah_ortu=gagal");
             }
           }
    
  
    ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php include ('nav_admin.php'); ?>

<!-- end -->
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Buat Akun PNS</div>
        <div class="card-body">
          </div>
 
<table>
<td style="width:70px;"></td>
<h3>Tambah Data Pegawai</h3><br>
<form action="akun_tambah_ortu.php"  method="post">
<td>
    <div class="form-group">
      <label >NISN:</label>
      <input type="text" name="NISN" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Password:</label>
      <input type="text" name="password" class="form-control" style="width:300px;">
    </div> 
    <div class="form-group">
       <input type="hidden" name="level" value="ortu" class="form-control" style="width:300px;">
      <label >*Akun ini dibuat dengan level = PNS</label>
    </div>
    <br>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="tambahdata"class="btn btn-primary">SUBMIT</button>

  </td>
  <?php
          if (isset($_GET["akun_tambah_ortu"])){
              if ($_GET["akun_tambah_ortu"] == 'gagal'){
                echo "<p id='gagal'>Akun sudah ada</p>";
              }
            }
          if (isset($_GET["akun_tambah_ortu"])){
              if ($_GET["akun_tambah_ortu"] == 'gagal2'){
                echo "<p id='gagal'>NISN tidak valid </p>";
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
