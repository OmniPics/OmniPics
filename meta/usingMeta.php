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

    $meta = new Metaclass("./samples/","1.jpg");
    $meta->getMeta();

    $array = array(
        "title" => "Title of the new image",
        "description" => "This is a description of the image",
        "credit" => "CREDIT: Thomas Darvik",
        "creator" => "CREATOR: Thomas Darvik",
        "copyright" => "COPYRIGHT: Thomas Darvik",
        "keywords" => array("Drunk","Power","Stuff","Other tags")
    );

    //$meta->writeMeta($array);



?>
