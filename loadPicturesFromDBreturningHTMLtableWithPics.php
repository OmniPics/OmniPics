<?php

require("setup.php");
require("Picture.php");	

$pictures = new Picture($local_database, $local_username, $local_password);

$picturesToDelete = isset($_REQUEST["selectedPictures"]) ? $_REQUEST["selectedPictures"] : "";

if($picturesToDelete != "") {
	foreach ($picturesToDelete as $db_picture_id) {
			$pictures->removePicture($db_picture_id);
		}
}



$order = isset($_REQUEST["order"]) ? $_REQUEST["order"] : "";
$orderNumber = intval($order);

$limit = isset($_REQUEST["limit"]) ? $_REQUEST["limit"] : "";
$limitNumber = intval($limit);

$sortBy = isset($_REQUEST["sortby"]) ? $_REQUEST["sortby"] : "";


if($sortBy=="") {
	
	$pictureArray = $pictures->listPictures('');	
} else {

	$pictureArray = $pictures->sortedPictures($orderNumber,$sortBy,$limitNumber);
}


for($i = 0; $i < count($pictureArray); $i+=3) {

	echo '<div class="row">';

	for($j = 0; $j <= 2; $j++) {

		if (isset($pictureArray[$i+$j])) {

			echo '<div class="col-md-4 portfolio-item">';
				echo '<div id="golink' . ($i+$j) .'" onclick="pictureLink'; echo "('index.php?page=pictureViewer&&picture_id=" . ($i+$j) ."', '#golink" . ($i+$j) ."')"; echo '">';
					echo '<img onclick="selected('; echo "'#frontPageImage" . ($i+$j) . "'," . $pictureArray[$i+$j]['picture_id']; echo ')" id="frontPageImage' . ($i+$j) .'" class="img-responsive" src="' . $pictureArray[$i+$j]['path'] .'"></a>';
					echo '<p id="pictureInfo">' . $pictureArray[$i+$j]['filename'] . '</p>';
				echo '</div>';
			echo '</div>';
		}
	}

	echo '</div>';
}

$pictures->closeConnection();
