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

Flight::route('/radnomjesto', function(){
    $db = Flight::db();
    $izraz = $db->prepare("select * from radnomjesto");
    $izraz->execute();
    $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($rezultati);
});

Flight::route("POST /radnomjesto/dodaj",function(){
    $rm = json_decode(file_get_contents("php://input"));
    $veza = Flight::db();
    $izraz = $veza->prepare("insert into radnomjesto (naziv,opis,osnovica,satnica,neodredeno) 
    values (:naziv,:opis,:osnovica,:satnica,:neodredeno);");
    $izraz->execute((array)$rm);
    echo "OK";
});

Flight::route("GET /radnomjesto/obrisi/@id",function($id){
    $veza = Flight::db();
    $izraz = $veza->prepare("delete from radnomjesto 
                            where sifra=:sifra");
    $izraz->execute(array("sifra"=>$id));
    echo "OK";
});

Flight::register('db', 'PDO', 
    array('mysql:host=localhost;dbname=p3api','root','')
);


Flight::start();
