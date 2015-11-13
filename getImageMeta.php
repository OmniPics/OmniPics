<?php


	/*
		config file for the meta data
		The desired tags are the tags that will be collected and send over
		and handled by the db.

		If you wish to implement other tags, add them here.

	*/
	$allowed_image_types = array("jpeg","jpg");
	$desired_image_tags = array("FileName","Width","Height","FileSize");

	function process($data) {
		foreach($data as $point) {
			foreach($point as $tag=>$value) {

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
