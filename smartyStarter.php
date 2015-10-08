<?php
	ini_set("display_errors",1);
	error_reporting(E_ALL);

	define("SMARTY_DIR", "Smarty-3.1.21/libs/");
	define("PROJECT_DIR", "");

	require(SMARTY_DIR . "Smarty.class.php");

	$smarty = new Smarty();
	$smarty->setTemplateDir(PROJECT_DIR . "smarty/templates");
	$smarty->setCompileDir(PROJECT_DIR . "smarty/templates_c");
	$smarty->setCacheDir(PROJECT_DIR . "smarty/cache");
	$smarty->setConfigDir(PROJECT_DIR . "smarty/config");

	session_start();

	require('mysql.php');

	require("Content.class.php");
	$content = new Content($mysqli);

	$allPersonaliaInfo = $content->setAllContentToArray();
	$content->setInfoToSmarty($smarty, $allPersonaliaInfo);