<?php
/**
* Creating MySQL connection
* Tomasz Gliniecki
*/

include "database.include.php"

$db_server = "localhost";
$db_database = "omnipics"

$mysqlli = new mysqli($db_server, $db_username, $db_password, $db_database)


 ?>
