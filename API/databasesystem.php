<?php
/*
	author: Thomas Darvik
	version: 2.0
*/

require("request.php");

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
				$fixed = $this->fixLinks($request);
				print_r($fixed);
				//$this->queryHandler($fixed[0], $fixed[1]);
				break;
			case "POST":
				break;
			default:
				break;
		}
	}

	public function queryHandler($query, $format) {
		if(!empty($query)) {
			$result = mysql_query($this->conn, $sql);
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
	public function fixLinks($request) {

		$index = "";
		$offset = "";
		$sorted = "";
		$format = "";

		$string = "";

		foreach($request as $key => $value) {
			//print_r($key . ":" . $value . "<br>");
			if($key == "imageIndex") {
				$index = $value;
			}
			if($key == "imageOffset" && $imageIndex != "") {
				$offset = $value;
				$lastIndex = intval($imageIndex) + intval($offset);
				$string .= "BETWEEN " . $imageIndex . " AND " . $lastIndex;
			}
			if($key == "format") {
				$format = $value;
				$string .= " AND " . $key . "=" . $value;
			}
			if($key == "sorted") {
				$sorted = $value;
				$string .= " SORTED BY " . $key . "=" . $value;
			}

		}
		return array($string,"JSON");

	}


	public function combineStrings($word1, $word2, $linkingWord) {
		return $word1 + " " + $linkingWord + " " + $word2;
	}


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
