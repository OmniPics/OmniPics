<?php
define("UPLOAD_DIR", "images/");

if (!empty($_FILES["myPic"])) {
    $myPic = $_FILES["myPic"];

    if ($myPic["error"] !== UPLOAD_ERR_OK) {
        echo "error while uploading, exiting";
        exit;
    }

    // don't overwrite an existing file
    $i = 0;
    $name = $myPic["name"];
    $name_ext = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $name_ext["filename"] . "(" . $i .")" . "." . $name_ext["extension"];
    }

    $filename = pathinfo($name)["filename"];
    $extension = pathinfo($name)["extension"];
    $file_dir = UPLOAD_DIR . $name;

    // preserve file from temporary directory
    $success = move_uploaded_file($myPic["tmp_name"],
        UPLOAD_DIR . $name);
    if (!$success) {
        echo "could not save file for some reason";
        exit;
    }
    require("setup.php");
    require("server/Picture.php");
    $picture = new Picture($local_database, $local_username, $local_password);
    $picture->addPicture($filename, $extension, $file_dir);

    // set proper permissions on the new file
    chmod(UPLOAD_DIR . $name, 0644);
}

header('Location: '.'index.php');