<?php
require("setup.php");
require("smartyStarter.php");
require("Picture.php");

session_start();

$pictures = new Picture($local_database, $local_username, $local_password);

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

		$picture = $pictures->sortedPictures($picsAscDesc, $orderPicsBy, $picsIndexStart, 2);
		$picture_id = $picture[0]['picture_id'];

		$allExistingTags = $pictures->getAllTags();

		$array = $pictures->getTags($picture_id);


		for($i = 0; $i < count($array); $i++){
		    if($i == 0) {
		    	$tagsBoundToPic = $array[0];
		    }else {
		    	$tagsBoundToPic = $tagsBoundToPic . ', ' . $array[$i];
		    }
		}

		if (!isset($picture[1])) {

			$nextPicExists = 0;
		}
		if ($picsIndexStart == 0) {

			$prevPicExists = 0;
		}

		$smarty->assign("allExistingTags", $allExistingTags);
		$smarty->assign("tagsBoundToPic", $tagsBoundToPic);
		$smarty->assign("nextPicExists", $nextPicExists);
		$smarty->assign("prevPicExists", $prevPicExists);
		$smarty->assign("picture", $picture);
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
