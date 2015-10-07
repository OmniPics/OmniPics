<?php

	$req = $_REQUEST;
	$method = $_SERVER["REQUEST_METHOD"];

	require_once("setup.php");
	require_once("databasesystem.php");

	$system = new DatabaseSystem("localhost",$local_username, $local_password, "omnipicsdb");
	if($system->isOK() ==  1) {
		print_r("SYSTEM IS OK<br>");
	}

	$data = $system->handleRequest($method, $req);

/*
	if($system->isOK() == 1) {
		print_r("SYSTEM IS OK!<br>");
	}

	$data = $system->handleRequest($method, $req);
	print_r($data);
*/


?>
