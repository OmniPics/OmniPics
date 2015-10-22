<?php


	include("config.php");



	function process($data) {
		foreach($data as $point) {
			foreach($point as $tag=>$value) {


				/*
					using the desired_image_tags we can get the meta we want
				*/

				foreach($file)


				print $tag . " : " . $value . "<br>";
			}
		}
	}


	function getImageMeta($dir, $filename) {

		$isAllowed = FALSE;
		$foundTags = array();

		global $allowed_image_types;

		$exploded = explode(".",$filename);


		foreach($exploded as $needle) {

			foreach($allowed_image_types as $allowed) {

				if($allowed == $needle) {
					$isAllowed = true;
					break;
				}
			}

		}

		$dataArray = array();
		if($isAllowed) {
			$dataArray = exif_read_data($dir . $filename,0,TRUE);
			process($dataArray);
		} else {
			// not supported file
			print "File not supported";
		}

	}
	getImageMeta("./images/","1.jpg");





?>
