<?php

$degrees = 90;  //change this to be whatever degree of rotation you want
/*$path   = '/Applications/MAMP/htdocs/OmniPics/images'; // the directionary where the pics lies
$file = 'Mercedes Benz_SL_VVSCV3_545.jpg'; // original file

$filename = $path . '/' . $file;  //this is the original file*/
$filepath = isset($_REQUEST["filepath"]) ? $_REQUEST["filepath"] : "";
$picId = isset($_REQUEST["picture_id"]) ? $_REQUEST["picture_id"] : "";
//$filename = isset($_REQUEST["filename"]) ? $_REQUEST["filename"] : "";
header('Content-type: image/JPG');
$source = imagecreatefromjpeg($filepath);
$rotate = imagerotate($source,$degrees,0);

//$newfile = $path . '/' . '_1' . $file;

imagejpeg($rotate, $filepath); //save the new image

imagedestroy($source); //free up the memory
imagedestroy($rotate);  //free up the memory

header('Location: '.'index.php?page=pictureViewer&&picture_id=' . $picId);


//<a href ="rotate.php?filepath={$pictures[$picture_id].path}&&picture_id={$picture_id}"> baller </a>
//for å sender meg til rotate siden min, med også.. vil den gå på en reise gjennom php hvor blir snudd nitti grader med klokken
// og lagret til samme posisjon den har lagret på forhånd ehhm også maximum upload exceeded.
