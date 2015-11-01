<?php
require("smartyStarter.php");
require("Picture.php");

$pictures = new Picture($local_database, $local_username, $local_password);

$picture_id = isset($_REQUEST["picture_id"]) ? $_REQUEST["picture_id"] : "";
$rotatedPic = $pictures->loadPicture($picture_id);



$picName = $rotatedPic['filename'];
$extension = $rotatedPic['extension'];
$filepath =  $rotatedPic['path'];

	if(strlen($picName)<3) {

		$rotatedBy = "";
		$coreName = $picName;
	}else {
		$rotatedBy = substr ($picName, strlen($picName)-2, 2);
		if($rotatedBy == '_a' || $rotatedBy == '_b' || $rotatedBy == '_c') {

			$coreName = substr ($picName , 0, strlen($picName)-2);
		}else{
			$coreName = $picName;
		}
	}

function ifFileDoesntExistRotate($newFilepath, $filepath) {

	if(!file_exists($newFilepath)) {
 		$degrees = -90;

		header('Content-type: image/JPG');
		$source = imagecreatefromjpeg($filepath);
		$rotate = imagerotate($source,$degrees,0);

		imagejpeg($rotate, $newFilepath); //save the new image

		imagedestroy($source); //free up the memory
		imagedestroy($rotate);  //free up the memory
	}
}


	switch($rotatedBy) {

		case '_a':
			 $newFilepath = 'images/'. $coreName.'_b.'.$extension.'';
			 $coreName = $coreName .'_b';
			 ifFileDoesntExistRotate($newFilepath, $filepath);
			 break;
		case '_b':
			 $newFilepath = 'images/'. $coreName.'_c.'.$extension.'';
			 $coreName = $coreName .'_c';
			 ifFileDoesntExistRotate($newFilepath, $filepath);
			 break;
		case '_c':
			 $newFilepath = 'images/'. $coreName.'.'.$extension.'';
			 ifFileDoesntExistRotate($newFilepath, $filepath);
			 break;
		default:
			$newFilepath = 'images/'. $coreName.'_a.'.$extension.'';
			$coreName = $coreName . '_a';
			ifFileDoesntExistRotate($newFilepath,$filepath);
	}


		$pictures->updateFilepath($picture_id, $newFilepath);
		$pictures->updatePicName($picture_id, $coreName);
	


/*In order to make the picture refresh immediately after rotating picture, the img src needs to differ from it's previous src.
To do this i add a ?x=$num to source*/

$num = rand(0,1000);


$rotatedPic = $pictures->loadPicture($picture_id);

$pictures->closeConnection();

echo "" . $rotatedPic['path']."?x=".$num."";


?>

			
