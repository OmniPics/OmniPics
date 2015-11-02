<?php
$im = imagecreatefromjpeg('images/IMG_0024.jpg');

if($im && imagefilter($im, IMG_FILTER_SMOOTH, 30))
{
    echo 'Image brightness changed.';

    imagejpeg($im, 'images/IMG_0024.jpg');
    imagedestroy($im);
}
else
{
    echo 'Image brightness change failed.';
}
?>
