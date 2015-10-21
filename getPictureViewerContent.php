<?php
require("smartyStarter.php");
require("Picture.php");

$pictures = new Picture($local_database, $local_username, $local_password);

$filepath = isset($_REQUEST["rotatePath"]) ? $_REQUEST["rotatePath"] : "";

if($filepath != "") {

 	$degrees = -90;  //change this to be whatever degree of rotation you want

	header('Content-type: image/JPG');
	$source = imagecreatefromjpeg($filepath);
	$rotate = imagerotate($source,$degrees,0);

	imagejpeg($rotate, $filepath); //save the new image

	imagedestroy($source); //free up the memory
	imagedestroy($rotate);  //free up the memory
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

$obviousFirstPosInPicturesArray = 0;


$pictureArray = $pictures->sortedPictures($picsAscDesc,$orderPicsBy,$picsIndexStart, $amountOfPics);


/*In order to make the picture refresh immediately after rotating picture, the picture source needs to differ from it's previous source.
To do this i add a ?x=$num*/

$num = rand(0,1000);

//To avoid getting an index which doesn't exist when deleting the last picture

$noMorePics = 0;

if(!isset($pictureArray[$obviousFirstPosInPicturesArray+1])) {

	$picsIndexStart--;

	if($picsIndexStart<0) {
		$noMorePics = 1;
	}
} 


?>

			

		<ul class="nav nav-tabs">
	        		<button id="pnecil" type="button" class="btn btn-default">
	  					<span class="glyphicon glyphicon-pencil" ></span>
					</button>
					<button id="trash" type="button" class="btn btn-default" <?php echo 'onclick="deletePic('; echo "'" . $pictureArray[$obviousFirstPosInPicturesArray]['picture_id'] . "'," . $picsIndexStart . ", ".$noMorePics.")"; echo '">'; ?>
	  					<span class="glyphicon glyphicon-trash" ></span>
					</button>
					<?php echo '<button id="sort" type="button" class="btn btn-default" onclick="rotate('; echo "'" . $pictureArray[$obviousFirstPosInPicturesArray]['path'] . "'"; echo  ')">';
					?>
					<span class="glyphicon glyphicon-repeat"></span>
			</button>
		</ul>

		<!--<div id="ViewerRow" class="row">-->
		<?php if ($picsIndexStart>0) {

			echo '<div class="col-md-1" id="tilbakeBlokk" onclick="previousPic()"></div>';
		}?>

		<div class="col-md-7" id="pictureViewerImg">
			<?php echo '<img class="img-responsive img-pictureViewer" src="' . $pictureArray[$obviousFirstPosInPicturesArray]["path"] .'?x=' . $num . '">';?>
		</div>


		<?php if (isset($pictureArray[$obviousFirstPosInPicturesArray+1]) ) {
			echo '<div class="col-md-1" id="nesteBlokk" onclick="nextPic()"></div>';
		}?>

		<div class="col-md-3">
						Metadata kommer her

						<!--<p>{$pictures[$i+$j].filename}</p>-->
		</div>


<!--<a href ="rotate.php?filepath={$pictures[$picture_id].path}&&picture_id={$picture_id}"> baller </a>
//for å sender meg til rotate siden min, med også.. vil den gå på en reise gjennom php hvor blir snudd nitti grader med klokken
// og lagret til samme posisjon den har lagret på forhånd ehhm også maximum upload exceeded.-->
