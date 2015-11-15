<?php

require("setup.php");
require("smartyStarter.php");
require("Picture.php");
require("backend/search.php");

session_start();
/*
function isJson($array) {
	json_decode($array);
	return (json_last_error() == JSON_ERROR_NONE);
}*/

$pictures = new Picture($local_database, $local_username, $local_password);

$keysArray = isset($_REQUEST["searchForKeys"]) ? $_REQUEST["searchForKeys"] : "";


if(!is_array($keysArray)) {

	$keysArray=json_decode($keysArray,true);
}

$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : "";

$picture_id =  isset($_REQUEST["picture_id"]) ? $_REQUEST["picture_id"] : "";
$sortedPictureArray = isset($_REQUEST["sortedPictureArray"]) ? $_REQUEST["sortedPictureArray"] : "";
$startIndex = isset($_REQUEST["startIndex"]) ? $_REQUEST["startIndex"] : "";

$picsAscDescString = isset($_REQUEST["picsAscOrDesc"]) ? $_REQUEST["picsAscOrDesc"] : "";
$picsAscDesc = intval($picsAscDescString);

$picsIndexStartString = isset($_REQUEST["picsIndexStart"]) ? $_REQUEST["picsIndexStart"] : "";
$picsIndexStart = intval($picsIndexStartString);

$amountOfPicsString = isset($_REQUEST["amountOfPics"]) ? $_REQUEST["amountOfPics"] : "";
$amountOfPics = intval($amountOfPicsString);

$orderPicsBy = isset($_REQUEST["orderPicsBy"]) ? $_REQUEST["orderPicsBy"] : "";

$picture_path = isset($_REQUEST["picture_path"]) ? $_REQUEST["picture_path"] : "";

$nextPicExists = 1;
$prevPicExists = 1;


switch($page) {
  	case 'pictureEdit':

		$smarty->assign("picture_path", $picture_path);
		$smarty->display('pictureEdit.tpl');
		break;

	case 'pictureViewer':

		$tagsBoundToPic = "";

		
		if($orderPicsBy=="") {

			$pictureArray = $pictures->listPictures('');
		} else {

			if (!($keysArray=="") && !empty($keysArray)) {
				$pictureArray = searchPictures($keysArray, $pictures, $picsAscDesc, $orderPicsBy, $picsIndexStart, 2);
			}else {
				$pictureArray = $pictures->sortedPictures($picsAscDesc, $orderPicsBy, $picsIndexStart, 2);
			}
		}

		$picture_id = $pictureArray[0]['picture_id'];

		$allExistingTags = $pictures->getAllTags();

		$picTags = $pictures->getTags($picture_id);


		for($i = 0; $i < count($picTags); $i++){
		    if($i == 0) {
		    	$tagsBoundToPic = $picTags[0];
		    }else {
		    	$tagsBoundToPic = $tagsBoundToPic . ', ' . $picTags[$i];
		    }
		}

		if (!isset($pictureArray[1])) {

			$nextPicExists = 0;
		}
		if ($picsIndexStart == 0) {

			$prevPicExists = 0;
		}

		$smarty->assign("keysArray", $keysArray);
		$smarty->assign("allExistingTags", $allExistingTags);
		$smarty->assign("tagsBoundToPic", $tagsBoundToPic);
		$smarty->assign("nextPicExists", $nextPicExists);
		$smarty->assign("prevPicExists", $prevPicExists);
		$smarty->assign("picture", $pictureArray);
		$smarty->assign("picsAscDesc", $picsAscDesc);
		$smarty->assign("orderPicsBy", $orderPicsBy);
		$smarty->assign("picsIndexStart", $picsIndexStart);

		$smarty->display('pictureViewer.tpl');
		break;

	default:
<<<<<<< HEAD
	
		$allExistingTags = $pictures->getAllTags();
		$smarty->assign("allExistingTags", $allExistingTags);
=======
>>>>>>> c6fc140da316a060521efa40243f5b0f56da3136

		$smarty->display('frontPage.tpl');
		break;
}