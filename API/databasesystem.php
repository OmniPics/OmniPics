<?php
/*
	author: Thomas Darvik
	version: 2.0
*/

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
