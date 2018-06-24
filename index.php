<?php
    session_start();
    include("koneksi.php");
    if (isset($_POST["index"])){
    
$level = $_POST['level'];
$NIP = $_POST['NIP'];
$password = $_POST['password'];


$query = mysqli_query($con, "SELECT * FROM login_admin WHERE NIP = '$NIP' AND password = '$password' ");
$x = mysqli_fetch_array($query);


$query2 = mysqli_query($con, "SELECT * FROM login_guru WHERE NIP = '$NIP' AND password = '$password' ");
$y = mysqli_fetch_array($query2);



if($level=='admin'){

  if($x['NIP'] == $NIP AND $x['password'] == $password){
    
    $_SESSION['id_admin'] = $x['id_admin'];
    $_SESSION['NIP'] = $x['NIP'];

    header("location:admin/as_admin.php");
    }
    else{
    mysqli_close();
    session_destroy();
    header("location: index.php?index=gagal");
    }

 }else if($level=='guru'){

       if($y['NIP'] == $NIP AND $y['password'] == $password){
        
       $_SESSION['NIP'] = $y['NIP'];
       $_SESSION['id_guru'] = $y['id_guru'];
       header("location:guru/as_guru.php");
       }
       else{
       mysqli_close();
       session_destroy();
       header("location: index.php?index=gagal"); 
      }

}else{
                  mysqli_close();
                  session_destroy();
                  header("location: index.php?index=gagal");}

}

?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Website Cuti Online - DISKOMINFO JABAR</title>
  <!-- Bootstrap core CSS-->
  <link href="template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="template/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="template/css/sb-admin.css" rel="stylesheet">
   <!-- Page level plugin CSS-->
  <link href="template/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  

</head>


<!-- halaman log in -->
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">
        <div class="text-center">
        LOGIN SISTEM INFORMASI SEKOLAH</div>
        </div>
      <div class="card-body">
        <form action="index.php" method="post">

        <div class="form-group">
            <label >Username :</label>
            <input class="form-control" type="text" name="NIP"  placeholder="Masukan NIP" required>
        </div>
        <div class="form-group">
            <label >Password :</label>
            <input class="form-control" type="password" name="password" placeholder="Masukan Password" required>
        </div>
        <div class="form-group">
            <label >Log In Sebagai:</label>
            <select  name="level" style="width=300px;" class="form-control" placeholder="pilih" required>
              <option value="">---Pilih---</option>
              <option value="admin" >Administrator</option>
              <option value="guru">Guru</option>
            </select>
        </div>

         <button type="submit" name="index" id="submit" value="LOGIN" class="btn btn-primary">Submit</button>
        </form>
        <br>
        <?php
          if (isset($_GET["index"])){
              if ($_GET["index"] == 'gagal'){
                echo "<p id='gagal'>Login Gagal, Periksa Kembali Username,Password dan Level Log In Anda </p>";
              }
            }
            
          ?>
      </div>
    </div>
  </div>
  <!-- halaman log in -->

<!-- Bootstrap core JavaScript-->
  <script src="template/vendor/jquery/jquery.min.js"></script>
  <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>

