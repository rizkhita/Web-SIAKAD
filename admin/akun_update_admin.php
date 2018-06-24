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
      if (isset($_POST["updatedataku"])){
      $id_admin=$_GET['id_admin'];
      $x=$_POST['NIP'];
      $a=$_POST['password'];
      // $b=$_POST['level'];

      $edited=mysqli_query($con, "UPDATE login_admin SET NIP='$x',password='$a' where id_admin='$id_admin'");

      if($edited){ 
        header("location:akun_admin.php");
              
      }else{
        echo "gagal";
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
          <i class="fa fa-table"></i>Edit Akun PNS</div>
        <div class="card-body">
          </div>
 <?php
          //koneksi ke database
          include ("koneksi.php");

          //mengambil url id di admin-area(admin).php
          $id_admin = $_GET['id_admin'];

          //query
          $sql = mysqli_query($con, "SELECT * FROM login_admin WHERE id_admin = '$id_admin'");
          // $data = mysqli_fetch_array($sql);
          while($data = mysqli_fetch_array($sql)){
  
?>

<table>
<td style="width:70px;"></td>
<h3>Edit Data Pegawai</h3><br>
<form action="akun_update_admin.php?id_admin=<?php echo $id_admin; ?>" name="updatedataku" method="post">
<td>
    <div class="form-group">
      <label ></label>
      <input value="<?php echo $data['id_admin']; ?>" type="hidden" name="id_admin" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group"
      <label >Username:</label>
      <input value="<?php echo $data['NIP']; ?>" type="text" name="NIP" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >Password:</label>
      <input value="<?php echo $data['password']; ?>" type="text" name="password" class="form-control"  style="width:300px;">
    </div> 
    <div class="form-group">
      <label ></label>
      <input value="<?php echo $data['level']; ?>" type="hidden" name="level" class="form-control"  style="width:300px;">
    </div>
      <?php
  }
  ?>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="updatedataku" class="btn btn-primary">SUBMIT</button>
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
