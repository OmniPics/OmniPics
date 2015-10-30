<?php
require("smartyStarter.php");
require("Picture.php");

$pictures = new Picture($local_database, $local_username, $local_password);

$filepath = isset($_REQUEST["rotatePath"]) ? $_REQUEST["rotatePath"] : "";
$picture_id = isset($_REQUEST["picture_id"]) ? $_REQUEST["picture_id"] : "";

if($filepath != "") {

 	$degrees = -90;  

	

	$rotatedBy = substr ($filepath , strlen($filepath)-3, 2);
	$coreFilepath = substr ($filepath , 0, strlen($filepath)-3);

	switch($rotatedBy) {

		case '_a':
			 $newFilepath = str_replace($coreFilepath, "", $coreFilepath.'_b');
			 break;
		case '_b':
			 $newFilepath = str_replace($coreFilepath, "", $coreFilepath.'_c');
			 break;
		case '_c':
			 $newFilepath = str_replace($coreFilepath, "", $coreFilepath.'_a');
			 break;
		default:
			$newFilepath = $filepath . '_a';

			header('Content-type: image/JPG');
			$source = imagecreatefromjpeg($filepath);
			$rotate = imagerotate($source,$degrees,0);

			imagejpeg($rotate, $newFilepath); //save the new image

			imagedestroy($source); //free up the memory
			imagedestroy($rotate);  //free up the memory

	}


		$pictures->updateFilepath($picture_id, $newFilepath);
	

}

$deletePic = isset($_REQUEST["deletePic"]) ? $_REQUEST["deletePic"] : "";

if($deletePic != "") {

	$pictures->removePicture($deletePic);
}



$picsAscDescString = isset($_REQUEST["picsAscOrDesc"]) ? $_REQUEST["picsAscOrDesc"] : "";
$picsAscDesc = intval($picsAscDescString);

$picsIndexStartString = isset($_REQUEST["picsIndexStart"]) ? $_REQUEST["picsIndexStart"] : "";
$picsIndexStart = intval($picsIndexStartString);

$amountOfPicsString = isset($_REQUEST["amountOfPics"]) ? $_REQUEST["amountOfPics"] : "";
$amountOfPics = intval($amountOfPicsString);

$orderPicsBy = isset($_REQUEST["orderPicsBy"]) ? $_REQUEST["orderPicsBy"] : "";


//Retrieves only two pictures from DB. One pic to be used and the next pic to check if it exists.
$pictureArray = $pictures->sortedPictures($picsAscDesc,$orderPicsBy,$picsIndexStart, $amountOfPics);


/*In order to make the picture refresh immediately after rotating picture, the img src needs to differ from it's previous src.
To do this i add a ?x=$num to source*/

$num = rand(0,1000);

//When deleting pictures I immediately get the next picture. This is to avoid trying to retrieve a next picture which doesn't exist.

$noMorePics = 0;

//Checks if next picture exists
if(!isset($pictureArray[1])) {

	$picsIndexStart--;

	if($picsIndexStart<0) {
		$noMorePics = 1;
	}
} 


?>
			<?php echo '<img id="retrieveImgInfo" src="' . $pictureArray[0]["path"] . '" style="display: none;" >';?>

			<?php if ($picsIndexStart>0) {

			echo '<div class="col-md-1" id="leftChild" onclick="previousPic()"></div>';
			}?>
			<?php echo '<img id="img" src="' . $pictureArray[0]["path"] .'?x=' . $num . '">';?>
			<?php if (isset($pictureArray[1]) ) {
				echo '<div id="rightChild" class="col-md-1" onclick="nextPic()" ><span id="right" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></div>';
			}?>
				<div id ="topMenuRight">
					<button type="button" class="btn btn-default">
		  					<span class="glyphicon glyphicon-pencil" ></span>
					</button>
					
					<?php echo 
					'<button type="button" class="btn btn-default" onclick="rotate('; echo "'" . $pictureArray[0]['picture_id'] . "',";	 echo "'" . $pictureArray[0]['path'] . "'"; echo  ')">';
					?>
		  					<span class="glyphicon glyphicon-repeat" ></span>
					</button>
					<button type="button" class="btn btn-default" <?php echo 'onclick="deletePic('; echo "'" . $pictureArray[0]['picture_id'] . "'," . $picsIndexStart . ", ".$noMorePics.")"; echo '">'; ?>
		  					<span class="glyphicon glyphicon-trash" ></span>
					</button>
				</div>
				<div id ="topMenuLeft">
					<button id="toFrontPageButton" type="button" class="btn btn-default" aria-label="Left Align" onclick="location.href='index.php'">Front Page
					</button>
				</div>
				


	  


<!--<a href ="rotate.php?filepath={$pictures[$picture_id].path}&&picture_id={$picture_id}"> baller </a>
//for å sender meg til rotate siden min, med også.. vil den gå på en reise gjennom php hvor blir snudd nitti grader med klokken
// og lagret til samme posisjon den har lagret på forhånd ehhm også maximum upload exceeded.-->
