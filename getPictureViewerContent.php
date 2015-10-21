<?php
require("smartyStarter.php");
require("Picture.php");

$pictures = new Picture($local_database, $local_username, $local_password);

$filepath = isset($_REQUEST["rotatePath"]) ? $_REQUEST["rotatePath"] : "";

if($filepath != "") {

 	$degrees = -90;  

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
		

		<ul class="nav nav-tabs">
	        		<button id="pnecil" type="button" class="btn btn-default">
	  					<span class="glyphicon glyphicon-pencil" ></span>
					</button>
					<button id="trash" type="button" class="btn btn-default" <?php echo 'onclick="deletePic('; echo "'" . $pictureArray[0]['picture_id'] . "'," . $picsIndexStart . ", ".$noMorePics.")"; echo '">'; ?>
	  					<span class="glyphicon glyphicon-trash" ></span>
					</button>
					<?php echo '<button id="sort" type="button" class="btn btn-default" onclick="rotate('; echo "'" . $pictureArray[0]['path'] . "'"; echo  ')">';
					?>
					<span class="glyphicon glyphicon-repeat"></span>
			</button>
		</ul>

		<!--<div id="ViewerRow" class="row">-->
		<?php if ($picsIndexStart>0) {

			echo '<div class="col-md-1" id="tilbakeBlokk" onclick="previousPic()"></div>';
		}?>

		<div class="col-md-7" id="pictureViewerImg">
			<?php echo '<img class="img-responsive img-pictureViewer" src="' . $pictureArray[0]["path"] .'?x=' . $num . '">';?>
		</div>


		<?php if (isset($pictureArray[1]) ) {
			echo '<div class="col-md-1" id="nesteBlokk" onclick="nextPic()"></div>';
		}?>

		<div class="col-md-3">
						Metadata kommer her

						<!--<p>{$pictures[$i+$j].filename}</p>-->
		</div>


<!--<a href ="rotate.php?filepath={$pictures[$picture_id].path}&&picture_id={$picture_id}"> baller </a>
//for å sender meg til rotate siden min, med også.. vil den gå på en reise gjennom php hvor blir snudd nitti grader med klokken
// og lagret til samme posisjon den har lagret på forhånd ehhm også maximum upload exceeded.-->
