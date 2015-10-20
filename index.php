<?php
require("setup.php");
require("smartyStarter.php");

session_start();

$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : "";

$pictureIndex = isset($_REQUEST["pictureIndex"]) ? $_REQUEST["pictureIndex"] : "";





switch($page) {

	case "pictureViewer":
		$smarty->assign("pictureIndex", $pictureIndex);
		$smarty->display('pictureViewer.tpl');
		break;

	default:
	
		$smarty->display('frontPage.tpl');
		break;
}
