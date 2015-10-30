<?php
function createThumbnail($filename) {
    $path_to_image_directory = "images/";
    $path_to_thumbs_directory = "images/thumbs/";
    $final_width_of_image = 50;

    if(preg_match('/[.](jpg)$/', $filename)) {
        $im = imagecreatefromjpeg($path_to_image_directory . $filename);
    } else if (preg_match('/[.](gif)$/', $filename)) {
        $im = imagecreatefromgif($path_to_image_directory . $filename);
    } else if (preg_match('/[.](png)$/', $filename)) {
        $im = imagecreatefrompng($path_to_image_directory . $filename);
    }

    $ox = imagesx($im);
    $oy = imagesy($im);

    $nx = $final_width_of_image;
    $ny = floor($oy * ($final_width_of_image / $ox));

    $nm = imagecreatetruecolor($nx, $ny);

    imagecopyresized($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);

    if(!file_exists($path_to_thumbs_directory)) {
        if(!mkdir($path_to_thumbs_directory)) {
            die("not working, maby prøv igjen ?!");
        }
    }

    imagejpeg($nm, $path_to_thumbs_directory . $filename);
    $tn = '<img src="' . $path_to_thumbs_directory . $filename . '" alt="image"/>';
    $tn .= 'lolzerz it workeds meow';
    echo $tn;
}