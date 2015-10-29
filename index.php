<?php
require("setup.php");
require("smartyStarter.php");

session_start();

$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : "";
$pictureIndex = isset($_REQUEST["pictureIndex"]) ? $_REQUEST["pictureIndex"] : "";
$orderPicsBy = isset($_REQUEST["orderPicsBy"]) ? $_REQUEST["orderPicsBy"] : "";
$picsAscDesc = isset($_REQUEST["picsAscDesc"]) ? $_REQUEST["picsAscDesc"] : "";



switch($page) {

	case "pictureViewer":
		$smarty->assign("orderPicsBy", $orderPicsBy);
		$smarty->assign("picsAscDesc", $picsAscDesc);
		$smarty->assign("pictureIndex", $pictureIndex);
		$smarty->display('pictureViewer.tpl');
		break;

	default:
	
		$smarty->display('frontPage.tpl');
		break;
}
