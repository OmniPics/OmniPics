<?php
require_once("setup.php");
$local_server = "localhost";
$local_database = "dbtomgli";
$mysqli = new mysqli($db_server, $local_username, $local_password, $db_database);// link to db