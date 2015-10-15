<?php
function get_metadata($path,$filename) {
	$metadata = exif_read_data($path . $filename,0,true);
	foreach ($metadata as $key => $section) {
		foreach ($section as $name => $val) {
		}
	}
	return $metadata;
}

# path til bilder for test av funksjoen 
$imgdir = "tests/";
$imgfile = "test1.jpg";

# Funksjonskall med parametre og post av innhold i array ut
$mdata = get_metadata($imgdir,$imgfile);
var_dump($mdata);
?>
