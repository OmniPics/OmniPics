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



switch($page) {


	case 'pictureViewer':

		$picture = $pictures->sortedPictures($picsAscDesc, $orderPicsBy, $picsIndexStart, 3);

		$smarty->assign("picture", $picture);
		$smarty->assign("picsAscDesc", $picsAscDesc);
		$smarty->assign("orderPicsBy", $orderPicsBy);
		$smarty->assign("picsIndexStart", $picsIndexStart);
		$smarty->display('pictureViewer.tpl');
		break;

	default:
	
		$smarty->display('frontPage.tpl');
		break;
}
