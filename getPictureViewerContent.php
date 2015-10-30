<?php
require("smartyStarter.php");
require("Picture.php");

$pictures = new Picture($local_database, $local_username, $local_password);

$picture_id = isset($_REQUEST["picture_id"]) ? $_REQUEST["picture_id"] : "";
$rotatedPic = $pictures->loadPicture($picture_id);



$picName = $rotatedPic['filename'];
$extension = $rotatedPic['extension'];
$filepath =  $rotatedPic['path'];

	
 	$degrees = -90;  

	$rotatedBy = substr ($picName, strlen($picName)-2, 2);
	$coreFilename = substr ($picName , 0, strlen($picName)-2);

	switch($rotatedBy) {

		case '_a':
			 $newFilepath = 'images/'. $coreFilename.'_b.'.$extension.'';
			 break;
		case '_b':
			 $newFilepath = 'images/'. $coreFilename.'_c.'.$extension.'';
			 break;
		case '_c':
			 $newFilepath = 'images/'. $coreFilename.'.'.$extension.'';
			 break;
		default:
			$newFilepath = 'images/'. $coreFilename.'_a.'.$extension.'';

			header('Content-type: image/JPG');
			$source = imagecreatefromjpeg($filepath);
			$rotate = imagerotate($source,$degrees,0);

			imagejpeg($rotate, $newFilepath); //save the new image

			imagedestroy($source); //free up the memory
			imagedestroy($rotate);  //free up the memory

	}


		$pictures->updateFilepath($picture_id, $newFilepath);
	

$deletePic = isset($_REQUEST["deletePic"]) ? $_REQUEST["deletePic"] : "";

if($deletePic != "") {

	$pictures->removePicture($deletePic);
}





/*In order to make the picture refresh immediately after rotating picture, the img src needs to differ from it's previous src.
To do this i add a ?x=$num to source*/

$num = rand(0,1000);

//When deleting pictures I immediately get the next picture. This is to avoid trying to retrieve a next picture which doesn't exist.

$noMorePics = 0;

//Checks if next picture exists
/*if(!isset($pictureArray[1])) {

	$picsIndexStart--;

	if($picsIndexStart<0) {
		$noMorePics = 1;
	}
} */

$rotatedPic = $pictures->loadPicture($picture_id);

echo "" . $rotatedPic['path']."?x=".$num."";

?>

			
				


	  


<!--<a href ="rotate.php?filepath={$pictures[$picture_id].path}&&picture_id={$picture_id}"> baller </a>
//for å sender meg til rotate siden min, med også.. vil den gå på en reise gjennom php hvor blir snudd nitti grader med klokken
// og lagret til samme posisjon den har lagret på forhånd ehhm også maximum upload exceeded.-->
