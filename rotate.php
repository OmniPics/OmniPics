<?php
<<<<<<< HEAD
=======


$filepath = isset($_REQUEST["rotatePath"]) ? $_REQUEST["rotatePath"] : "";

if($filepath != "") {
	echo 'smut';
	$degrees = -	90;  //change this to be whatever degree of rotation you want

	header('Content-type: image/JPG');
	$source = imagecreatefromjpeg($filepath);
	$rotate = imagerotate($source,$degrees,0);

	imagejpeg($rotate, $filepath); //save the new image

	imagedestroy($source); //free up the memory
	imagedestroy($rotate);  //free up the memory
}

>>>>>>> dev
require("smartyStarter.php");
require("Picture.php");

$pictures = new Picture($local_database, $local_username, $local_password);

<<<<<<< HEAD
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

		$pictures->closeConnection();
	
		echo $newFilepath;

			
=======
$positionInArrayString = isset($_REQUEST["picPosInArray"]) ? $_REQUEST["picPosInArray"] : "";
$positionInArray = intval($positionInArrayString);

$picsAscDescString = isset($_REQUEST["picsAscOrDesc"]) ? $_REQUEST["picsAscOrDesc"] : "";
$picsAscDesc = intval($picsAscDescString);

$picsIndexStartString = isset($_REQUEST["picsIndexStart"]) ? $_REQUEST["picsIndexStart"] : "";
$picsIndexStart = intval($picsIndexStartString);

$amountOfPicsString = isset($_REQUEST["amountOfPics"]) ? $_REQUEST["amountOfPics"] : "";
$amountOfPics = intval($amountOfPicsString);

$orderPicsBy = isset($_REQUEST["orderPicsBy"]) ? $_REQUEST["orderPicsBy"] : "";



$pictures = $pictures->sortedPictures($picsAscDesc,$orderPicsBy,$picsIndexStart, $amountOfPics);
$num = rand(0,1000);


?>

			

		<ul class="nav nav-tabs">
	        		<button id="pnecil" type="button" class="btn btn-default">
	  					<span class="glyphicon glyphicon-pencil" ></span>
					</button>
					<button id="trash" type="button" class="btn btn-default">
	  					<span class="glyphicon glyphicon-trash" ></span>
					</button>
					<?php echo '<button id="sort" type="button" class="btn btn-default" onclick="rotate(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPics,'; echo "'" . $pictures[$positionInArray]['path'] . "'"; echo  ')">';
					?>
					<span class="glyphicon glyphicon-repeat"></span>
			</button>
		</ul>

		<!--<div id="ViewerRow" class="row">-->
		<?php if ($picsIndexStart>0) {

			echo '<div class="col-md-1" id="tilbakeBlokk" onclick="previousPic()"></div>';
		}?>

		<div class="col-md-7" id="pictureViewerImg">
			<?php echo '<img class="img-responsive img-pictureViewer" src="' . $pictures[$positionInArray]["path"] .'?x=' . $num . '">';?>
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
>>>>>>> dev
