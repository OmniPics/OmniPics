<?php
/**
 * User: tomasz
 * Date: 30.10.15
 * Time: 13:27
 */
 require("../setup.php");
 require("../Picture.php");
 function searchPictures($tagArray){
  $sql = "";
  $con = new Picture($local_database, $local_username, $local_password);
  $picArray =  $con->listPictures($sql);

 }
