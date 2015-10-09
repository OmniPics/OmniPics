<?php

require("setup.php");
require("server/Picture.php");
require("smartyStarter.php");

session_start();

$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : "";

$pictures = new Picture($local_database, $local_username, $local_password);
switch($page) {

		case "dick":
			echo "nio";
			break;

		default:
			$pics = $pictures->listPictures();
			$smarty->assign("pictures", $pics);
			$smarty->display('frontPage.tpl');
			break;
	}
