<?php

echo "SHITHSITHSI";

//require("setup.php");


define("PROJECT_DIR", "home/tomasz/Dropbox/workspace/web/github.com/omnipics/omnipics/");
define("SMARTY_DIR", "home/tomasz/Dropbox/workspace/web/github.com/omnipics/omnipics/smarty-3.1.27/libs/");

require("home/tomasz/Dropbox/workspace/web/github.com/omnipics/omnipics/smarty-3.1.27/libs/Smarty.class.php");
echo "TUTEJ";
$smarty = new Smarty();

$smarty->setTemplateDir(PROJECT_DIR . "smarty/templates/");
$smarty->setCompileDir(PROJECT_DIR . "smarty/templates_c/");
$smarty->setCacheDir(PROJECT_DIR . "smarty/cache/");
$smarty->setConfigDir(PROJECT_DIR . "smarty/config/");

$smarty->testInstall();

$smarty->display("index.tpl");

/*
session_start();

$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";

$page ="";
switch ($page) {
  case "picture":
    // TODO: implement bildevisning

    $smarty->display("picture.tpl")

  case "edit":
    // TODO: implement edit

  default:
    // TODO: implement hovedside

    $smarty->display("index.tpl")
    break;
}
