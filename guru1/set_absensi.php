<?php
include('koneksi.php');
?>
<div class="container">
	<table id="tabelabsen" class="table table-bordered" style="width:90%; margin-top: 25px" >
		<thead>
      		<th style="width:60px"><center>No</center></th>
          <th><center>Tanggal</center></th>
      		<th><center>nisn</center></th>
      		<th><center>Nama</center></th>
      		<th style="width:120px;"><center>Kehadiran</center></th>
          <th><center>Edit</center></th>
    	</thead>
    	<tbody>
    		<?php 
        $tes=$_SESSION['NIP'];
                $no=1;
                $q= $db->prepare("SELECT anggota_kelas.nisn,anggota_kelas.kode_kelas,data_absensi.id,data_siswa.nama,data_absensi.nisn,data_absensi.tgl1,data_absensi.status1 FROM data_absensi inner join data_siswa on data_absensi.nisn=data_siswa.nisn inner join anggota_kelas on data_absensi.nisn=anggota_kelas.nisn where anggota_kelas.kode_kelas=(SELECT kode_kelas from data_kelas where NIP='$tes' ) ");
                $q->execute();
                $q->setFetchMode(PDO::FETCH_OBJ);
// Tanggal hari ini
                foreach ($q as $data) {
                  echo "<tr>
                          <td>$no</td>
                          <td>$data->tgl1</td>
                          <td>$data->nisn</td>
                          <td>$data->nama</td>
                          <td>$data->status1</td>
                          <td><a href='set_editabsensi.php?id=$data->id'>Edit</a> |
                          <a href='set_tambahabsensi.php?nisn=$data->nisn'>Tambah</a></td>
                        </tr>";
                  $no++;
                }
             ?>
             
	</table>
</div>
<!-- $tes=$_SESSION['NIP'];

  $query=mysqli_query($con,"SELECT anggota_kelas.nisn,anggota_kelas.kode_kelas,data_absensi.id,data_siswa.nama,data_absensi.nisn,data_absensi.tgl1,data_absensi.status1 FROM data_absensi inner join data_siswa on data_absensi.nisn=data_siswa.nisn inner join anggota_kelas on data_absensi.nisn=anggota_kelas.nisn where anggota_kelas.kode_kelas=(SELECT kode_kelas from data_kelas where NIP='$tes' ) ");
 -->