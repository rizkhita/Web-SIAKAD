<?php
// including the database connection file
include "koneksi.php";
 
if(isset($_POST['update']))
{    
    $nama_mapel = $_POST['nama_mapel'];
    $deadline = $_POST['deadline'];
    $keterangan = $_POST['keterangan'];  
    
    // checking empty fields
    if(empty($nama_mapel) || empty($deadline) || empty($keterangan)) {    
            
        if(empty($nama_mapel)) {
            echo "<font color='red'>Kode Mata Pelajaran field is empty.</font><br/>";
        }
        
        if(empty($deadline)) {
            echo "<font color='red'>nisn field is empty.</font><br/>";
        }
        
        if(empty($keterangan)) {
            echo "<font color='red'>Nilai UTS field is empty.</font><br/>";
        }

    } else {    
        //updating the table
        $sql = "UPDATE data_tugas SET nama_mapel=:nama_mapel, deadline=:deadline, keterangan=:keterangan, WHERE nama_mapel=:nama_mapel";
        $query= $db->prepare($sql);
                
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
if(isset($_GET['nama_mapel'])){
//getting nim from url
$nama_mapel = $_GET['nama_mapel'];
//selecting data associated with this particular id
$sql = "SELECT * FROM data_tugas WHERE nama_mapel=:nama_mapel";
$q = $db->prepare($sql);
$q->execute(array(':nama_mapel' => $nama_mapel));
 
while($row = $q->fetch(PDO::FETCH_ASSOC))
{
    $nama_mapel = $row['nama_mapel'];
    $deadline = $row['deadline'];
    $keterangan = $row['keterangan'];
}

}
?>
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      
      <div class="jumbotron">
        <h2>Edit Data Tugas</h2>
        <form name="form1" method="post" action="edit_tugas.php">
          <div class="form-group">
            <label >Kode Mata Pelajaran</label>
            <input type="kode_mapel"  class="form-control" name="kode_mapel" value="<?php echo $kode_mapel;?>">
          </div>
          <div class="form-group">
            <label> Nilai UTS</label>
            <input type="nilai_uts" class="form-control" name="nilai_uts"  value="<?php echo $nilai_uts;?>">
         </div>
          <div class="form-group">
            <label >Nilai UAS</label>
            <input type="nilai_uas" class="form-control" name="nilai_uas"  value="<?php echo $nilai_uas;?>">
          </div>
          <div class="form-group">
            <label >Nilai Ulangan Harian</label>
            <input type="nilai_ulha" class="form-control" name="nilai_ulha"  value="<?php echo $nilai_ulha;?>">
          </div>
          <div class="form-group">
            <label >Nilai Akhir</label>
            <input type="nilai_akhir" class="form-control" name="nilai_akhir"  value="<?php echo $nilai_akhir;?>">
          </div>
          <input type="hidden" name="nisn" value="<?php echo $_GET['nisn'];?>">
          <button type="submit" name="update" class="btn btn-default">Update</button>
        </form>
  
      </div>

    </div> <!-- /container -->