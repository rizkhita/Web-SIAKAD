<?php
include('koneksi.php');
?>

<div class="container">
	<table id="tabelprofil" class="table table-bordered" style="width:90%; margin-top: 25px" >
		<thead>
			<tr>
      		<th style="width:60px"><center>No</center></th>
      		<th>NIP</th>
      		<th>Nama</th>
      		<th>Alamat</th>
      		<th>Email</th>
      		<th>Password</th>
      		</tr>
    	</thead>
    	<tbody>
<?php 
                $no=1;
                $q= $db->prepare("SELECT * FROM data_guru WHERE NIP=NIP");
                $q->execute();
                $q->setFetchMode(PDO::FETCH_OBJ);
                foreach ($q as $data) {
                  echo "
	                  		<td>$data->NIP</td>
	                        <td>$data->nama</td>
	                        <td>$data->alamat</td>
	                        <td>$data->email</td>
	                      	<td>$data->password</td>";
                  $no++;
                }

             ?>
</table>

<p><a href="edit_profil.php" class="btn btn-success">Edit Profil</a>
<!--<table id="customers">
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Berglunds snabbköp</td>
    <td>Christina Berglund</td>
    <td>Sweden</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Königlich Essen</td>
    <td>Philip Cramer</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
  <tr>
    <td>North/South</td>
    <td>Simon Crowther</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Paris spécialités</td>
    <td>Marie Bertrand</td>
    <td>France</td>
  </tr>
</table>
-->