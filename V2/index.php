<?php
require 'vendor/autoload.php';

Flight::route('/', function(){
    echo 
    '<body style="background:red; text-align: center;">
        <span style = "color:white; font-size: 20em;">
        ❤
        </span>
    </body>';
});

Flight::route('/radnoMjesto', function(){
    // dohvaćanje podataka iz baze
    $db = Flight::db();
    $izraz = $db->prepare("select * from randnomjesto");
    $izraz->execute();
    $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($rezultati);
});

// Register class with constructor parameters
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=p3api','root',''));
Flight::start();
