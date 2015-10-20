<?php
require("setup.php");
require("Picture.php");
require("smartyStarter.php");

session_start();

$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : "";
$picture_id = isset($_REQUEST["picture_id"]) ? $_REQUEST["picture_id"] : "";
//$arrayOfPictureIDs = isset($_REQUEST["selectedPictures"]) ? $_REQUEST["selectedPictures"] : "";
$pictures = new Picture($local_database, $local_username, $local_password);

switch($page) {

	case "pictureViewer":
		$pics = $pictures->listPictures();
		$smarty->assign("pictures", $pics);
		$smarty->assign("picture_id", $picture_id);
		$smarty->display('pictureViewer.tpl');
		break;

	default:
	
		$smarty->display('frontPage.tpl');
		break;
	}
