<?php
require("smartyStarter.php");
require("Picture.php");

$pictures = new Picture($local_database, $local_username, $local_password);

$filepath = isset($_REQUEST["filepath"]) ? $_REQUEST["filepath"] : "";

$positionInArrayString = isset($_REQUEST["picPosInArray"]) ? $_REQUEST["picPosInArray"] : "";
$positionInArray = intval($positionInArrayString);

$picsAscDescString = isset($_REQUEST["picsAscOrDesc"]) ? $_REQUEST["picsAscOrDesc"] : "";
$picsAscDesc = intval($picsAscDescString);

$picsIndexStartString = isset($_REQUEST["picsIndexStart"]) ? $_REQUEST["picsIndexStart"] : "";
$picsIndexStart = intval($picsIndexStartString);

$amountOfPicsString = isset($_REQUEST["amountOfPics"]) ? $_REQUEST["amountOfPics"] : "";
$amountOfPics = intval($amountOfPicsString);

$orderPicsBy = isset($_REQUEST["orderPicsBy"]) ? $_REQUEST["orderPicsBy"] : "";

if($filepath != "") {

	$degrees = 90;  //change this to be whatever degree of rotation you want

	header('Content-type: image/JPG');
	$source = imagecreatefromjpeg($filepath);
	$rotate = imagerotate($source,$degrees,0);

	imagejpeg($rotate, $filepath); //save the new image

	imagedestroy($source); //free up the memory
	imagedestroy($rotate);  //free up the memory
}

$pictures = $pictures->sortedPictures($picsAscDesc,$orderPicsBy,$picsIndexStart, $amountOfPics);

/*$smarty->assign('pictures', $pictureArray);
$smarty->assign('picPosInArray', $positionInArray);*/


?>

			

		<ul class="nav nav-tabs">
	        		<button id="pnecil" type="button" class="btn btn-default">
	  					<span class="glyphicon glyphicon-pencil" ></span>
					</button>
					<button id="trash" type="button" class="btn btn-default">
	  					<span class="glyphicon glyphicon-trash" ></span>
					</button>
					<button id="sort" type="button" class="btn btn-default" onclick="location.href='rotate.php?filepath={$pictures[$picture_id].path}&&picture_id={$picture_id}'">
					<span class="glyphicon glyphicon-repeat"></span>
			</button>
		</ul>

		<!--<div id="ViewerRow" class="row">-->
		<?php if ($picsIndexStart>0) {

			echo '<div class="col-md-1" id="tilbakeBlokk" onclick="previousPic()"></div>';
		}?>

		<div class="col-md-7" id="pictureViewerImg">
			<?php echo '<img class="img-responsive img-pictureViewer" src="' . $pictures[$positionInArray]["path"] .'">';?>
		</div>


		<?php if (isset($pictures[$positionInArray+1]) ) {
			echo '<div class="col-md-1" id="nesteBlokk" onclick="nextPic()"></div>';
		}?>

		<div class="col-md-3">
						Metadata kommer her

						<!--<p>{$pictures[$i+$j].filename}</p>-->
		</div>


<!--<a href ="rotate.php?filepath={$pictures[$picture_id].path}&&picture_id={$picture_id}"> baller </a>
//for å sender meg til rotate siden min, med også.. vil den gå på en reise gjennom php hvor blir snudd nitti grader med klokken
// og lagret til samme posisjon den har lagret på forhånd ehhm også maximum upload exceeded.-->
