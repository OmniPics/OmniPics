<?php 

require("smartyStarter.php");
require("Picture.php");

$pictures = new Picture($local_database, $local_username, $local_password);

$tag = isset($_REQUEST["tag"]) ? $_REQUEST["tag"] : "";
$picture_id = isset($_REQUEST["picture_id"]) ? $_REQUEST["picture_id"] : "";
$tagToDelete = isset($_REQUEST["tagToDelete"]) ? $_REQUEST["tagToDelete"] : "";

if($tagToDelete != "") {

	$pictures->removeTag($tagToDelete, $picture_id);
}

if($tag != "") {

	
	//foreach ($tags as $tag) {
			$pictures->addTag($tag, $picture_id);
		//}
}