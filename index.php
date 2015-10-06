<?php

require("setup.php");

// display errors
error_reporting(E_ALL ^ E_DEPRECATED);
ini_set("display_errors", 1);
error_reporting(E_ALL);

define("PROJECT_DIR", $local_project_dir);
define("SMARTY_DIR", PROJECT_DIR . "smarty-3.1.27/libs/");

require(SMARTY_DIR . "Smarty.class.php");
$smarty = new Smarty();

$smarty->setTemplateDir(PROJECT_DIR . "smarty/templates/");
$smarty->setCompileDir(PROJECT_DIR . "smarty/templates_c/");
$smarty->setCacheDir(PROJECT_DIR . "smarty/cache/");
$smarty->setConfigDir(PROJECT_DIR . "smarty/config/");

$smarty->testInstall();


session_start();

$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";

$page ="";
switch ($page) {
  case "picture":
    // TODO: implement bildevisning

    $smarty->display("picture.tpl");

  case "edit":
    // TODO: implement edit

  default:
    // TODO: implement hovedside

    $smarty->display("index.tpl");
    break;
};
