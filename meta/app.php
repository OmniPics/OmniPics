<?php

	

	getMeta("./samples/","website.jpg");
	
	function getMeta($path, $filename) {
		$iptc_raw = array();
		$size = getimagesize($path . $filename, $iptc_raw);

		$temp_array = array($size[0],$size[1],$size[2],$size[3]);


		foreach($size as $row) {
			print_r($row);
			print_r("<br>");
		}
	}




	function readAPP($meta, $meta_object) {
		if(isset($meta['APP13'])) {
			$iptc = iptcparse($meta['APP13']);
			//print_r($iptc);
			
			
			foreach($iptc as $code=>$under) {
				/*
					these are the tags
				*/
				// keywords already exist
				if($code == "2#025") {
					$meta_object->$tags = $under;
				}
				
			}
			
		}			
	}
	
	/*
		FORMATERING AV IPTC TAG (ikke skrevet av oss)
	*/
	// (thanks to Thies C. Arntzen)
	/*
		$rec = application record - vi bruker #2
		$dat = index (se cheat-sheet)
		$val = verdiene som skal inn
	
	*/
	
	function iptc_maketag($rec,$dat,$val){
		$len = strlen($val);
		if ($len < 0x8000)
			return chr(0x1c).chr($rec).chr($dat).
			chr($len >> 8).
			chr($len & 0xff).
			$val;
		else
			return chr(0x1c).chr($rec).chr($dat).
			chr(0x80).chr(0x04).
			chr(($len >> 24) & 0xff).
			chr(($len >> 16) & 0xff).
			chr(($len >> 8 ) & 0xff).
			chr(($len ) & 0xff).
			$val;
	}
	
?>
