<?php
// including the database connection file
include "koneksi.php";
 
if(isset($_POST['update']))
{    
    $kode_mapel = $_POST['kode_mapel'];
    $nisn = $_POST['nisn'];
    $nilai_uts = $_POST['nilai_uts'];
    $nilai_uas = $_POST['nilai_uas'];
    $nilai_ulha = $_POST['nilai_ulha'];
    $nilai_tugas = $_POST['nilai_tugas'];
    $nilai_akhir = $_POST['nilai_akhir'];  
    
    // checking empty fields
    if(empty($kode_mapel) || empty($nisn) || empty($nilai_uts) || empty($nilai_uas) || empty($nilai_ulha) || empty($nilai_tugas) || empty($nilai_akhir)) {    
            
        if(empty($kode_mapel)) {
            echo "<font color='red'>Kode Mata Pelajaran field is empty.</font><br/>";
        }
        
        if(empty($nisn)) {
            echo "<font color='red'>nisn field is empty.</font><br/>";
        }
        
        if(empty($nilai_uts)) {
            echo "<font color='red'>Nilai UTS field is empty.</font><br/>";
        }

        if(empty($nilai_uas)) {
            echo "<font color='red'>Nilai UAS field is empty.</font><br/>";
        }

        if(empty($nilai_ulha)) {
            echo "<font color='red'>Nilai Ulangan Harian field is empty.</font><br/>";
        }

        //  if(empty($nilai_tugas)) {
        //     echo "<font color='red'>Nilai Tugas field is empty.</font><br/>";
        // }

        if(empty($nilai_akhir)) {
            echo "<font color='red'>Nilai Akhir field is empty.</font><br/>";
        }
    } else {    
        //updating the table
        $sql = "UPDATE data_nilai SET kode_mapel=:kode_mapel, nilai_uts=:nilai_uts, nilai_uas=:nilai_uas, nilai_ulha=:nilai_ulha, nilai_tugas=:nilai_tugas, nilai_akhir=:nilai_akhir WHERE nisn=:nisn";
        $query= $db->prepare($sql);
                
        $query->bindparam(':nisn', $nisn);
        $query->bindparam(':kode_mapel', $kode_mapel);
        $query->bindparam(':nilai_uts', $nilai_uts);
        $query->bindparam(':nilai_uas', $nilai_uas);
        $query->bindparam(':nilai_ulha', $nilai_ulha);
        $query->bindparam(':nilai_tugas', $nilai_tugas);
        $query->bindparam(':nilai_akhir', $nilai_akhir);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':nim' => $nim, ':nama' => $nama, ':email' => $email, ':alamat' => $alamat));
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: nilai.php");
    }
}
?>
<?php
if(isset($_GET['nisn'])){
//getting nim from url
$nisn = $_GET['nisn'];
//selecting data associated with this particular id
$sql = "SELECT * FROM data_nilai WHERE nisn=:nisn";
$q = $db->prepare($sql);
$q->execute(array(':nisn' => $nisn));
 
while($row = $q->fetch(PDO::FETCH_ASSOC))
{
    $kode_mapel = $row['kode_mapel'];
    $nilai_uts = $row['nilai_uts'];
    $nilai_uas = $row['nilai_uas'];
    $nilai_ulha = $row['nilai_ulha'];
    $nilai_tugas = $row['nilai_tugas'];
    $nilai_akhir = $row['nilai_akhir'];
}

}
?>
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      
      <div class="jumbotron">
        <h2>Edit Nilai Siswa</h2>
        <form name="form1" method="post" action="edit_nilai.php">
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
            <label >Nilai Tugas</label>
            <input type="nilai_tugas" class="form-control" name="nilai_tugas"  value="<?php echo $nilai_tugas;?>">
          <div class="form-group">
            <label >Nilai Akhir</label>
            <input type="nilai_akhir" class="form-control" name="nilai_akhir"  value="<?php echo $nilai_akhir;?>">
          </div>
          <input type="hidden" name="nisn" value="<?php echo $_GET['nisn'];?>">
          <button type="submit" name="update" class="btn btn-default">Update</button>
        </form>
  
      </div>

    </div> <!-- /container -->