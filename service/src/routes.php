<?php

use Slim\Http\Request;
use Slim\Http\Response;

function getConnect(){
    require_once 'include/dbHandler.php';
    $db = new dbHandler();
    return $db;
}
// Routes
$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

//---Melihat idzin--
$app->get("/idzin/{nisn}", function (Request $request, Response $response, $args){
    $nisn = $args["nisn"];
    $sql = "SELECT * FROM surat_izin WHERE nisn=:nisn";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([":nisn" => $nisn]);
    $result = $stmt->fetch();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});

//Menambah pengajuan
$app->post("/surat/", function (Request $request, Response $response){

    $surat = $request->getParsedBody();

    $sql = "INSERT INTO surat_izin (NISN,NIP,tgl_surat, nama_surat, isi_surat) VALUE (:NISN,:NIP,:tgl_surat,:nama_surat,:isi_surat)";
    $stmt = $this->db->prepare($sql);

    $data = [
        ":NISN" => $surat["NISN"],
        ":NIP" => $surat["NIP"],
        ":tgl_surat" => $surat["tgl_surat"],
        ":nama_surat" => $surat["nama_surat"],
        ":isi_surat" => $surat["isi_surat"]
    ];

    if($stmt->execute($data))
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});


//-------------------- END SURAT -------------------------

//------------------absen------------------
$app->get("/absen/{nisn}", function (Request $request, Response $response, $args){
    $nisn = $args["nisn"];
    $sql1 = "SELECT count(status1)AS jumlah_hadir from data_absensi WHERE status1='hadir' and nisn=:nisn" ;
    $stmt1 = $this->db->prepare($sql1);
    $stmt1->execute([":nisn" => $nisn]);
    $result1 = $stmt1->fetch();

    $sql2 = "SELECT count(status1)AS jumlah_sakit from data_absensi WHERE status1='sakit'and nisn=:nisn" ;
    $stmt2 = $this->db->prepare($sql2);
    $stmt2->execute([":nisn" => $nisn]);
    $result2 = $stmt2->fetch();

    $sql3 = "SELECT count(status1)AS jumlah_alfa from data_absensi WHERE status1='alfa'and nisn=:nisn" ;
    $stmt3 = $this->db->prepare($sql3);
    $stmt3->execute([":nisn" => $nisn]);
    $result3 = $stmt3->fetch();

    $sql4 = "SELECT count(status1)AS jumlah_izin from data_absensi WHERE status1='izin'and nisn=:nisn" ;
    $stmt4 = $this->db->prepare($sql4);
    $stmt4->execute([":nisn" => $nisn]);
    $result4 = $stmt4->fetch();

    return $response->withJson(["status" => "success", "jumlah_hadir" => $result1, "jumlah_sakit" => $result2, "jumlah_alfa" => $result3, "jumlah_izin" => $result4], 200);
});
//-----------END ABSEN---------------

//-------------NILAI--------------
$app->get("/nilai/{nisn}", function (Request $request, Response $response, $args){
    $nisn = $args["nisn"];
    $sql = "SELECT * FROM data_nilai WHERE nisn=:nisn";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([":nisn" => $nisn]);
    $result = $stmt->fetch();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});
//----------------end nilai------------------

//----------------ifo sekolah-------------
$app->get("/info/{id_info}", function (Request $request, Response $response, $args){
    $id_info = $args["id_info"];
    $sql = "SELECT * FROM info_sekolah WHERE id_info=:id_info";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([":id_info" => $id_info]);
    $result = $stmt->fetch();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});
//----------login ortu-----------
$app->post("/login_ortu/", function (Request $request, Response $response){

    $login1 = $request->getParsedBody();

    $sql = "INSERT INTO login_ortu (NISN,password,level) VALUE (:NISN,:password,:level)";
    $stmt = $this->db->prepare($sql);

    $data = [
        ":NISN" => $login1["NISN"],
        ":password" => $login1["password"],
        ":level" => $login1["level"],
       
    ];

    if($stmt->execute($data))
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});

//
$app->get("/login_ortu/{nisn}", function (Request $request, Response $response, $args){
    $nisn = $args["nisn"];
    $sql = "SELECT * FROM login_ortu WHERE nisn=:nisn";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([":nisn" => $nisn]);
    $result = $stmt->fetch();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});
//----------------login siswa----------------

//----------login ortu-----------
$app->post("/login_siswa/", function (Request $request, Response $response){

    $login2 = $request->getParsedBody();

    $sql = "INSERT INTO login_siswa (NISN,password,level) VALUE (:NISN,:password,:level)";
    $stmt = $this->db->prepare($sql);

    $data = [
        ":NISN" => $login2["NISN"],
        ":password" => $login2["password"],
        ":level" => $login2["level"],
       
    ];

    if($stmt->execute($data))
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});

//
$app->get("/login_siswa/{nisn}", function (Request $request, Response $response, $args){
    $nisn = $args["nisn"];
    $sql = "SELECT * FROM login_siswa WHERE nisn=:nisn";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([":nisn" => $nisn]);
    $result = $stmt->fetch();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});