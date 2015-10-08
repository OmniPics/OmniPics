<?php 

	require("smartyStarter.php");

	$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : "";
	

	switch($page) {

		case '':
			$smarty->display('frontPage.tpl');
			break;
	}
	