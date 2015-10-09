<?php

require("setup.php");
require("server/Picture.php");
require("smartyStarter.php");

$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : "";

require_once("server/Picture.php");
$pictures = new Picture($mysqli);

switch($page) {

		case '':
			$pics = $pictures->listPictures();
			$smarty->assign("pictures", $pics);
			$smarty->display('frontPage.tpl');
			break;
	}
