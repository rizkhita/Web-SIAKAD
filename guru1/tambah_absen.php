<?php
// including the database connection file
include "koneksi2.php";
?> 
<?php
      include("koneksi2.php");
      if (isset($_POST["masuk"])){
      $nisn=$_POST['nisn'];
      $tgl1=$_POST['tgl1'];
      $status1=$_POST['status1'];
      $tambah=mysqli_query($con, "INSERT INTO data_absensi (nisn,tgl1,status1) VALUES ('$nisn','$tgl1','$status1')");

      if($tambah){ 
              header("location:absensi.php");
      }else
              echo "gagal";
      }
    ?>

    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      
      <div class="jumbotron">
        <h2>Kehadiran Siswa</h2>
        <form name="form1" method="post" action="tambah_absen.php">
        <input type="hidden" name="nisn" value="<?php echo $_GET['nisn'];?>">
          <div class="form-group">
            <label >Tanggal</label>
            <input type="date"  class="form-control" name="tgl1" >
          </div>
         <div class="form-group">
                    <label>Status Kehadiran</label>
                    <select  name="status1" class="form-control" required>
                      <option  value="hadir" selected="selected">Hadir</option>
                      <option  value="sakit" selected="selected">Sakit</option>
                      <option value="izin" selected="selected">Izin</option>
                      <option  value="alfa" selected="selected">Alfa</option>
                    </select>
          
          </div>
          
          <button type="submit" name="masuk" class="btn btn-default">Add</button>
        </form>
  
      </div>

    </div> <!-- /container -->
<?php


if(isset($_POST['masuk']))
{    
    $nisn = $_POST['nisn'];
    $tgl1 = $_POST['tgl1'];
    $status1 = $_POST['status1'];
      
    
    // checking empty fields
    if(empty($nisn) || empty($tgl1) || empty($status1)) {    
            
        if(empty($nisn)) {
            echo "<font color='red'>nisn field is empty.</font><br/>";
        }
        
        if(empty($tgl1)) {
            echo "<font color='red'>Tanggal field is empty.</font><br/>";
        }

        if(empty($status1)) {
            echo "<font color='red'>Status Kehadiran field is empty.</font><br/>";
        }
        
    } else {    
        //updating the table
      $query = $pdo->prepare("INSERT INTO data_absensi (nisn,tgl1,status1) values(:nisn,:tgl1;status1)");
        
                
       $dataku = array(
		':nisn' => '$nisn',
		':tgl1' => '$tgl1',
		':status1' => 'status1'
	);
        $query->execute($dataku);
        // Alternative to above bindparam and execute
        // $query->execute(array(':nim' => $nim, ':nama' => $nama, ':email' => $email, ':alamat' => $alamat));
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: absensi.php");
    }
}
?>




<!--<?php
include"koneksi2.php";
if($_POST){
	$tgl1 = $_POST['tgl1'];
    $status1 = $_POST['status1'];
    $q=$db->prepare("insert into data_absensi (tgl1,status1)values(?,?)");
    $q->execute(array($tgl1,$status1));
    header("Location:absensi.php");
}
?>-->

