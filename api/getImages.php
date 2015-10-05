<?php
/*
    AUTHOR: thomas darvik
    Website: http://www.darvik.net
*/
	$rawStartIndex = $_GET['startIndex'];
	$rawOffsetCount = $_GET['offset'];

	$lastIndex = intval($rawStartIndex) + intval($rawOffsetCount);

	require_once("setup.php");		// <----- DO NOT SHARE THIS
	require_once("DbSystem.php");

	$system = new DbSystem("localhost",$local_username, $local_password, "images");
	
	//$system->connect();
	//$data = $system->query("SELECT * FROM table_images WHERE id BETWEEN $rawStartIndex AND $lastIndex");
	//$data = $system->handleData("JSON",$data);
	$system->handleRequest($_GET);

	//print_r($data);

?>