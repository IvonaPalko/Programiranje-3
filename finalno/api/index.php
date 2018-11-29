<?php
require 'flight/Flight.php';

Flight::route('/', function(){
    echo 'hello world!';
});

//SELECT
Flight::route('/automobili', function(){
    $veza = Flight::db();
	$izraz = $veza->prepare("select sifra, naziv, proizvodjac from automobil");
    $izraz->execute();
    echo json_encode($izraz->fetchAll(PDO::FETCH_OBJ));
});
Flight::route('/automobili/@id', function($sifra){
    $veza = Flight::db();
	$izraz = $veza->prepare("select sifra, naziv, proizvodjac from automobil where sifra=:sifra");
	$izraz->execute(array("sifra" => $sifra));
    echo json_encode($izraz->fetch(PDO::FETCH_OBJ));
});
//INSERT CREATE
Flight::route('POST /novi', function(){
	$o = json_decode(file_get_contents('php://input'));
	$veza = Flight::db();
	$izraz = $veza->prepare("insert into automobil (naziv, proizvodjac) values (:naziv,:proizvodjac)");
	$izraz->execute((array)$o);
	echo "OK";
});
//UPDATE
Flight::route('POST /update', function(){
	$o = json_decode(file_get_contents('php://input'));
	$veza = Flight::db();
	$izraz = $veza->prepare("update automobil set naziv=:naziv,proizvodjac=:proizvodjac where sifra=:sifra;");
	$izraz->execute((array)$o);
	echo "OK";
});
//DELETE
Flight::route('POST /obrisi', function(){
	$o = json_decode(file_get_contents('php://input'));
	$veza = Flight::db();
	$izraz = $veza->prepare("delete from automobil where sifra=:sifra;");
	$izraz->execute((array)$o);
	echo "OK";
});
//SEARCH
Flight::route('/search/@uvjet', function($uvjet){
	$veza = Flight::db();
	$izraz = $veza->prepare("select naziv, proizvodjac from automobil where concat(naziv, proizvodjac) like :uvjet");
	$izraz->execute(array("uvjet" => "%" . $uvjet . "%"));
	echo json_encode($izraz->fetchAll(PDO::FETCH_OBJ));
});
//utility
Flight::map('notFound', function(){
	$poruka=new stdClass();
	$poruka->status="404";
	$poruka->message="Not found";
	echo json_encode($poruka);
 });
//LOKALNO
//Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=finalno;charset=UTF8','root',''));
//SERVER
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=ipalko_P3;charset=UTF8','ipalko','1dc86d1a'));

Flight::start();
