<?php
function get_metadata($path,$filename) {
	$metadata = exif_read_data($path . "/" .$filename,0,true);	// Ex. ./images/ + filename.png 
	if($metadata) {
		/*foreach ($metadata as $key => $section) {
			foreach ($section as $name => $val) {
				// do stuff
			}
		}*/
		return $metadata;
	} else {
		print "Failed to load image";
	}
}
/*
# Funksjonskall med parametre og post av innhold i array ut
$mdata = get_metadata($imgdir,$imgfile);
*/

/*
# path til bilder for test av funksjoen 
$imgdir = "./images/";
$imgfile = "img.jpg";
*/
?>
