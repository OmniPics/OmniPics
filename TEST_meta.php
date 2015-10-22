<?php

require("readMetaFromImage.php");

//$dir = "./images/";			// the local image-directory
#$metaArray = Array();		// init array
$minFileLength = 3;			// the minimum length of the filename + extension (1.jpg) is still bigger than 3
$maxFileLength = 50;		// the maximum length of the filename + extension (xxxxxx.jpg)


function getMetaFromImage($diskDir,$filename) {
	$metadata = getMetadata($diskDir . $filename);
	if($metadata != null) {
		// no error getting the meta 
		print $metadata;
	} else {
		// error getting the meta
		print "error..";

	}
}
getMetaFromImage("./images/","1.jpg");
?>