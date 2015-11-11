<?php

	//TESTMETA("./samples/");

	TESTMETA("./samples/",1,0);


	$totalTags = array(
		"width"=>"",
		"height"=>"",
		"FileDate"=>"",
		"FileSize"=>"",
		"Copyright"=>"",
		"Keywords"=>array()
	);


	function TESTMETA($path, $TESTexif, $TESTiptc) {
		// get all the image in current .dir -> get all the meta from them
		$files = scandir($path);
		foreach($files as $file) {
			if(strlen($file) >= 3) {

				if($TESTiptc) {
					print_r("FILENAME IS: " . $file . "<br>");
					getMeta($path . $file);
					print_r("<br>");
					print_r("--------------------------");
					print_r("--------------------------");
					print_r("--------------------------");
					print_r("<br>");
				} elseif ($TESTexif) {
					print_r("FILENAME IS: " . $file . "<br>");
					getEXIF($path . $file);
					print_r("<br>");
					print_r("--------------------------");
					print_r("--------------------------");
					print_r("--------------------------");
					print_r("<br>");
				}
			}
		}
	}

	function getEXIF($path, $filename) {
		$exif = exif_read_data($path . $filename);
		//print_r($exif);

		$array = array(
			"FileDateTime"=>$exif['FileDateTime'],			// exif position 1
			"FileSize"=>$exif['FileSize'],					// exif position 2
			"FileType"=>$exif['FileType'],					// exif position 3
			"MimeType"=>$exif['MimeType'],					// exif position 4
			"ComputedWidth"=>$exif['COMPUTED']['Width'],			// exif position 5 => computed position 'Height'
			"ComputedHeight"=>$exif['COMPUTED']['Height']			// exif position 5 => computed position "Width"
		);

		print_r($array);

	}

	function getMeta($path, $filename) {
		$iptc_raw = array();
		$size = getimagesize($path . $filename, $iptc_raw);
		//print_r($size);
		$array = array(
			"width" => $size[0],
			"height" => $size[1],
			"imagetype" => $size[2],
			"html" => $size[3],
			"bits" => $size[4],
			"channels" => $size[5],
			"mime" => $size[6],
			"other_tags" => array()
		);

		if(isset($iptc_raw['APP13'])) {
			$app13 = $iptc_raw['APP13'];
			$iptcUnhandled = iptcparse($app13);
			$returnIPTCarray = getIPTC($iptcUnhandled);
		}

		$array['other_tags'] = $returnIPTCarray;

		foreach($array as $row=>$value) {
			print_r($row . " : ");
			print_r($value);
			print_r("<br>");
		}
	}

	function getIPTC($iptc_raw) {
		$iptc_tag_array = array(
			"2#105" => "FALSE",
			"2#116" => "FALSE",
			"2#120" => "FALSE",
			"2#025" => "FALSE",
			"2#055" => "FALSE",
			"2#090" => "FALSE",
			"2#095" => "FALSE"
		);

		foreach($iptc_raw as $tag=>$value) {
			//print_r($tag . "<br>");
			switch ($tag) {
				case "2#105":
					$iptc_tag_array['2#105'] = $value;
					//print_r("keyword<br>");
					break;
				case "2#116":
					$iptc_tag_array['2#116'] = $value;
					//print_r("copyright<br>");
					break;
				case "2#120":
					$iptc_tag_array['2#120'] = $value;
					//print_r("caption abstract<br>");
					break;
				case "2#025":
					$iptc_tag_array['2#025'] = $value;
					//print_r("keywords<br>");
					break;
				case "2#055":
					$iptc_tag_array['2#055'] = $value;
					//print_r("date created<br>");
					break;
				case "2#090":
					$iptc_tag_array['2#090'] = $value;
					//print_r("city<br>");
					break;
				case "2#095":
					$iptc_tag_array['2#095'] = $value;
					//print_r("state<br>");
					break;

				default:
					print_r("======>  NOT HANDLED:  $tag<br>");
					break;
			}
		}
		return $iptc_tag_array;
	}



?>
