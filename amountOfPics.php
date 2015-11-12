<?php 

require('Picture.php');
require("smartyStarter.php");

$pictures = new Picture($local_database, $local_username, $local_password);

$amountOfPicsInDB = $pictures->getAmountOfPics();



echo $amountOfPicsInDB;


