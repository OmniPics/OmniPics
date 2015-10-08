
<?php
require("setup.php");
echo "shit";

$pictures = new Picture($local_database, $local_username, $local_password);

$pics = $pictures->listPictures();

foreach ($pics as $pic)
    echo $pic;
