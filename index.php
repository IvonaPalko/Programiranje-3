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

Flight::route('/API', function(){
    //indeksni niz
    $niz=array("3","P3","3P");

    //asocijativni
    $aso = array("ime"=>"Programiranje 3", "kratica"=>"P3");
    
    //objekt
    $objekt = new stdClass();
    $objekt->indeksniNiz = $niz;
    $objekt->asocijativniNiz=$aso;


    echo json_encode($objekt);


});

Flight::route('/slucajniBroj', function(){
    echo(rand(8,28));
});

Flight::route('/salt', function(){
    function getSalt() {
        $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789/\\][{}\'";:?.>,<!@#$%^&*()-_=+|';
        $randString = "";
        $randStringLen = 64;
   
        while(strlen($randString) < $randStringLen) {
            $randChar = substr(str_shuffle($charset), mt_rand(0, strlen($charset)), 1);
            $randString .= $randChar;
        }
   
        return $randString;
        
   }
   echo getSalt();
});

Flight::route('/oib', function(){
    
    $page = file_get_contents('http://oib.itcentrala.com/oib-generator/');


    preg_match("/<div class=\"oib\".*div>/", $page, $agent_name);


    print_r($agent_name);
});

Flight::start();
