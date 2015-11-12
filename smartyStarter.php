<?php
	ini_set("display_errors",1);
	error_reporting(E_ALL);

	require("setup.php");
	define("PROJECT_DIR", $local_project_dir);
	define("SMARTY_DIR", "smarty-3.1.27/libs/");

	require(SMARTY_DIR . "Smarty.class.php");

	$smarty = new SmartyBC();
	$smarty->setTemplateDir(PROJECT_DIR . "smarty/templates");
	$smarty->setCompileDir(PROJECT_DIR . "smarty/templates_c");
	$smarty->setCacheDir(PROJECT_DIR . "smarty/cache");
	$smarty->setConfigDir(PROJECT_DIR . "smarty/config");
	$smarty->assign('lbr', '{'); 
	$smarty->assign('rbr', '}'); 