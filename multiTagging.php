<?php 

require("smartyStarter.php");
require("Picture.php");

$pictures = new Picture($local_database, $local_username, $local_password);

$tag = isset($_REQUEST["tag"]) ? $_REQUEST["tag"] : "";
$selectedPictures = isset($_REQUEST["selectedPictures"]) ? $_REQUEST["selectedPictures"] : "";
$tagToDelete = isset($_REQUEST["tagToDelete"]) ? $_REQUEST["tagToDelete"] : "";

if($tagToDelete != "") {

	foreach ($selectedPictures as $picture_id ) {

		$pictures->removeTag($tagToDelete, $picture_id);
	}
}

if($tag != "") {

	foreach ($selectedPictures as $picture_id ) {

		$pictures->addTag($tag, $picture_id);
	}
}