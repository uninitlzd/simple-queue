<?php 
require __DIR__ . '/vendor/autoload.php';
use \Slim\App;

$app = new App();

$app-> get('/', function(){
    echo "API Mahasiswa";
});

//run App
$app->run();