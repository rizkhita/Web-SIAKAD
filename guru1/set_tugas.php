<?php
include('koneksi.php');
?>
<div class="container">
	<table id="tabelnilai" class="table table-bordered" style="width:90%; margin-top: 25px" >
		<thead>
      		<th style="width:60px"><center>No</center></th>
          <th><center>Kode Mata Pelajaran</center></th>
          <th><center>Nama Mata Pelajaran</center></th>
          <th><center>Deadline</center></th>
          <th><center>Keterangan</center></th>
          <th><center>Aksi</center></th>
    	</thead>
    	<tbody>
    		<?php 
                $no=1;
                $q= $db->prepare("SELECT * FROM data_tugas");
                $q->execute();
                $q->setFetchMode(PDO::FETCH_OBJ);
                foreach ($q as $data) {
                  echo "<tr>
                          <td>$no</td>
                          <td>$data->kode_mapel</td>
                          <td>$data->nama_mapel</td>
                          <td>$data->deadline</td>
                          <td>$data->keterangan</td>
                          <td><a href='set_edittugas.php?kode_mapel=$data->kode_mapel'>Edit</a> | 
                          <a href='delete_tugas.php?kode_mapel=$data->kode_mapel'>Delete</a></td>
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
            <h4 class="modal-title" id="myModalLabel">Tambah Tugas</h4>
        </div>

        <div class="modal-body">
          <form action="tambah_tugas.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 10px;">
                  <label for="Modal Name">Kode Mata Pelajaran</label>
                  <input type="text" name="kode_mapel"  class="form-control"/>
                </div>
                <div class="form-group" style="padding-bottom: 10px;">
                  <label for="Modal Name">Nama Mata Pelajaran</label>
                  <input type="text" name="nama_mapel"  class="form-control"/>
                </div>
                <div class="form-group" style="padding-bottom: 10px;">
                <label for="Modal Name">Deadline</label>
                    <input type="date" name="deadline"  class="form-control" />
                    </div>
                <div class="form-group" style="padding-bottom: 10px;">
                <label for="Modal Name">Keterangan</label>
                    <input type="text" name="keterangan"  class="form-control"/>
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