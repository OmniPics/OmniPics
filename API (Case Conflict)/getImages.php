<?php
/*
    AUTHOR: thomas darvik
    Website: http://www.darvik.net
*/

    require("setup.php");
    require("DbSystem.php");

	$system = new DbSystem("localhost",$local_username, $local_password, "omnipicsdb");
	$status = $system->connect();

	if($status) {

		$method = $_SERVER['REQUEST_METHOD'];
		$sql_string = $system->handleRequest($_REQUEST, $method);
		print_r($sql_string);
		//$data = $system->query("SELECT * FROM Pictures WHERE P_id BETWEEN '1' AND '20'");
		//$formattedData = $system->formatData("JSON",$data);
		//print_r($formattedData);
	}
?>