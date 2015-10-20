<?php

require("readMetaFromImage.php");

//$dir = "./images/";			// the local image-directory
#$metaArray = Array();		// init array
$minFileLength = 3;			// the minimum length of the filename + extension (1.jpg) is still bigger than 3
$maxFileLength = 50;		// the maximum length of the filename + extension (xxxxxx.jpg)


function getAllMetaFromDir($dir) {
	$files = scandir($dir);
	$allMetadata = Array();
	foreach($files as $file) {
		if(strlen($file) > $minFileLength && $file != ".gitignore") {
			$allMetadata = get_metadata($dir, $file);
			array_push($metaArray, $data);
		}
	}
	return $allMetadata;
}

$unformat = getAllMetaFromDir("./images/");
print json_encode($unformat);

?>