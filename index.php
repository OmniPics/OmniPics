<?php

require("setup.php");
require("Picture.php");
require("smartyStarter.php");

session_start();

$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : "";

$picture_id = isset($_REQUEST["picture_id"]) ? $_REQUEST["picture_id"] : "";

$arrayOfPictureIDs = isset($_REQUEST["selectedPictures"]) ? $_REQUEST["selectedPictures"] : "";

$selectedPicsArray = array();

$pictures = new Picture($local_database, $local_username, $local_password);



switch($page) {

	

	case "dumpdb":
		$pictures->dumpDatabase();
		// TODO: smarty stuff....

		break;

	case "pictureViewer":
		$pics = $pictures->listPictures();
		$smarty->assign("pictures", $pics);
		$smarty->assign("picture_id", $picture_id);
		$smarty->display('pictureViewer.tpl');
		break;

	case "removePics":
		$pictures->removeMultiplePictures($arrayOfPictureIDs);

	default:
		$pics = $pictures->listPictures();
		$smarty->assign("pictures", $pics);
		$smarty->assign("selectedPicsArray", $selectedPicsArray);
		$smarty->display('frontPage.tpl');
		break;
	}
