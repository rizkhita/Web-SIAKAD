<?php
// including the database connection file
include "koneksi.php";
 
if(isset($_POST['update']))
{    
    $kode_mapel = $_POST['kode_mapel'];
    $nama_mapel = $_POST['nama_mapel'];
    $deadline = $_POST['deadline'];
    $keterangan = $_POST['keterangan'];

    // checking empty fields
    if(empty($kode_mapel) || empty($nama_mapel) || empty($deadline) || empty($keterangan)){    
            
        if(empty($kode_mapel)) {
            echo "<font color='red'>Kode Mata Pelajaran field is empty.</font><br/>";
        }
        
        if(empty($nama_mapel)) {
            echo "<font color='red'>Nama Mata Pelajaran field is empty.</font><br/>";
        }
        
        if(empty($deadline)) {
            echo "<font color='red'>Deadline field is empty.</font><br/>";
        }

        if(empty($keterangan)) {
            echo "<font color='red'>keterangan field is empty.</font><br/>";
        }
    } else {    
        //updating the table
        $sql = "UPDATE data_tugas SET kode_mapel=:kode_mapel, nama_mapel=:nama_mapel, deadline=:deadline, keterangan=:keterangan WHERE kode_mapel=:kode_mapel";
        $query= $db->prepare($sql);
        $query->bindparam(':kode_mapel', $kode_mapel);
        $query->bindparam(':nama_mapel', $nama_mapel);
        $query->bindparam(':deadline', $deadline);
        $query->bindparam(':keterangan', $keterangan);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':nim' => $nim, ':nama' => $nama, ':email' => $email, ':alamat' => $alamat));
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: tugas.php");
    }
}
?>
<?php
if(isset($_GET['kode_mapel'])){
//getting nim from url
$kode_mapel = $_GET['kode_mapel'];
//selecting data associated with this particular id
$sql = "SELECT * FROM data_tugas WHERE kode_mapel=:kode_mapel";
$q = $db->prepare($sql);
$q->execute(array(':kode_mapel' => $kode_mapel));
 
while($row = $q->fetch(PDO::FETCH_ASSOC))
{
    $kode_mapel = $row['kode_mapel'];
    $nama_mapel = $row['nama_mapel'];
    $deadline = $row['deadline'];
    $keterangan = $row['keterangan'];
}

}
?>
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      
      <div class="jumbotron">
        <h2>Edit Tugas</h2>
        <form name="form1" method="post" action="edit_tugas.php">
          <div class="form-group">
            <label >Nama Mata Pelajaran</label>
            <input type="nama_mapel"  class="form-control" name="nama_mapel" value="<?php echo $nama_mapel;?>">
          </div>
          <div class="form-group">
            <label> Deadline</label>
            <input type="deadline" class="form-control" name="deadline"  value="<?php echo $deadline;?>">
         </div>
          <div class="form-group">
            <label>Keterangan</label>
            <input type="keterangan" class="form-control" name="keterangan"  value="<?php echo $keterangan;?>">
         </div>
          <input type="hidden" name="kode_mapel" value="<?php echo $_GET['kode_mapel'];?>">
          <button type="submit" name="update" class="btn btn-default">Update</button>
        </form>
  
      </div>

    </div> <!-- /container -->