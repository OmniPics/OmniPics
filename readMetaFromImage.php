<?php
function get_metadata($path,$filename) {
	/*
		CHECK IF THE FILENAME IS JPEG -> RETURN IF NOT
	*/

	if(strpos($filename, ".jpg") !== false && strpos($filename, ".jpeg") !== false) {
		$metadata = exif_read_data($path . "/" .$filename,0,true);	// Ex. ./images/ + filename.png 
		if($metadata) {
			return $metadata;
		} else {
			print "Failed to load image";
		}	
	}
}
?>
