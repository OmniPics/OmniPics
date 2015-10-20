<?php
/*
	
	README:
	- file is made to get a lot of images from disk and check for tags
	- this is for testing the exif tag function we have made "read_metadata_from_image.php"

*/
# the function that collects the meta from the images
require("read_metadata_from_image.php");

# get all the files from the ./images-folder
$dir = "./images/";
$files = scandir($dir);

foreach($files as $file) {
	//$exploded = explode(".", $file);
	if (strlen($file) > 3 && $file != ".girignore") {
		print $file;
		$data = get_metadata($dir, $file);
	}
	print_r(error_get_last());
	print "<br>";

}

//$data = get_metadata("./images/img.jpg");
/*
foreach ($data as $key => $section) {
	foreach ($section as $name => $val) {
		// do stuff
		print $name;
		print "<br>";
	}
}
*/


?>