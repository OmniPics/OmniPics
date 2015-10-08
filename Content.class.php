<?php
	
	class Content {

		public $mysqli;

		public $info;

		function __construct($mysqli) {

			$this->mysqli = $mysqli;
		}

		function loadContent($id) {

			$query = "SELECT * FROM list where id=" . $id;

			$SQLquery = $this->mysqli->query($query);

			while($row = $SQLquery->fetch_assoc()) {

				$info = 
					array (
					'id' => $row['id'],
					'navn' => $row['navn'],
					'fodselsdato' => $row['fodselsdato'],
					'fodselsnummer' => $row['fodselsnummer'],
					'img' => $row['img']
					);
			}

			return $info;
		}

		function setAllContentToArray() {

			$amountOfPeople = mysqli_num_rows($this->mysqli->query("SELECT * FROM list"));
			$allContent = array();

			for($i = 0; $i < $amountOfPeople; $i++) {

				array_push($allContent, $this->loadContent($i));
			}

			return $allContent;
		}

		function setInfoToSmarty($smarty, $allPersonaliaInfo) {

			$id = array(); 
			$navn = array(); 
			$fodselsdato = array(); 
			$fodselsnummer = array();
			$img = array();

			for($i = 0; $i < count($allPersonaliaInfo); $i++) {

				array_push($id, $allPersonaliaInfo[$i]['id']);
				array_push($navn, $allPersonaliaInfo[$i]['navn']);
				array_push($fodselsdato, $allPersonaliaInfo[$i]['fodselsdato']);
				array_push($fodselsnummer, $allPersonaliaInfo[$i]['fodselsnummer']);
				array_push($img, $allPersonaliaInfo[$i]['img']);		
			}
			

			$smarty->assign(array(
            	
            	'id'=> $id, 
            	'navn' => $navn,
            	'fodselsdato' => $fodselsdato,
            	'fodselsnummer' => $fodselsnummer,
            	'img' => $img
			));
		}
	}