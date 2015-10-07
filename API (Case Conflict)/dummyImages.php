<?php

	
	require_once("setup.php");
	require_once("DbSystem.php");

	$system = new DbSystem("localhost",$local_username, $local_password, "images");
	$system->connect();
	
	$conn = mysqli_connect("localhost",$local_username, $local_password, "dummydata");
	







?>