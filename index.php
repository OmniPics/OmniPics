<?php

require("setup.php");
require("Picture.php");
require("smartyStarter.php");

session_start();

$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : "";

$picture_id = isset($_REQUEST["picture_id"]) ? $_REQUEST["picture_id"] : "";

$arrayOfPictureIDs = isset($_REQUEST["selectedPictures"]) ? $_REQUEST["selectedPictures"] : "";

if(isset($_REQUEST["selectedPictures"])) {

	echo "baaaaaaaaaaaaaalls";
}

$selectedPicsArray = array();

$pictures = new Picture($local_database, $local_username, $local_password);



switch($page) {
	// TODO: revie this code:
	/*
	case "upload":
		// TODO: kalle form på en annen måte, enn det: ??s
		header("location: fileupload.form.html");
		break;

	case "removePic":
		$pictures->removePicture($picture_id);
		// TODO: smarty stuff....
	*/

	// TODO : this should be done in ajax:
	case "place":
		$pics = $pictures->sortPictures("place");
		$smarty->assign("pictures", $pics);
		$smarty->display('frontPage.tpl');
		break;
	case "name":
		$pics = $pictures->sortPictures("name");
		$smarty->assign("pictures", $pics);
		$smarty->display('frontPage.tpl');
		break;

	case "date":
		$pics = $pictures->sortPictures("date");
		$smarty->assign("pictures", $pics);
		$smarty->display('frontPage.tpl');
		break;
	// end TODO


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
		$smarty->assign("selected", $arrayOfPictureIDs);
		$smarty->assign("pictures", $pics);
		$smarty->assign("selectedPicsArray", $selectedPicsArray);
		$smarty->display('frontPage.tpl');
		break;
	}
