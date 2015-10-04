<?php
/*
    AUTHOR: thomas darvik
    Website: http://www.darvik.net
    version: 2.0
*/


    require_once("setup.php")       // local file -> DO NOT SHARE
    require_once("DbSystem.php");
    $system = new DBsystem("localhost",$local_username,$local_password,"images");
    $system->connect();
    $dataresult = $system->query("SELECT * FROM table_images");
    $formatted = $system->handleData("JSON", $dataresult);

    print_r($formatted);


?>
