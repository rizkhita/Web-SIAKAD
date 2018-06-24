<!DOCTYPE html>
<html lang="en">
<?php
  session_start(); 
  if(!isset($_SESSION['id_admin']) and !isset($_SESSION['NISN'])){ 
  header("location:../index.php");
  }
  include ('../head.php');
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
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <a href="tambah_ortu.php"><button  name= "tambahdata" style="margin-left:20px;" class="btn btn-primary float-sm-left" type="submit"  value="ADD"><i class="fa fa-fw fa-user-circle"></i>&nbsp;<b>+</b></button></a>
              <br><br>
<?php
    include ('koneksi.php');


    $query=mysqli_query($con,"SELECT data_ortu.id,data_ortu.NISN,data_ortu.nama_ortu,data_ortu.alamat,data_ortu.nohp,data_siswa.nama FROM data_ortu inner join data_siswa on data_siswa.NISN=data_ortu.NISN ");
?>

              <thead>
                <tr>
                  <th>No.</th>
                  <th>NISN Siswa</th>
                  <th>Nama Siswa</th>
                  <th>Nama Orang Tua</th>
                  <th>Alamat</th>
                  <th>No HP</th>
                  <th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $i=0;
              while($data = mysqli_fetch_array($query)){
              $i=$i+1;
              ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $data['NISN']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['nama_ortu']; ?></td>
                  <td><?php echo $data['alamat']; ?></td>
                  <td><?php echo $data['nohp']; ?></td>
                  <td><p>&nbsp;<a href="update_ortu.php?id=<?php echo $data['id']; ?>" class="btn btn-primary"><i class="fa fa-fw fa-pencil-square-o"></i></a>&nbsp;&nbsp;<a href="delete_ortu.php?id=<?php echo $data['id']; ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a></p></td> 
                </tr>
                <?php
                  }
                ?>
              </tbody>
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