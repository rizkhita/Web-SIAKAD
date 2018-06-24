<?php
include('koneksi.php');
?>
<div class="container">
	<table id="tabelnilai" class="table table-bordered" style="width:90%; margin-top: 25px" >
		<thead>
      		<th style="width:60px"><center>No</center></th>
      		<th><center>NISN</center></th>
          <th><center>Nama</center></th>
          <th><center>Nilai UTS</center></th>
          <th><center>Nilai UAS</center></th>
          <th><center>Nilai Ulangan Harian</center></th>
          <th><center>Nilai Tugas</center></th>
          <th><center>Nilai Akhir</center></th>
          <th><center>Aksi</center></th>
    	</thead>
    	<tbody>
    		<?php 
        $tes=$_SESSION['NIP'];
                $no=1;
                $q= $db->prepare("SELECT anggota_kelas.nisn,anggota_kelas.kode_kelas,data_nilai.id,data_siswa.nama,data_nilai.nisn,data_nilai.kode_mapel,data_nilai.nilai_uts,data_nilai.nilai_uas,data_nilai.nilai_ulha,data_nilai.nilai_tugas,data_nilai.nilai_akhir FROM data_nilai inner join data_siswa on data_nilai.nisn=data_siswa.nisn inner join anggota_kelas on data_nilai.nisn=anggota_kelas.nisn where anggota_kelas.kode_kelas=(SELECT kode_kelas from data_kelas where NIP='$tes' )");
                $q->execute();
                $q->setFetchMode(PDO::FETCH_OBJ);
                foreach ($q as $data) {
                  echo "<tr>
                          <td>$no</td>
                          <td>$data->nisn</td>
                          <td>$data->nama</td>
                          <td>$data->nilai_uts</td>
                          <td>$data->nilai_uas</td>
                          <td>$data->nilai_ulha</td>
                          <td>$data->nilai_tugas</td>
                          <td>$data->nilai_akhir</td>
                          <td><a href='set_editnilai.php?nisn=$data->nisn'>Edit</a> | 
                          <a href='delete_nilai.php?nisn=$data->nisn'>Delete</a></td>
                        </tr>";
                        
                  $no++;
                }

             ?>
	</table>
  <p><a href="#" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal" style=" margin-right: 130px;">Add Data</a></p>
</div>

<!-- modal tambah nilai -->

<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header" style="text-align:center;background:#4682b5;color:#fff;color:#fff;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h4 class="modal-title" id="myModalLabel">Tambah Nilai</h4>
        </div>

        <div class="modal-body">
          <form action="tambah_nilai.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 10px;">
                  <label for="Modal Name">Kode Mata Pelajaran</label>
                  <input type="text" name="kode_mapel"  class="form-control"/>
                </div>
               <div class="form-group" style="padding-bottom: 10px;">
                <label for="Modal Name">NISN</label>
                    <input type="text" name="nisn"  class="form-control" />
                    </div>
                <div class="form-group" style="padding-bottom: 10px;">
                <label for="Modal Name">Nilai UTS</label>
                    <input type="text" name="nilai_uts"  class="form-control" />
                    </div>
                <div class="form-group" style="padding-bottom: 10px;">
                <label for="Modal Name">Nilai UAS</label>
                    <input type="text" name="nilai_uas"  class="form-control"/>
                    </div>
                <div class="form-group" style="padding-bottom: 10px;">
                <label for="Modal Name">Nilai Ulangan Harian</label>
                    <input type="text" name="nilai_ulha"  class="form-control"/>
                    </div>
                <div class="form-group" style="padding-bottom: 10px;">
                <label for="Modal Name">Nilai Tugas</label>
                    <input type="text" name="nilai_tugas" class="form-control"/>
                    </div>
                <div class="form-group" style="padding-bottom: 10px;">
                <label for="Modal Name">Nilai Akhir</label>
                    <input type="text" name="nilai_akhir"  class="form-control"/>
                    </div>
              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
                      Confirm
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true" margin-right: "20px;">
                    Cancel
                  </button>
              </div>

              </form>

           

            </div>

           
        </div>
    </div>
</div>