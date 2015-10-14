<?php

require("setup.php");
require("Picture.php");
require("smartyStarter.php");

session_start();

$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : "";

$picture_id = isset($_REQUEST["picture_id"]) ? $_REQUEST["picture_id"] : "";

$pictures = new Picture($local_database, $local_username, $local_password);

switch($page) {

	case "sort":
		// TODO: figure out sorting
		$pics = $pictures->listPictures();
		$smarty->assign("pictures", $pics);
		$smarty->display('frontPage.tpl');
		break;

	case "upload":
		// TODO: kalle form på en annen måte, enn det: ??s
		header("location: fileupload.form.html");
		break;

	case "removePic":
		$pictures->removePicture($picture_id);
		// TODO: smarty stuff....

		break;

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

	default:
		$pics = $pictures->listPictures();
		$smarty->assign("pictures", $pics);
		$smarty->display('frontPage.tpl');
		break;
	}
