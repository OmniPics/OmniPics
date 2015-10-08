<?php
/**
 * Creating MySQL connection
 */

$db_server = "localhost"; /*mysql.ux.uis.no*/
$db_username = "root";
$db_password = ""; /*pmgvrj4j*/
$db_database = "webtest"; /*dbchriskru*/


$mysqli = new mysqli($db_server, $db_username, $db_password, $db_database);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



