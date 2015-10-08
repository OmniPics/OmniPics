
<?php
require("setup.php");
require("server/Picture.php");

$pictures = new Picture($local_database, $local_username, $local_password);


echo "
        <a href='fileupload.php'>Upload</a>
";


$pics = $pictures->listPictures();

foreach ($pics as $pic) {
    echo "
            <img src='$pic[path]' alt='$pic[filename]' height='20%'>
    ";
}
