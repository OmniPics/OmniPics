<?php

require("setup.php");
require("server/Picture.php");
require("smartyStarter.php");

session_start();

$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : "";

$pictures = new Picture($mysqli);
switch($page) {

		case "dick":
			echo "nio";
			break;

		default:
			echo "shit1";
			$pics = $pictures->listPictures();
			echo "shit";
			$smarty->assign("pictures", $pics);
			$smarty->display('frontPage.tpl');
			break;
	}
