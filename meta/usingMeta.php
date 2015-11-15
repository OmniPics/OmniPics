<?php
    /*
    "title"
    "keywords"
    "credit"
    "creator"
    "copyright"
    "description"
    */


    include("app.php");
    include("./../setup.php");

    $meta = new Metaclass($local_project_dir . "meta/samples/test.jpg","");

    $array = array(
        "title" => "Title of the new image",
        "description" => "This is a description of the image",
        "credit" => "CREDIT: Thomas Darvik",
        "creator" => "Bullshit bullshit",
        "copyright" => "COPYRIGHT: Thomas Darvik",
        "keywords" => array("Drunk","Power","Stuff","Other tags")
    );

    $meta->writeMeta($array);
$meta->getMeta();


?>
