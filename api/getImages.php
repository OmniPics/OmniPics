<?php
/*
    AUTHOR: thomas darvik
    Website: http://www.darvik.net
*/

    require("setup.php");
    require("DbSystem.php");

	$system = new DbSystem("localhost",$local_username, $local_password, "omnipicsdb");
	$status = $system->connect();
	print_r($status);
	$system->

	// connected or not ?
	if($status) {
		$sql_string = $system->handleRequest($_GET);
		//$data = $system->query($sql_string);
		$data = $system->query("SELECT * FROM Pictures");
		$data = $system->handleData($data);
	}


	
	//$system->connect();
	//$data = $system->query("SELECT * FROM table_images WHERE id BETWEEN $rawStartIndex AND $lastIndex");
	//$data = $system->handleData("JSON",$data);

	//$system->handleRequest($_GET);


	//print_r($data);

?>