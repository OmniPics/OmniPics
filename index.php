
<?php
require("setup.php");
require("server/Picture.php");



echo "
        <a href='fileupload.form.html'>Upload</a>
";


$pictures = new Picture($local_database, $local_username, $local_password);
$pics = $pictures->listPictures();

foreach ($pics as $pic) {
    echo "
            <p>$pic[filename]</p>
            <img src='$pic[path]' alt='$pic[filename]' height='20%'>
            <a href='remove.form.html'><h>X</h></a>
    ";
}
