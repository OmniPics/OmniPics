<?php
/*
	author: Thomas Darvik
	version: 2.0
*/

class DatabaseSystem{

	public $link;
	public $username;
	public $password;
	public $database;

	public $errorArray = Array();
	public $conn;

	public function __construct($link, $username, $password, $database) {
		$this->link = $link;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
	}

	public function connect() {
		$this->conn = mysqli_connect($this->link, $this->username, $this->password, $this->database);
		if($this->conn) {
			print_r("Connection");
		} else {
			array_push($this->errorArray, "Error connecting");
		}
	}

	public function handleRequest($method, $request) {
		if(!$method) {
			array_push($this->errorArray, "No method in the request");
		}
		if(!$method) {
			array_push($this->errorArray, "No request in the request");
		}
		switch ($method) {
			case "GET":
				print_r("GET request");
				break;
			case "POST":
				print_r("POST request");
				break;
			default:
				break;
		}
	}

	public function queryHandler($query, $format) {
		if(!empty($query)) {
			$result = mysql_query($this->conn, $sql);
			//print_r($result);
			print_r($result);
			while($row = mysqli_fetch_assoc($result)) {
				print_r("Hello");
			}

		} else {
			return null;
		}
	}
	/*
		TODO: When the format is present -> return the querystring AND the format (ex. json or xml)

	*/


	/* IS BROKEN? Return false else return true*/
	public function isOK() {
		if(sizeof($errorArray) == 0) {
			// no errors -> GO AHEAD
			return true;
		} else {
			return false;
		}
	}



}




?>
