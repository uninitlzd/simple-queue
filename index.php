<?php 
require __DIR__ . '/vendor/autoload.php';
require 'libs/NotORM.php'; 

use \Slim\App;

$app = new App();

// Mengkonfigurasi Server dan database kita
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$dbname = 'rumahsakit1';
$dbmethod = 'mysql:dbname=';

$dsn = $dbmethod.$dbname;
$pdo = new PDO($dsn, $dbuser, $dbpass);
$db  = new NotORM($pdo);

$app-> get('/', function(){
    echo "API Pasien";
});

$app ->get('/semuapasien', function() use($app, $db){
	$pasien["error"] = false;
	$pasien["message"] = "Berhasil mendapatkan data pasien";
    foreach($db->users() as $data){
        $pasien['semuapasien'][] = array(
            'id' => $data['id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            );
    }
    echo json_encode($pasien);
});

$app->run();