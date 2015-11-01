<?php

	require_once("metaclass.php");
	$newMeta = new Meta();
	init("./samples/","website.jpg", $newMeta);
	
	
	function init($path, $filename,$meta_object){
		
		
		$extracted_meta = array();
		$size = getimagesize($path . $filename, $extracted_meta);
		$basic_info = getBasic($size);
		readAPP($extracted_meta);
	}
	
	function getBasic($basic_size, $meta_object){
		/*
			We want the width and the height of the image
			[0] : width
			[1] : height
			[2] : 
			[3] : HTML-width and height
			[4] : channels
			[5] : mime (image/jpeg)
		*/
		// image width and height taken out
		$temp_width = $basic_size[0];
		$temp_height = $basic_size[1];
		$temp_channels = $basic_size[4];
		$temp_mime = $basic_size[5];
		
		return array($temp_width, $temp_height, $temp_channels, $temp_mime);
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
