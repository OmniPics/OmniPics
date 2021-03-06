<?php
/**
 * User: tomasz
 * Date: 30.10.15
 * Time: 13:27
 */
require_once("Picture.php");

function searchPictures($keywordsArray,$con, $ascDesc, $value, $startIndex, $amount){
  $pictures = array();
  $orsDes = "";
  $orsTag = "";

  if ($amount == 0) {$limit = "";}
  else {$limit = "LIMIT $startIndex, $amount";}
  if ($ascDesc == 0) {$ascDesc = "DESC";}
  else if ($ascDesc > 0) {$ascDesc = "ASC";}

 foreach ($keywordsArray as  $key) {
   $orsDes .= "OR description LIKE '%".$key."%' ";
 }
 foreach ($keywordsArray as  $key) {
   $orsTag .= "OR tags LIKE '%".$key."%' ";
 }
 $sql = "
 SELECT
 pictures.picture_id
 FROM has_tags
      INNER JOIN pictures
        ON pictures.picture_id=has_tags.picture_id
      INNER JOIN tags
        ON tags.tags_id=has_tags.tags_id
      #INNER JOIN has_meta
      #  ON has_meta.picture_id=has_tags.picture_id
      #INNER JOIN meta
      #  ON meta.meta_id=has_meta.meta_id
 WHERE tags LIKE '' ".
 //append OR's
 $orsTag //. $orsDes
 ."GROUP BY pictures.picture_id
   ORDER BY $value $ascDesc $limit";

  $result = mysqli_query($con->connection, $sql);
  $foundPictures = array();
  while($row = mysqli_fetch_assoc($result)) {
      $foundPictures[] = $con->loadPicture($row['picture_id']);
  }

  return $foundPictures;

}
