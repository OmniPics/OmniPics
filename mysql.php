<?php
/**
 * Creating MySQL connection
 */

require("setup.php");

$mysqli = new mysqli("localhost", $local_username, $local_password, $local_database);


if (!mysqli_select_db($mysqli, $local_database)) {
    echo "unable to select pics: " . mysqli_error();
    exit;
}
if (!$mysqli) {
    echo "unable to get inside: " . mysqli_error();
    exit;
}

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



