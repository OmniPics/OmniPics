<?php 

require("smartyStarter.php");
require("Picture.php");

$pictures = new Picture($local_database, $local_username, $local_password);

$tags = isset($_REQUEST["tags"]) ? $_REQUEST["tags"] : "";
$picture_id = isset($_REQUEST["picture_id"]) ? $_REQUEST["picture_id"] : "";

if($tags != "") {

	$pictures->removePictureTags($picture_id);
	
	foreach ($tags as $tag) {
			$pictures->addTag($tag, $picture_id);
		}
}