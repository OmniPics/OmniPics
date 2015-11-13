<?php

require("setup.php");
require("Picture.php");
require("backend/search.php");

$pictures = new Picture($local_database, $local_username, $local_password);

$picturesToDelete = isset($_REQUEST["selectedPictures"]) ? $_REQUEST["selectedPictures"] : "";

if($picturesToDelete != "") {
	foreach ($picturesToDelete as $db_picture_id) {
			$pictures->removePicture($db_picture_id);
		}
}

// toms frontend tags_ids

$keysArray = isset($_REQUEST["searchForKeys"]) ? $_REQUEST["searchForKeys"] : "";
$keysArray=json_decode($keysArray,true);


// end toms frontendtags

$picsAscDescString = isset($_REQUEST["picsAscOrDesc"]) ? $_REQUEST["picsAscOrDesc"] : "";
$picsAscDesc = intval($picsAscDescString);

$picsIndexStartString = isset($_REQUEST["picsIndexStart"]) ? $_REQUEST["picsIndexStart"] : "";
$picsIndexStart = intval($picsIndexStartString);

$amountOfPicsString = isset($_REQUEST["amountOfPics"]) ? $_REQUEST["amountOfPics"] : "";
$amountOfPics = intval($amountOfPicsString);

$orderPicsBy = isset($_REQUEST["orderPicsBy"]) ? $_REQUEST["orderPicsBy"] : "";


if($orderPicsBy=="") {

	$pictureArray = $pictures->listPictures('');
} else {

	if (!($keysArray=="") && !empty($keysArray)) {
		$pictureArray = searchPictures($keysArray, $pictures, $picsAscDesc, $orderPicsBy, $picsIndexStart, $amountOfPics);
	}else {
		$pictureArray = $pictures->sortedPictures($picsAscDesc, $orderPicsBy, $picsIndexStart, $amountOfPics);
	}
}


for($i = 0; $i < count($pictureArray); $i+=3) {

	echo '<div class="row">';

	for($j = 0; $j <= 2; $j++) {

		if (isset($pictureArray[$i+$j])) {

			echo '<div class="col-md-4 portfolio-item">';
				echo '<div id="golink'.($picsIndexStart+$i+$j).'" ondblclick="pictureLink'; echo "(".($picsIndexStart+$i+$j).")"; echo '">';
					echo '<img onclick="selected('; echo "'#frontPageImage".($picsIndexStart+$i+$j)."',".$pictureArray[$i+$j]['picture_id']; echo ')" id="frontPageImage'.($picsIndexStart+$i+$j).'" class="img-responsive img-frontPage" src="'.$pictureArray[$i+$j]["path"].'"> </a>';
					echo '<p id="pictureInfo">' . $pictureArray[$i+$j]['filename'] . '</p>';
				echo '</div>';
			echo '</div>';
		}
	}

	echo '</div>';
}

$pictures->closeConnection();

?>
