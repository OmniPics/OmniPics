<?php
$picture_id = isset($_REQUEST["picture_id"]) ? $_REQUEST["picture_id"] : "";

require("smartyStarter.php");
require("Picture.php");

$pictures = new Picture($local_database, $local_username, $local_password);


$pictures->removePicture($picture_id);

$pictures->closeConnection();