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




switch($page) {


	case 'pictureViewer':

		//$picture = $pictures->getPictureById($picture_id);

		if($sortedPictureArray != "") {
			$smarty->assign("sortedPictureArray", $picsAscDesc);
		}
		$smarty->assign("picture", $picture);
		
		$smarty->display('pictureViewer.tpl');
		break;

	default:
	
		$smarty->display('frontPage.tpl');
		break;
}
