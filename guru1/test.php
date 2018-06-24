<h2>List Mahasiswa</h2>
<table border="1">
    <tr><th>NO</th><th>NISN</th><th>NAMA</th><th>ALAMAT</th></tr>
    <?php
    include 'koneksi.php';
    $data_siswa = mysqli_query($koneksi, "SELECT nisn, nama, alamat from data_siswa");
    $data_siswa = mysqli_query($koneksi, "SELECT tanggal, nama, alamat from data_siswa");
    $no=1;
    foreach ($data_siswa as $row){
        echo "<tr>
            <td>$no</td>
            <td>".$row['nisn']."</td>
            <td>".$row['nama']."</td>
            <td>".$row['alamat']."</td>
              </tr>";
        $no++;
    }
    ?>
</table>