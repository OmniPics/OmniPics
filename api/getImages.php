<?php

	$rawStartIndex = $_REQUEST['startIndex'];
	$rawOffsetCount = $_REQUEST['offset'];

	$lastIndex = intval($rawStartIndex) + intval($rawOffsetCount);

	require_once("setup.php");		// <----- DO NOT SHARE
	require_once("DbSystem.php");

	$system = new DbSystem("localhost",$local_username, $local_password, "images");
	
	$system->connect();
	$data = $system->query("SELECT * FROM table_images WHERE id BETWEEN $rawStartIndex AND $lastIndex");
	$data = $system->handleData("JSON",$data);
	print_r($data);

?>