<?php 

require("smartyStarter.php");
require("Picture.php");

$pictures = new Picture($local_database, $local_username, $local_password);

$tags = isset($_REQUEST["picTags"]) ? $_REQUEST["picTags"] : "";
$picture_id = isset($_REQUEST["picture_id"]) ? $_REQUEST["picture_id"] : "";
$tagToDelete = isset($_REQUEST["tag"]) ? $_REQUEST["tag"] : "";

if($tagToDelete != "") {

	$pictures->removeTag($tagToDelete, $picture_id);
}

if($tags != "") {

	
	foreach ($tags as $tag) {
			$pictures->addTag($tag, $picture_id);
			echo $tag;
		}
}