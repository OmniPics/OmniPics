<?php
/*
	author: Thomas Darvik
	version: 2.0
*/

require("request.php");

class DatabaseSystem{


	public $picture_array;

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
		echo "connect call";
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

	function loadProduct($picture_id) {
		$picture = array(
			'picture_id' => 0,
			'filename' => "",
			'extention' => "",
		);

		if ($picture_id > 0) {
			$sql = "select * from Pictures where picture_id='$picture_id'";

			$result = mysqli_query($sql);

			if ($row = mysqli_fetch_assoc($result)) {
				$picture = array(
					"picture_id" => $row["picture_id"],
					"filename" => $row["filename"],
					"extention" => $row["extention"],
				);
			}
			return $picture;
		}

	}


	function listPictures(){

		$sql = "SELECT *
				FROM Pictures;";

		$result = mysqli_query($sql);

		if (!$result) {echo "error no result"; exit;};
		if (mysqli_num_rows($result)) {echo "table is prob empty, checkit out"; exit;};

		while($row = mysqli_fetch_assoc($result)) {
			$this->picture_array[$row["picture_id"]] =  array(
				"picture_id" => $row["picture_id"],
			);
		}
		mysqli_free_result($result);

		$new_array = array();
		foreach ($this->picture_array as $element) {
			$new_array[] = $this->loadProduct($element["picture_id"]);
			$element;
		}
		return $new_array;
	}

}


?>
