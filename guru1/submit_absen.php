<?php
// including the database connection file
include "koneksi.php";
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $tgl1 = $_POST['tgl1'];
    $status1 = $_POST['status1'];
      
    
    // checking empty fields
    if(empty($id) || empty($tgl1) || empty($status1)) {    
            
        if(empty($id)) {
            echo "<font color='red'>id field is empty.</font><br/>";
        }
        
        if(empty($tgl1)) {
            echo "<font color='red'>Tanggal field is empty.</font><br/>";
        }

        if(empty($status1)) {
            echo "<font color='red'>Status Kehadiran field is empty.</font><br/>";
        }
        
    } else {    
        //updating the table
        $sql = "UPDATE data_absensi SET id=:id, tgl1=:tgl1, status1=:status1 WHERE id=:id";
        $query= $db->prepare($sql);
                
        $query->bindparam(':id', $id);
        $query->bindparam(':tgl1', $tgl1);
        $query->bindparam(':status1', $status1);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':nim' => $nim, ':nama' => $nama, ':email' => $email, ':alamat' => $alamat));
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: absensi.php");
    }
}
?>
<?php
if(isset($_GET['id'])){
//getting nim from url
$id = $_GET['id'];
//selecting data associated with this particular id
$sql = "SELECT tgl1,status1 FROM data_absensi WHERE id=:id";
$q = $db->prepare($sql);
$q->execute(array(':id' => $id));
 
while($row = $q->fetch(PDO::FETCH_ASSOC))
{
    $tgl1 = $row['tgl1'];
    $status1 = $row['status1'];
}

}
?>
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      
      <div class="jumbotron">
        <h2>Kehadiran Siswa</h2>
        <form name="form1" method="post" action="submit_absen.php">
          <div class="form-group">
            <label >Tanggal</label>
            <input type="date"  class="form-control" name="tgl1" value="<?php echo $tgl1;?>">
          </div>
         <div class="form-group">
                    <label>Status Kehadiran</label>
                    <select  name="status1" class="form-control" required>
                      <option name="status1" value="hadir">Hadir</option>
                      <option name="status1" value="sakit">Sakit</option>
                      <option name="status1" value="izin">Izin</option>
                      <option name="status1" value="alfa">Alfa</option>
                    </select>
          
          </div>
          <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
          <button type="submit" name="update" class="btn btn-default">Update</button>
        </form>
  
      </div>

    </div> <!-- /container -->

